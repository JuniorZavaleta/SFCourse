<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Usuario;

class CrearInstitucionTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    protected $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = Usuario::find(1);
        $this->be($this->user);
    }

    /**
     * Test cuando no se ingresan campos
     *
     * @return void
     */
    public function testCrearInstitucionConCamposVacios()
    {
        $this->call(
            'POST',
            route('instituciones.store'), []
        );

        $this->assertSessionHasErrors();
    }

    /**
     * Test cuando solo se ingresa el nombre
     * @return void
     */
    public function testCrearInstitucionConSoloNombre()
    {
        $institucion = factory(App\Models\Institucion::class)->make();

        $this->call(
            'POST',
            route('instituciones.store'), [
                'nombre' => $institucion->nombre,
            ]
        );

        $this->assertSessionHasErrors();
    }

    /**
     * Test cuando solo se ingresan las siglas
     * @return void
     */
    public function testCrearInstitucionConSoloSiglas()
    {
        $institucion = factory(App\Models\Institucion::class)->make();

        $this->call(
            'POST',
            route('instituciones.store'), [
                'siglas' => $institucion->siglas,
            ]
        );

        $this->assertSessionHasErrors();
    }

    /**
     * Test cuando el nombre y las siglas son de una palabra
     * @return type
     */
    public function testCrearInstitucionConCampos()
    {
        $institucion = factory(App\Models\Institucion::class)->make();

        $response = $this->call(
            'POST',
            route('instituciones.store'), [
                'nombre' => $institucion->nombre,
                'siglas' => $institucion->siglas,
            ]
        );

        $this->assertSessionMissing('errors');
    }
}
