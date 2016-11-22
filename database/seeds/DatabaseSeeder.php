<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(TipoUsuarioSeeder::class);
        $this->call(UsuarioSeeder::class);

        $this->call(InstitutionSeeder::class);
        $this->call(FacultadSeeder::class);
        $this->call(SedeSeeder::class);
        $this->call(DepartamentoAcademicoSeeder::class);
        $this->call(EapSeeder::class);
        $this->call(PlanDeEstudioSeeder::class);

        $this->call(TipoEvaluacionSeeder::class);
        $this->call(TipoPeriodoSeeder::class);
        $this->call(TipoAsignaturaSeeder::class);
        $this->call(TipoAmbienteSeeder::class);

        $this->call(AmbienteSeeder::class);
        $this->call(AsignaturaSeeder::class);
        $this->call(PeriodoAcademicoSeeder::class);
        $this->call(AsignaturaAperturadaSeeder::class);
        $this->call(GrupoSeeder::class);

        $this->call(EvaluacionSeeder::class);

        $this->call(AlumnoSeeder::class);
        $this->call(MatriculaSeeder::class);
        $this->call(ResultadoEvaluacionSeeder::class);

        $this->call(DocenteSeeder::class);
        $this->call(DocentesDepartamentosSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Eloquent::reguard();
    }
}
