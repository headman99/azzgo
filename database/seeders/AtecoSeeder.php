<?php

namespace Database\Seeders;

use App\Imports\AtecosImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class AtecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new AtecosImport(), getPathDatabaseForImport().'/codiceateco.csv', null);
    }
}
