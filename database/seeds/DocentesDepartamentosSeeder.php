<?php

use Illuminate\Database\Seeder;

class DocentesDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docente_x_departamento')->truncate();

        DB::table('docente_x_departamento')->insert([
            [
                'departamento_id' => 1,
                'docente_id'      => 2,
            ],
            [
                'departamento_id' => 2,
                'docente_id'      => 3,
            ],
            [
                'departamento_id' => 1,
                'docente_id'      => 6,
            ],
            [
                'departamento_id' => 2,
                'docente_id'      => 7,
            ],
            [
                'departamento_id' => 1,
                'docente_id'      => 8,
            ],
            [
                'departamento_id' => 2,
                'docente_id'      => 9,
            ],
            [
                'departamento_id' => 1,
                'docente_id'      => 10,
            ],
            [
                'departamento_id' => 2,
                'docente_id'      => 11,
            ],
            [
                'departamento_id' => 1,
                'docente_id'      => 12,
            ],
            [
                'departamento_id' => 2,
                'docente_id'      => 13,
            ],
        ]);
    }
}
