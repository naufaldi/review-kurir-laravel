@extends('layouts.app')

@section('content')
  <div class="columns">
    <div class="column">
      
    </div>
    <div class="column">
      <form method="{{ route('ongkir.store') }}" method="POST" id="form-ongkir">

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
            <input class="input" name="weight" type="text" placeholder="Berat Barang">
          </div>
        </div>

        <div class="field">
          <label class="label">Kurir</label>
          <div class="control">
            <div class="select">
              <select name="shipping">
                <option value="jne">JNE</option>
                <option value="pos">POS Indonesia</option>
                <option value="tiki">TIKI</option>
              </select>
            </div>
          </div>
        </div>
        <div class="field">
          <div class="is-right">
            <button class="button is-primary">Hitung</button>
          </div>
        </div>
      </form>
    </div>
    <div class="column">

    </div>
  </div>

@endsection

@section('js')

<script src="{{ asset('js/ongkir.js') }}"></script>

@endsection