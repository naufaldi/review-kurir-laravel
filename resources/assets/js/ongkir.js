
require('./bootstrap')

import vue from 'vue';
import axios from 'axios';

var ongkir = new vue({
    el: '#form-ongkir',
    data: {
        provinces :[],
        cities_origin : [],
        cities_destination : [],
        province_origin : 0,
        city_origin : 0,
        province_destination : 0,
        city_destination : 0,
    },
    methods: {
        getProvince: function() {
            axios.get('/province')
            .then(response => {
                this.provinces = response.data.rajaongkir.results;
            })
            .catch(e => {
                console.log(e);
            });
        },
        getCityOriginByProvince: function( provinsi )
        {
            axios.get('/city-by-province/'+provinsi)
            .then( response => {
                this.cities_origin = response.data.rajaongkir.results;
            })
            .catch( e => {
                console.log(e);
            });
        },
        getCityDestinationByProvince: function( provinsi )
        {
            axios.get('/city-by-province/'+provinsi)
            .then( response => {
                this.cities_destination = response.data.rajaongkir.results;
            })
            .catch( e => {
                console.log(e);
            });
        }
    },
    created: function(){
        this.getProvince();
    }
});