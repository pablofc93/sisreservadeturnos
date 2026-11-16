<?php

use Illuminate\Support\Facades\Route;

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

//ruta principal
Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas para el admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')
->middleware(middleware:'auth');



//rutas para el admin - configuracion
Route::get('/admin/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')
->middleware('auth','can:admin.configuracion.index');

Route::get('/admin/configuracion/create', [App\Http\Controllers\ConfiguracionController::class, 'create'])->name('admin.configuracion.create')
->middleware('auth','can:admin.configuracion.create');

//ruta para enviar el formulario
Route::post('/admin/configuracion/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')
->middleware('auth', 'can:admin.configuracion.store');

//ruta para mostrar información
Route::get('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracionController::class, 'show'])->name('admin.configuracion.show')
->middleware('auth', 'can:admin.configuracion.show');

//ruta para enviar los datos que se van a actualizar
Route::get('/admin/configuracion/{id}/edit', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('admin.configuracion.edit')
->middleware('auth','can:admin.configuracion.edit');

//ruta para editar los datos
Route::put('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('admin.configuracion.update')
->middleware('auth','can:admin.configuracion.update');

//ruta para mostrar la información a eliminar
Route::get('/admin/configuracion/{id}/confirm-delete', [App\Http\Controllers\ConfiguracionController::class, 'confirmDelete'])->name('admin.configuracion.confirmDelete')
->middleware('auth','can:admin.configuracion.confirmDelete');

//ruta para eliminar un registro
Route::delete('/admin/configuracion/{id}/', [App\Http\Controllers\ConfiguracionController::class, 'destroy'])->name('admin.configuracion.destroy')
->middleware('auth','can:admin.configuracion.destroy');



//rutas para el admin - usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')
->middleware('auth','can:admin.usuarios.index');

Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')
->middleware('auth','can:admin.usuarios.create');

//ruta para enviar el formulario
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')
->middleware('auth', 'can:admin.usuarios.store');

//ruta para mostrar información
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')
->middleware('auth', 'can:admin.usuarios.show');

//ruta para enviar los datos que se van a actualizar
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')
->middleware('auth','can:admin.usuarios.edit');

//ruta para editar los datos
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')
->middleware('auth','can:admin.usuarios.update');

//ruta para mostrar la información a eliminar
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')
->middleware('auth','can:admin.usuarios.confirmDelete');

//ruta para eliminar un registro
Route::delete('/admin/usuarios/{id}/', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')
->middleware('auth','can:admin.usuarios.destroy');



//rutas para el admin - Secretarias
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index')
->middleware('auth','can:admin.secretarias.index');

//ruta para el create secretarias
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create')
->middleware('auth','can:admin.secretarias.create');

//ruta para enviar los datos de secretarias(chequear si está correcta o no)
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store')
->middleware('auth','can:admin.secretarias.store');

//ruta para obtener los datos de la secretaria
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show')
->middleware('auth','can:admin.secretarias.show');

//ruta para editar datos de la secretaria
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit')
->middleware('auth','can:admin.secretarias.edit');

//ruta para actualizar la contraseña
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update')
->middleware('auth','can:admin.secretarias.update');

//ruta para eliminar los datos de la secretaria
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')
->middleware('auth','can:admin.secretarias.confirmDelete');

Route::delete('/admin/secretarias/{id}/', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')
->middleware('auth','can:admin.secretarias.destroy');


//rutas para el admin - Pacientes
Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.pacientes.index')
->middleware('auth','can:admin.pacientes.index');

//ruta para el create pacientes
Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.pacientes.create')
->middleware('auth','can:admin.pacientes.create');

//ruta para enviar los datos de pacientes
Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.pacientes.store')
->middleware('auth','can:admin.pacientes.store');

//ruta para obtener los datos del paciente
Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.pacientes.show')
->middleware('auth','can:admin.pacientes.show');

//ruta para editar datos del paciente
Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.pacientes.edit')
->middleware('auth','can:admin.pacientes.edit');

//ruta para actualizar datos del paciente
Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.pacientes.update')
->middleware('auth','can:admin.pacientes.update');

//ruta para eliminar los datos del paciente
Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')
->middleware('auth','can:admin.pacientes.confirmDelete');

Route::delete('/admin/pacientes/{id}/', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')
->middleware('auth','can:admin.pacientes.destroy');



//rutas para el admin - Consultorios
Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')
->middleware('auth','can:admin.consultorios.index');

//ruta para el create consultorios
Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')
->middleware('auth','can:admin.consultorios.create');

//ruta para enviar los datos de los consultorios
Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')
->middleware('auth','can:admin.consultorios.store');

//ruta para obtener los datos de la consultorio
Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')
->middleware('auth','can:admin.consultorios.show');

//ruta para editar datos del consultorio
Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')
->middleware('auth','can:admin.consultorios.edit');

//ruta para actualizar los datos de los consultorios
Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')
->middleware('auth','can:admin.consultorios.update');

//ruta para eliminar los datos de los consultorios
Route::get('/admin/consultorios/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')
->middleware('auth','can:admin.pacientes.confirmDelete');

Route::delete('/admin/consultorios/{id}/', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')
->middleware('auth','can:admin.consultorios.destroy');



//rutas para el admin - Doctores
Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctores.index')
->middleware('auth','can:admin.doctores.index');

//ruta para el create consultorios
Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctores.create')
->middleware('can:admin.doctores.create');

//ruta para enviar los datos de los consultorios
Route::post('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctores.store')
->middleware('auth','can:admin.doctores.store');

//ruta para ver los informes de los doctores
Route::get('/admin/doctores/informes', [App\Http\Controllers\DoctorController::class, 'informes'])->name('admin.doctores.informes')
->middleware('auth','can:admin.doctores.informes');

//ruta para generar los informes de los doctores en PDF
Route::get('/admin/doctores/pdf', [App\Http\Controllers\DoctorController::class, 'pdf'])->name('admin.doctores.pdf')
->middleware('auth','can:admin.doctores.pdf');

//ruta para obtener los datos de la consultorio
Route::get('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctores.show')
->middleware('auth','can:admin.doctores.show');

//ruta para editar datos del consultorio
Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctores.edit')
->middleware('auth','can:admin.doctores.edit');

//ruta para actualizar los datos de los consultorios
Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctores.update')
->middleware('auth','can:admin.doctores.update');

//ruta para eliminar los datos de los consultorios
Route::get('/admin/doctores/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])->name('admin.doctores.confirmDelete')
->middleware('auth','can:admin.doctores.confirmDelete');

Route::delete('/admin/doctores/{id}/', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('admin.doctores.destroy')
->middleware('auth','can:admin.doctores.destroy');




//rutas para el admin - Horarios
Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horarios.index')
->middleware('auth','can:admin.horarios.index');

//ruta para el create horarios
Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horarios.create')
->middleware('auth','can:admin.horarios.create');

//ruta para enviar los datos de horarios
Route::post('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horarios.store')
->middleware('auth','can:admin.horarios.store');

//ruta para obtener los datos de los horarios
Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('admin.horarios.show')
->middleware('auth','can:admin.horarios.show');

//ruta para editar datos de los horarios
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit')
->middleware('auth','can:admin.horarios.edit');

//ruta para actualizar los datos de horarios
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update')
->middleware('auth','can:admin.horarios.update');

//ruta para eliminar los datos de los horarios
Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorarioController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete')
->middleware('auth','can:admin.horarios.confirmDelete');

Route::delete('/admin/horarios/{id}/', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('admin.horarios.destroy')
->middleware(middleware:'admin.horarios.confirmDelete');





//ruta ajax con autenticación
/*  Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_consultorios'])
->name('admin.horarios.cargar_datos_consultorios')
->middleware('auth','can:admin.horarios.cargar_datos_consultorios'); */
Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_consultorios'])
->name('admin.horarios.cargar_datos_consultorios')
->middleware(['auth', 'can:cargar_datos_consultorios']);




//rutas para el usuario
//ruta ajax
Route::get('/consultorios/{id}', [App\Http\Controllers\WebController::class, 'cargar_datos_consultorios'])
->name('cargar_datos_consultorios')
->middleware(middleware:'can:cargar_datos_consultorios');


//ruta ajax para mostrar los horarios de cada doctor
Route::get('/cargar_reserva_doctores/{id}', [App\Http\Controllers\WebController::class, 'cargar_reserva_doctores'])->name('cargar_reserva_doctores')
->middleware(middleware:'can:cargar_reserva_doctores');

//ruta ajax para mostrar las reservas de turnos
Route::get('/admin/ver_reservas/{id}', [App\Http\Controllers\AdminController::class, 'ver_reservas'])->name('ver_reservas')
->middleware(middleware:'can:ver_reservas');

//ruta para que el usuario normal registre un turno
Route::post('/admin/eventos/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.eventos.create')
->middleware(middleware:'can:admin.eventos.create');

//ruta para eliminar el evento correspondiente a un turno creado
Route::delete('/admin/eventos/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('admin.eventos.destroy')
->middleware(middleware:'can:admin.eventos.destroy');



//rutas para las reservas
Route::get('/admin/reservas/informes', [App\Http\Controllers\EventController::class, 'informes'])
->name('admin.reservas.informes')
->middleware(middleware:'can:admin.reservas.informes');

//ruta para mostrar el informe completo
Route::get('/admin/reservas/pdf', [App\Http\Controllers\EventController::class, 'pdf'])
->name('admin.reservas.pdf')
->middleware(middleware:'can:admin.reservas.pdf');

//ruta para mostrar el informe por fechas
Route::get('/admin/reservas/pdf_fechas', [App\Http\Controllers\EventController::class, 'pdf_fechas'])
->name('admin.reservas.pdf_fechas')
->middleware(middleware:'can:admin.reservas.pdf_fechas');



//rutas para el historial clínico
Route::get('/admin/historial', [App\Http\Controllers\HistorialController::class, 'index'])->name('admin.historial.index')
->middleware('auth','can:admin.historial.index');

//ruta para el create consultorios
Route::get('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'create'])->name('admin.historial.create')
->middleware('can:admin.historial.create');

//ruta para enviar los datos de los consultorios
Route::post('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'store'])->name('admin.historial.store')
->middleware('auth','can:admin.historial.store');

//ruta para generar los informes de los doctores en PDF
Route::get('/admin/historial/pdf/{id}', [App\Http\Controllers\HistorialController::class, 'pdf'])->name('admin.historial.pdf')
->middleware('auth','can:admin.historial.pdf');

//ruta para buscar un paciente y generar un historial
Route::get('/admin/historial/buscar_paciente', [App\Http\Controllers\HistorialController::class, 'buscar_paciente'])->name('admin.historial.buscar_paciente')
->middleware('auth','can:admin.historial.buscar_paciente');

//ruta para imprimir el historial del paciente
Route::get('/admin/historial/paciente/{id}', [App\Http\Controllers\HistorialController::class, 'imprimir_historial'])->name('admin.historial.imprimir_historial')
->middleware('auth','can:admin.historial.imprimir_historial');


//ruta para obtener los datos de la consultorio
Route::get('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'show'])->name('admin.historial.show')
->middleware('auth','can:admin.historial.show');

//ruta para editar datos del consultorio
Route::get('/admin/historial/{id}/edit', [App\Http\Controllers\HistorialController::class, 'edit'])->name('admin.historial.edit')
->middleware('auth','can:admin.historial.edit');

//ruta para actualizar los datos de los consultorios
Route::put('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'update'])->name('admin.historial.update')
->middleware('auth','can:admin.historial.update');

//ruta para eliminar los datos de los consultorios
Route::get('/admin/historial/{id}/confirm-delete', [App\Http\Controllers\HistorialController::class, 'confirmDelete'])->name('admin.historial.confirmDelete')
->middleware('auth','can:admin.historial.confirmDelete');

Route::delete('/admin/historial/{id}/', [App\Http\Controllers\HistorialController::class, 'destroy'])->name('admin.historial.destroy')
->middleware('auth','can:admin.historial.destroy');




//rutas para los pagos
Route::get('/admin/pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('admin.pagos.index')
->middleware('auth','can:admin.pagos.index');

//ruta para el create consultorios
Route::get('/admin/pagos/create', [App\Http\Controllers\PagoController::class, 'create'])->name('admin.pagos.create')
->middleware('can:admin.pagos.create');

//ruta para enviar los datos de los consultorios
Route::post('/admin/pagos/create', [App\Http\Controllers\PagoController::class, 'store'])->name('admin.pagos.store')
->middleware('auth','can:admin.pagos.store');

//ruta para generar los informes de los doctores en PDF
Route::get('/admin/pagos/pdf/{id}', [App\Http\Controllers\PagoController::class, 'pdf'])->name('admin.pagos.pdf')
->middleware('auth','can:admin.pagos.pdf');

//ruta para obtener los datos de la consultorio
Route::get('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'show'])->name('admin.pagos.show')
->middleware('auth','can:admin.pagos.show');

//ruta para editar datos del consultorio
Route::get('/admin/pagos/{id}/edit', [App\Http\Controllers\PagoController::class, 'edit'])->name('admin.pagos.edit')
->middleware('auth','can:admin.pagos.edit');

//ruta para actualizar los datos de los consultorios
Route::put('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'update'])->name('admin.pagos.update')
->middleware('auth','can:admin.pagos.update');

//ruta para eliminar los datos de los consultorios
Route::get('/admin/pagos/{id}/confirm-delete', [App\Http\Controllers\PagoController::class, 'confirmDelete'])->name('admin.pagos.confirmDelete')
->middleware('auth','can:admin.pagos.confirmDelete');

Route::delete('/admin/pagos/{id}/', [App\Http\Controllers\PagoController::class, 'destroy'])->name('admin.pagos.destroy')
->middleware('auth','can:admin.pagos.destroy');