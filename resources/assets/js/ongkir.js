

import vue from 'vue';
import axios from 'axios';
import numeral from 'numeral';


var ongkir_kurir = new vue({
    el: '#ongkir',
    data: {
        provinces :[],
        cities_origin : [],
        cities_destination : [],
        province_origin : 0,
        city_origin : 0,
        province_destination : 0,
        city_destination : 0,
        weight: null,
        shipping: null,
        loading: false,
        token:null,
        form_ongkir: false,
        table_ongkir: false,
        origin_details: [],
        destination_details: [],
        query: [],
        results: [],
        costs:[],
    },
    methods: {
        hitungLagi: function() {
            this.form_ongkir = true;
            this.table_ongkir = false;
        },
        showLoading: function ( form = false ){
            this.loading = true;
            this.form_ongkir = form;
        },
        hideLoading: function ( form = true ){
            this.loading = false;
            this.form_ongkir = form;
        },
        setNumeral: function( number ){
            return numeral(number).format('0,0');
        },
        getToken: function() {
            axios.get('/ongkir')
            .then(response => {
                this.token = response.data;
            })
            .catch(e => {
                console.log(e);
            });
        },
        storeDataOngkir: function(){
            this.showLoading();
            axios.post('/ongkir', {
                city_origin : this.city_origin,
                city_destination : this.city_destination,
                weight : this.weight,
                shipping : this.shipping,
                _token : this.token,
            })
            .then(response => {
                this.costs = response.data.rajaongkir.results[0].costs;
                this.origin_details = response.data.rajaongkir.origin_details;
                this.destination_details = response.data.rajaongkir.destination_details;
                this.query = response.data.rajaongkir.query;
                this.results = response.data.rajaongkir.results;
                this.hideLoading(false);
                this.table_ongkir = true;
            })
            .catch(e => {
                console.log(e);
                this.hideLoading(false);
                this.table_ongkir = true;
            });
        },
        getProvince: function() {
            this.showLoading();
            axios.get('/province')
            .then(response => {
                this.provinces = response.data.rajaongkir.results;
                this.hideLoading();
            })
            .catch(e => {
                console.log(e);
                this.hideLoading();
            });
        },
        getCityOriginByProvince: function( provinsi )
        {
            this.showLoading();
            axios.get('/city-by-province/'+provinsi)
            .then( response => {
                this.cities_origin = response.data.rajaongkir.results;
                this.hideLoading();
            })
            .catch( e => {
                console.log(e);
                this.hideLoading();
            });
        },
        getCityDestinationByProvince: function( provinsi )
        {
            this.showLoading();
            axios.get('/city-by-province/'+provinsi)
            .then( response => {
                this.cities_destination = response.data.rajaongkir.results;
                this.hideLoading();
            })
            .catch( e => {
                console.log(e);
                this.hideLoading();
            });
        }
    },
    beforeCreate: function() {
        this.showLoading();
    },
    created: function(){
        this.getProvince();
        this.getToken();
    }
});