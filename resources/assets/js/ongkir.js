
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
        showLoading: false,
    },
    methods: {
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
    }
});