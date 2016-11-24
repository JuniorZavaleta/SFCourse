<?php

use Illuminate\Database\Seeder;

use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->truncate();
        Usuario::create([
            'id' => 1,
            'nombres' => 'admin',
            'apellidos' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 1,
        ]);
        Usuario::create([
            'id' => 2,
            'nombres' => 'docente',
            'apellidos' => 'prueba',
            'email' => 'prueba@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 3,
            'nombres' => 'docente 2',
            'apellidos' => 'prueba 2',
            'email' => 'prueba2@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 4,
            'nombres' => 'alumno A',
            'apellidos' => 'prueba A',
            'email' => 'prueba@alumno.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 2,
        ]);
        Usuario::create([
            'id' => 5,
            'nombres' => 'alumno B',
            'apellidos' => 'prueba B',
            'email' => 'prueba2@alumno.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 2,
        ]);
        Usuario::create([
            'id' => 6,
            'nombres' => 'docente 3',
            'apellidos' => 'prueba 3',
            'email' => 'prueba3@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 7,
            'nombres' => 'docente 4',
            'apellidos' => 'prueba 4',
            'email' => 'prueba4@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 8,
            'nombres' => 'docente 5',
            'apellidos' => 'prueba 5',
            'email' => 'prueba5@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 9,
            'nombres' => 'docente 6',
            'apellidos' => 'prueba 6',
            'email' => 'prueba6@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 10,
            'nombres' => 'docente 7',
            'apellidos' => 'prueba 7',
            'email' => 'prueba7@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 11,
            'nombres' => 'docente 8',
            'apellidos' => 'prueba 8',
            'email' => 'prueba8@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 12,
            'nombres' => 'docente 9',
            'apellidos' => 'prueba 9',
            'email' => 'prueba9@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);
        Usuario::create([
            'id' => 13,
            'nombres' => 'docente 10',
            'apellidos' => 'prueba 10',
            'email' => 'prueba10@docente.com',
            'password' => bcrypt('secret'),
            'remember_token' => '',
            'tipo_usuario_id' => 3,
        ]);

        DB::table('docente')->truncate();
        DB::table('docente')->insert([
            ['id' => 2],
            ['id' => 3],
        ]);
    }
}
