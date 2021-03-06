<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::model('institucion', \App\Models\Institucion::class);
        Route::model('facultad', \App\Models\Facultad::class);
        Route::model('sede', \App\Models\Sede::class);
        Route::model('departamento', \App\Models\Departamento::class);
        Route::model('provincia', \App\Models\Provincia::class);
        Route::model('eap', \App\Models\Escuela::class);
        Route::model('grupo', \App\Models\Grupo::class);
        Route::model('evaluacion', \App\Models\Evaluacion::class);
        Route::model('ip_lista_blanca', \App\Models\Firewall::class);
        Route::model('incidente', \App\Models\Incidente::class);
        Route::model('ambiente', \App\Models\Ambiente::class);
        Route::model('plan', \App\Models\PlanEstudio::class);
        Route::model('periodo', \App\Models\Periodo::class);
        Route::model('departamento_academico', \App\Models\DepartamentoAcademico::class);
        Route::model('docente', \App\Models\Docente::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapAdminReportRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => ['auth:api'],
            'namespace' => $this->namespace . "\Api",
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }

    /**
     * Define the "admin" routes focus on CRUD and manage data
     *
     *
     * These routes only for admin users
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'auth'],
            'namespace' => $this->namespace . "\Admin",
            'prefix' => 'admin',
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "admin" routes focus on reports
     *
     *
     * These routes only for admin users
     * @return void
     */
    protected function mapAdminReportRoutes()
    {
        Route::group([
            'middleware' => ['web', 'auth'],
            'namespace' => $this->namespace . "\Admin\Reporte",
            'prefix' => 'admin/reportes',
        ], function ($router) {
            require base_path('routes/admin_reporte.php');
        });
    }
}
