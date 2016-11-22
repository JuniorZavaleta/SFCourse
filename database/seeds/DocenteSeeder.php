<?php

use Illuminate\Database\Seeder;

class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docente')->truncate();

        DB::table('docente')->insert([
            [
                'id' => 2,
            ],
            [
                'id' => 3,
            ],
            [
                'id' => 6,
            ],
            [
                'id' => 7,
            ],
            [
                'id' => 8,
            ],
            [
                'id' => 9,
            ],
            [
                'id' => 10,
            ],
            [
                'id' => 11,
            ],
            [
                'id' => 12,
            ],
            [
                'id' => 13,
            ],
        ]);
    }
}
