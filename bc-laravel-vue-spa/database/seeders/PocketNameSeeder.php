<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PocketNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pockets')->insert(
            [
                [
                    'name' => 'Szálláshely szolgáltatás',
                ],
                [
                    'name' => 'Vendéglátás (étkezés)',
                ],
                [
                    'name' => 'Szabadidő',
                ],
            ]);
    }
}
