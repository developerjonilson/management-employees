<?php

use Illuminate\Database\Seeder;
use App\Master;

class MastersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeding the master table only to the master user.
        Master::create([
            'is_master' => true,
        ]);
    }
}
