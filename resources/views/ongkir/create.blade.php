@extends('layouts.app')

@section('content')
  <div class="columns">
    <div class="column">
      
    </div>
    <div class="column is-one-third" id="ongkir">
      <div>
        <center>
          <h1>
            <strong>
              PORTAL HITUNG ONGKIR TERLENGKAP
            </strong>
          </h1>
        </center>
      </div>
      <div id="loading" v-show="loading">
        <img src="{{ asset('assets/Pacman-1s-200px.gif') }}">
      </div>
      <span v-show="form_ongkir">
      <form action="{{ route('ongkir.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Provinsi Awal</label>
          </div>
          <div class="field-body">
            <div class="control">
              <div class="select">
                <select name="province_origin" @change="getCityOriginByProvince( province_origin )" v-model="province_origin" required>
                  <option v-for="province in provinces" v-bind:value="province.province_id">@{{ province.province }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Kota Awal</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="select">
                <select name="city_origin" v-model="city_origin" required>
                  <option v-for="city in cities_origin" v-bind:value="city.city_id">@{{ city.type+" "+city.city_name }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Provinsi Tujuan</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="select">
                <select name="province_destination" @change="getCityDestinationByProvince( province_destination )" v-model="province_destination" required>
                  <option v-for="province in provinces" v-bind:value="province.province_id"> @{{ province.province }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Kota Tujuan</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="select">
                <select name="city_destination" v-model="city_destination" required>
                  <option v-for="city in cities_destination" v-bind:value="city.city_id">@{{ city.type+" "+city.city_name }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Berat</label>
          </div>
          <div class="field-body">
            <div class="field">
              <p class="control">
                <input class="input" name="weight" v-model="weight" type="text" placeholder="Per Gram" style="width:200px" required> * Per Gram
              </p> 
            </div>
          </div>
        </div>

        <div class="field is-horizontal">
          <div class="field-label is-normal">
            <label class="label">Kurir</label>
          </div>
          <div class="field-body">
            <div class="field">
              <div class="select">
                <select name="shipping" v-model="shipping" required>
                  <option v-for="(courier, index) in couriers" v-bind:value="courier.slug">@{{ courier.nama }}</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="field is-grouped is-grouped-centered">
          <div class="is-right">
            <button class="button is-primary" type="button" @click="storeDataOngkir()">Hitung</button>
          </div>
        </div>
      </form>
      </span>
      <span v-show="table_ongkir" class="column is-three-quarters">
        <button class="button is-success" @click="hitungLagi()">Hitung Lagi</button>
        <br>
        <table class="table is-bordered is-stripped">
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
            <tr v-for="cost in costs">
              <td>@{{ destination_details.city_name }}</td>
              <td>@{{ origin_details.city_name }}</td>
              <td>@{{ results[0].name }}</td>
              <td>@{{ cost.service }}</td>
              <td>Rp. @{{ setNumeral(cost.cost[0].value) }}</td>
              <td>@{{ cost.cost[0].etd }} Hari</td>
            </tr>
            <tr v-if="costs.length==0">
              <td colspan=6><strong>:(</strong> Tidak ada hasil ongkir untuk rute anda</td>
            </tr>
          </tbody>
        </table>
      </span>
    </div>
    <div class="column">

    </div>
  </div>

@endsection

@section('js')

<script src="{{ asset('js/ongkir.js') }}"></script>

@endsection