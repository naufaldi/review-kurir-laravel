
require('./bootstrap')

import vue from 'vue';
import axios from 'axios';

var ongkir = new vue({
    el: '#ongkir',
    data: {
        provinces :[],
        cities_origin : [],
        cities_destination : [],
        province_origin : 0,
        city_origin : 0,
        province_destination : 0,
        city_destination : 0,
        weight: 0,
        shipping: null,
        showLoading: false,
        token:null,
        form_ongkir: true,
        table_ongkir: false,
    },
    methods: {
        getToken: function() {
            axios.get('/ongkir')
            .then(function(response){
                this.token = response;
            })
            .catch(function(e){
                console.log(e);
            });
        },
        storeDataOngkir: function(){
            this.showLoading = true;
            axios.post('/ongkir', {
                origin : this.city_origin,
                destination : this.city_destination,
                weight : this.weight,
                shipping : this.shipping,
                _token : this.token,
            })
            .then(function(response) {
                console.log(response);
                this.showLoading = false;
                this.table_ongkir = true;
                this.form_ongkir = false;
            })
            .catch(function(e) {
                console.log(e);
                this.showLoading = false;
                this.table_ongkir = true;
                this.form_ongkir = false;
            });
        },
        getProvince: function() {
            this.showLoading = true;
            axios.get('/province')
            .then(response => {
                this.provinces = response.data.rajaongkir.results;
                this.showLoading = false;
            })
            .catch(e => {
                console.log(e);
                this.showLoading = false;
            });
        },
        getCityOriginByProvince: function( provinsi )
        {
            this.showLoading = true;
            axios.get('/city-by-province/'+provinsi)
            .then( response => {
                this.cities_origin = response.data.rajaongkir.results;
                this.showLoading = false;
            })
            .catch( e => {
                console.log(e);
                this.showLoading = false;
            });
        },
        getCityDestinationByProvince: function( provinsi )
        {
            this.showLoading = true;
            axios.get('/city-by-province/'+provinsi)
            .then( response => {
                this.cities_destination = response.data.rajaongkir.results;
                this.showLoading = false;
            })
            .catch( e => {
                console.log(e);
                this.showLoading = false;
            });
        }
    },
    created: function(){
        this.getProvince();
        this.getToken();
    }
});