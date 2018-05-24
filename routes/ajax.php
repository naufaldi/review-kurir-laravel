<?php
/**
 * this route used to get ajax only
*/

Route::group(['prefix'=>'/'], function(){
    Route::get('province', 'ProvinceController@getProvince')->name('province');
    Route::get('province-by-id/{id}', 'ProvinceController@getProvinceById')->name('province-with-id');
    Route::get('city', 'CityController@getCity')->name('city');
    Route::get('city-by-province/{province}', 'CityController@getCityByProvince')->name('city-by-province');
    Route::get('city-by-id/{province}/{id}', 'CityController@getCityById')->name('city-by-id');
    Route::get('get-courier', 'OngkirController@getCourier')->name('get-courier');
});