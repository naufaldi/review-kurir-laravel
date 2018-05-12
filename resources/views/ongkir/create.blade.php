@extends('layouts.app')

@section('content')
  <div class="columns">
    <div class="column">
      
    </div>
    <div class="column" id="ongkir">
      <div id="loading" v-show="showLoading">
        <img src="{{ asset('assets/Pacman-1s-200px.gif') }}">
      </div>
      <form action="{{ route('ongkir.store') }}" method="POST" v-show="form_ongkir">
        {{ csrf_field() }}
        <div class="field">
          <label class="label">Provinsi Awal</label>
          <div class="control">
            <div class="select">
              <select name="province_origin" @click="getCityOriginByProvince( province_origin )" v-model="province_origin">
                <option v-for="province in provinces" v-bind:value="province.province_id">@{{ province.province }}</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Kota Awal</label>
          <div class="control">
            <div class="select">
              <select name="city_origin" v-model="city_origin">
                <option v-for="city in cities_origin" v-bind:value="city.city_id">@{{ city.city_name }}</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Provinsi Tujuan</label>
          <div class="control">
            <div class="select">
              <select name="province_destination" @click="getCityDestinationByProvince( province_destination )" v-model="province_destination">
                <option v-for="province in provinces" v-bind:value="province.province_id"> @{{ province.province }}</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Kota Tujuan</label>
          <div class="control">
            <div class="select">
              <select name="city_destination" v-model="city_destination">
                <option v-for="city in cities_destination" v-bind:value="city.city_id">@{{ city.city_name }}</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Berat</label>
          <div class="control">
            <input class="input" name="weight" v-model="weight" type="text" placeholder="Berat Barang">
          </div>
        </div>

        <div class="field">
          <label class="label">Kurir</label>
          <div class="control">
            <div class="select">
              <select name="shipping" v-model="shipping">
                <option value="jne">JNE</option>
                <option value="pos">POS Indonesia</option>
                <option value="tiki">TIKI</option>
              </select>
            </div>
          </div>
        </div>
        <div class="field">
          <div class="is-right">
            <button class="button is-primary" type="button" @click="storeDataOngkir()">Hitung</button>
          </div>
        </div>
      </form>
      <a href="{{ route('ongkir.index') }}" class="button is-success">Hitung Lagi</a>
      <table class="table is-bordered is-stripped" v-show="table_ongkir">
        <thead>
          <tr>
            <th>Kota Awal</th>
            <th>Kota Tujuan</th>
            <th>Kurir</th>
            <th>Tipe Pengiriman</th>
            <th>Biaya</th>
            <th>Estimasi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="column">

    </div>
  </div>

@endsection

@section('js')

<script src="{{ asset('js/ongkir.js') }}"></script>

@endsection