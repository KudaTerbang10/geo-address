<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $data = new Kecamatan();
        $data->id_kecamatan= \Ramsey\Uuid\Uuid::uuid4()->toString();
        $data->nama_kecamatan = "Margahayu";
        $data->id_kabupaten = "3f44252d-13d8-4398-b638-c189486ef047";
        $data->save();
    }
}
