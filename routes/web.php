<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\AsignacionesController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//--------------------------------------Login
Route::get('/', function () {
    return view('pagina');
});
route::get('login2',[LoginController::class,'login2'])->name('login2');
route::post('validar',[LoginController::class,'validar'])->name('validar');
route::get('cerrarsesion',[LoginController::class,'cerrarsesion'])->name('cerrarsesion');
route::get('index',[LoginController::class,'index'])->name('index');

//---------------------------------------Administradores
route::get('reporteadmin',[AdministradoresController::class,'reporteadmin'])->name('reporteadmin');
route::get('altaadmin',[AdministradoresController::class,'altaadmin'])->name('altaadmin');
route::POST('guardaradmin',[AdministradoresController::class,'guardaradmin'])->name('guardaradmin');
route::get('desactivaradmin/{id}',[AdministradoresController::class,'desactivaradmin'])->name('desactivaradmin');
route::get('activaradmin/{id}',[AdministradoresController::class,'activaradmin'])->name('activaradmin');
route::get('borraradmin/{id}',[AdministradoresController::class,'borraradmin'])->name('borraradmin');
route::get('modificaradmin/{id}',[AdministradoresController::class,'modificaradmin'])->name('modificaradmin');
route::post('cambiaradmin',[AdministradoresController::class,'cambiaradmin'])->name('cambiaradmin');
route::get('pdfadmin',[AdministradoresController::class,'pdfadmin']);
route::get('export',[AdministradoresController::class,'export']);
route::get('import',[AdministradoresController::class,'import'])->name('import');
route::get('eloquent',[AdministradoresController::class,'eloquent'])->name('eloquent');


//----------------------------------------Empleados
route::get('altaempleados',[EmpleadosController::class,'altaempleados'])->name('altaempleados');
route::POST('guardarempleados',[EmpleadosController::class,'guardarempleados'])->name('guardarempleados');
route::get('reporteempleados',[EmpleadosController::class,'reporteempleados'])->name('reporteempleados');
route::get('desactivarempleados/{Id_empleado}',[EmpleadosController::class,'desactivarempleados'])->name('desactivarempleados');
route::get('activarempleados/{Id_empleado}',[EmpleadosController::class,'activarempleados'])->name('activarempleados');
route::get('borrarempleados/{Id_empleado}',[EmpleadosController::class,'borrarempleados'])->name('borrarempleados');
route::get('modificarempleados/{Id_empleado}',[EmpleadosController::class,'modificarempleados'])->name('modificarempleados');
route::post('cambiarempleados',[EmpleadosController::class,'cambiarempleados'])->name('cambiarempleados');
//PDF
route::get('pdfempleados',[EmpleadosController::class,'pdfempleados']);
//EXCEL
route::get('exportempleados',[EmpleadosController::class,'exportempleados']);


/////////////----------------Softwarae
route::get('reportesoftware',[SoftwareController::class,'reportesoftware'])->name('reportesoftware');
route::get('altasoftware',[SoftwareController::class,'altasoftware'])->name('altasoftware');
route::POST('guardarsoftware',[SoftwareController::class,'guardarsoftware'])->name('guardarsoftware');
route::get('desactivarsoftware/{id_software}',[SoftwareController::class,'desactivarsoftware'])->name('desactivarsoftware');
route::get('activarsoftware/{id_software}',[SoftwareController::class,'activarsoftware'])->name('activarsoftware');
route::get('borrarsoftware/{id_software}',[SoftwareController::class,'borrarsoftware'])->name('borrarsoftware');
route::get('modificarsoftware/{id_software}',[SoftwareController::class,'modificarsoftware'])->name('modificarsoftware');
route::post('cambiarsoftware',[SoftwareController::class,'cambiarsoftware'])->name('cambiarsoftware');
Route::name('pdfsoftware')->get('pdfsoftware',[SoftwareController::class,'getPdfSoftware']);
Route::name('exportsoftware')->get('exportsoftware',[SoftwareController::class,'exportsoftware']);
Route::name('import')->post('import',[SoftwareController::class,'import']);
route::get('eloquent',[SoftwareController::class,'eloquent'])->name('eloquent');

//------------------------------------------Asignaciones

Route::get('asignaciones',[AsignacionesController::class,'Asignaciones']);
Route::POST('GuardarAsignaciones',[AsignacionesController::class,'GuardarAsignaciones'])->name('GuardarAsignaciones');
Route::get('ReporteAsignaciones',[AsignacionesController::class,'ReporteAsignaciones'])->name('ReporteAsignaciones');
Route::get('DesactivarAsignaciones/{id}',[AsignacionesController::class,'DesactivarAsignaciones'])->name('DesactivarAsignaciones');
Route::get('EliminarAsignaciones/{id}',[AsignacionesController::class,'EliminarAsignaciones'])->name('EliminarAsignaciones');
Route::get('RestaurarAsignaciones/{id}',[AsignacionesController::class,'RestaurarAsignaciones'])->name('RestaurarAsignaciones');
Route::POST('EditarAsignaciones/{id}',[AsignacionesController::class,'EditarAsignaciones'])->name('EditarAsignaciones');
Route::get('ModificarAsignaciones/{id}/edit',[AsignacionesController::class,'ModificarAsignaciones'])->name('ModificarAsignaciones');
Route::name('pdfasig')->get('pdfasig',[AsignacionesController::class,'getPdfAsignaciones']);
Route::name('exportasig')->get('exportasig',[AsignacionesController::class,'exportAsignaciones']);
route::get('DesactivarAsignacion/{id_asignacion}',[AsignacionesController::class,'DesactivarAsignacion'])->name('DesactivarAsignacion');
route::get('ActivarAsignacion/{id_asignacion}',[AsignacionesController::class,'ActivarAsignacion'])->name('ActivarAsignacion');
route::get('BorrarAsignacion/{id_asignacion}',[AsignacionesController::class,'BorrarAsignacion'])->name('BorrarAsignacion');

//------------------------------------------------Reportes
Route::get('Reportes',[ReportesController::class,'Reportes']);
Route::POST('GuardarReportes',[ReportesController::class,'GuardarReportes'])->name('GuardarReportes');
Route::get('ConsultarReportes',[ReportesController::class,'ConsultarReportes'])->name('ConsultarReportes');
Route::POST('EditarReportes/{id}',[ReportesController::class,'EditarReportes'])->name('EditarReportes');
Route::get('ModificarReportes/{id}/edit',[ReportesController::class,'ModificarReportes'])->name('ModificarReportes');
route::get('BorrarReporte/{id_reporte}',[ReportesController::class,'BorrarReporte'])->name('BorrarReporte');
Route::get('pdfReporte/{id_reporte}',[ReportesController::class,'pdfReporte'])->name('pdfReporte');

//--------------------------------------------------------------------
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
