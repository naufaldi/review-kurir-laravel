<?php

use Illuminate\Database\Seeder;

class NamaKurir extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // jne, pos, tiki, rpx, esl, pcp, pandu, wahana, sicepat, jnt, pahala, cahaya, sap, jet, indah, dse, slis, first, ncs, star, nss.
        DB::table('nama_kurir')->insert([
            ['nama' => 'JNE', 'slug' => 'jne'], //1
            ['nama' => 'POS', 'slug' => 'pos'], //2
            ['nama' => 'TIKI', 'slug' => 'tiki'], //3
            ['nama' => 'RPX', 'slug' => 'rpx'], //4
            ['nama' => 'ESL', 'slug' => 'esl'], //5
            ['nama' => 'PCP', 'slug' => 'pcp'], //6
            ['nama' => 'Pandu', 'slug' => 'pandu'], //7
            ['nama' => 'Wahana', 'slug' => 'wahana'], //8
            ['nama' => 'Sicepat', 'slug' => 'sicepat'], //9
            ['nama' => 'J&T', 'slug' => 'jnt'], //10 
            ['nama' => 'Pahala', 'slug' => 'pahala'], //11
            ['nama' => 'Cahaya', 'slug' => 'cahaya'], //12
            ['nama' => 'SAP', 'slug' => 'sap'], //13
            ['nama' => 'JET', 'slug' => 'jet'], //14
            ['nama' => 'Indah', 'slug' => 'indah'], //15
            ['nama' => 'DSE', 'slug' => 'dse'], //16
            ['nama' => 'Slis', 'slug' => 'slis'], //17
            ['nama' => 'First', 'slug' => 'first'], //18
            ['nama' => 'NCS', 'slug' => 'ncs'], //19
            ['nama' => 'Star', 'slug' => 'star'], //20
            ['nama' => 'NSS', 'slug' => 'nss'] //21
        ]); 
    }
}
