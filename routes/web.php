<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecoverpasswordMailable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Modulo usuario
Route::resource('user', 'User\UserController');
Route::post('user/search', 'User\UserController@search')->name('user.search');
Route::patch('user/{users}/roles', 'User\UserController@role')->name('user.role');
Route::post('user/updatePhoto', 'User\UserController@updatePhoto')->name('user.updatePhoto');
// Modulo clientes
Route::resource('client', 'Client\ClientController');
Route::post('client/search', 'Client\ClientController@search')->name('client.search');
Route::post('client/validateN', 'Client\ClientController@validateN')->name('client.validateN');
//Modulo de projectosvalidateN
Route::resource('project', 'Project\ProjectController');
Route::post('project/search', 'Project\ProjectController@search')->name('project.search');
Route::post('project/deletelocations', 'Project\ProjectController@deletelocations')->name('project.deletelocations');
Route::post('project/validateN', 'Project\ProjectController@validateN')->name('project.validateN');
//Modulo de listas
Route::resource('list', 'Listing\ListingController');
Route::post('list/search', 'Listing\ListingController@search')->name('list.search');
Route::post('list/showVals', 'Listing\ListingController@showVals')->name('list.showVals');
Route::post('list/findinfovalue', 'Listing\ListingController@findinfovalue')->name('list.findinfovalue');
Route::post('list/updatevalist', 'Listing\ListingController@updatevalist')->name('list.updatevalist');
Route::post('list/filtervalues', 'Listing\ListingController@filtervalues')->name('list.filtervalues');
//
Route::resource('valist', 'Valist\ValistController');
//partes
Route::resource('part', 'Part\PartController');
Route::post('part/clientv', 'Part\PartController@clientv')->name('part.clientv');
Route::post('part/deletecv', 'Part\PartController@deleteclientv')->name('part.deleteclientv');
Route::post('part/search', 'Part\PartController@search')->name('part.search');
Route::post('part/validateN', 'Part\PartController@validateN')->name('part.validateN');
//Modulo de servicios
Route::resource('serv', 'Serv\ServController');
Route::post('serv/clientv', 'Serv\ServController@clientv')->name('serv.clientv');
Route::post('serv/deletecv', 'Serv\ServController@deleteclientv')->name('serv.deleteclientv');
Route::post('serv/search', 'Serv\ServController@search')->name('serv.search');

//
Route::resource('permission', 'Permission\PermissionController');
Route::resource('role', 'Role\RoleController');
Route::post('role/search', 'Role\RoleController@search')->name('role.search');
//
Route::get('home', 'Home\HomeController@index')->name('home.index');
Route::post('home/search', 'Home\HomeController@search')->name('home.search');
// Modulo de componentes
Route::resource('component', 'Component\ComponentController');
Route::get('component/{id}/ControlFills', 'Component\ComponentController@formdinamic')->name('component.formdinamic');
Route::post('component/validSerial', 'Component\ComponentController@validSerial')->name('component.validSerial');
Route::post('component/search', 'Component\ComponentController@search')->name('component.search');
Route::post('component/fetch_data', 'Component\ComponentController@fetch_data')->name('component.fetch_data');
// Modulo de equipos
Route::resource('equipment', 'Equipment\EquipmentController');
Route::post('equipment/search', 'Equipment\EquipmentController@search')->name('equipment.search');
Route::post('equipment/showModelos', 'Equipment\EquipmentController@showModelos')->name('equipment.showModelos');
Route::post('equipment/showAttributes', 'Equipment\EquipmentController@showAttributes')->name('equipment.showAttributes');
Route::post('equipment/deleteCompo', 'Equipment\EquipmentController@deleteCompo')->name('equipment.deleteCompo');
Route::post('equipment/validateN', 'Equipment\EquipmentController@validateN')->name('equipment.validateN');

// Modulo de actividades
Route::resource('activity', 'Activity\ActivityController');
Route::post('activity/search', 'Activity\ActivityController@search')->name('activity.search');
Route::get('activity/{type}/main', 'Activity\ActivityController@main')->name('activity.main');
Route::get('activity/{type}/index', 'Activity\ActivityController@index')->name('activity.index');
Route::get('activity/{id}/mainform', 'Activity\ActivityController@mainform')->name('activity.mainform');
Route::get('activity/{array}/create', 'Activity\ActivityController@create')->name('activity.create');
Route::post('activity/storeInitial', 'Activity\ActivityController@storeInitial')->name('activity.storeInitial');
Route::post('activity/savetask', 'Activity\ActivityController@savetask')->name('activity.savetask');
Route::post('activity/parents', 'Activity\ActivityController@parents')->name('activity.parents');
Route::post('activity/search', 'Activity\ActivityController@search')->name('activity.search');
Route::post('activity/f1', 'Activity\ActivityController@f1')->name('activity.f1');
Route::post('activity/f2', 'Activity\ActivityController@f2')->name('activity.f2');
Route::post('activity/f3', 'Activity\ActivityController@f3')->name('activity.f3');
Route::post('activity/f4', 'Activity\ActivityController@f4')->name('activity.f4');
Route::post('activity/f5', 'Activity\ActivityController@f5')->name('activity.f5');
Route::post('activity/f6', 'Activity\ActivityController@f6')->name('activity.f6');
Route::post('activity/f7', 'Activity\ActivityController@f7')->name('activity.f7');
Route::post('activity/f8', 'Activity\ActivityController@f8')->name('activity.f8');
Route::post('activity/f9', 'Activity\ActivityController@f9')->name('activity.f9');
Route::post('activity/f10', 'Activity\ActivityController@f10')->name('activity.f10');
Route::post('activity/f11', 'Activity\ActivityController@f11')->name('activity.f11');
Route::post('activity/f12', 'Activity\ActivityController@f12')->name('activity.f12');
Route::post('activity/f13', 'Activity\ActivityController@f13')->name('activity.f13');
Route::post('activity/f14', 'Activity\ActivityController@f14')->name('activity.f14');
Route::post('activity/f15', 'Activity\ActivityController@f15')->name('activity.f15');
Route::post('activity/f16', 'Activity\ActivityController@f16')->name('activity.f16');
Route::post('activity/f17', 'Activity\ActivityController@f17')->name('activity.f17');
Route::post('activity/f18', 'Activity\ActivityController@f18')->name('activity.f18');
Route::post('activity/f19', 'Activity\ActivityController@f19')->name('activity.f19');
Route::post('activity/f20', 'Activity\ActivityController@f20')->name('activity.f20');
Route::post('activity/f21', 'Activity\ActivityController@f21')->name('activity.f21');
Route::post('activity/f22', 'Activity\ActivityController@f22')->name('activity.f22');
Route::post('activity/f23', 'Activity\ActivityController@f23')->name('activity.f23');
Route::post('activity/f24', 'Activity\ActivityController@f24')->name('activity.f24');
Route::post('activity/f25', 'Activity\ActivityController@f25')->name('activity.f25');
Route::post('activity/f26', 'Activity\ActivityController@f26')->name('activity.f26');
Route::post('activity/f27', 'Activity\ActivityController@f27')->name('activity.f27');
Route::post('activity/f28', 'Activity\ActivityController@f28')->name('activity.f28');
Route::post('activity/f29', 'Activity\ActivityController@f29')->name('activity.f29');
Route::post('activity/f30', 'Activity\ActivityController@f30')->name('activity.f30');
Route::post('activity/getEquip', 'Activity\ActivityController@getEquip')->name('activity.getEquip');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


