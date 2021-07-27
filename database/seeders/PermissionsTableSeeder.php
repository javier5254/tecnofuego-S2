<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder; 
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Part\PartController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Serv\ServController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Activity\ActivityController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Listing\ListingController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Component\ComponentController;
use App\Http\Controllers\Equipment\EquipmentController;
use App\Http\Controllers\Permission\PermissionController;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *  Users
         */
        Permission::updateOrCreate(['name' => UserController::PERMISSIONS['create']], [
            'description' => 'Creación de usuarios',
            'category_id' => '1',
        ]);
        Permission::updateOrCreate(['name' => UserController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de usuario',
            'category_id' => '1',
        ]);
        Permission::updateOrCreate(['name' => UserController::PERMISSIONS['edit']], [
            'description' => 'Edición de usuario',
            'category_id' => '1',
        ]);
         /**
         * Clients
         */
        Permission::updateOrCreate(['name' => ClientController::PERMISSIONS['create']], [
            'description' => 'Creación de clientes',
            'category_id' => '2',
        ]);
        Permission::updateOrCreate(['name' => ClientController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de clientes',
            'category_id' => '2',
        ]);
        Permission::updateOrCreate(['name' => ClientController::PERMISSIONS['edit']], [
            'description' => 'Edición de clientes',
            'category_id' => '2',
        ]);
         /**
         * Components
         */
        Permission::updateOrCreate(['name' => ComponentController::PERMISSIONS['create']], [
            'description' => 'Creación de componentes',
            'category_id' => '3',
        ]);
        Permission::updateOrCreate(['name' => ComponentController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de componentes',
            'category_id' => '3',
        ]);
        Permission::updateOrCreate(['name' => ComponentController::PERMISSIONS['edit']], [
            'description' => 'Edición de componentes',
            'category_id' => '3',
        ]);
         /**
         * Equipment
         */
        Permission::updateOrCreate(['name' => EquipmentController::PERMISSIONS['create']], [
            'description' => 'Creación de equipos',
            'category_id' => '4',
        ]);
        Permission::updateOrCreate(['name' => EquipmentController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de equipos',
            'category_id' => '4',
        ]);
        Permission::updateOrCreate(['name' => EquipmentController::PERMISSIONS['edit']], [
            'description' => 'Edición de equipos',
            'category_id' => '4',
        ]);
          /**
         * Home
         */
        Permission::updateOrCreate(['name' => HomeController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de actividades',
            'category_id' => '5',
        ]);
         /**
         * Listing
         */
        Permission::updateOrCreate(['name' => ListingController::PERMISSIONS['create']], [
            'description' => 'Creación de listas',
            'category_id' => '6',
        ]);
        Permission::updateOrCreate(['name' => ListingController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de listas',
            'category_id' => '6',
        ]);
        Permission::updateOrCreate(['name' => ListingController::PERMISSIONS['edit']], [
            'description' => 'Edición de listas',
            'category_id' => '6',
        ]);
         /**
         * Part
         */
        Permission::updateOrCreate(['name' => PartController::PERMISSIONS['create']], [
            'description' => 'Creación de partes',
            'category_id' => '7',
        ]);
        Permission::updateOrCreate(['name' => PartController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de partes',
            'category_id' => '7',
        ]);
        Permission::updateOrCreate(['name' => PartController::PERMISSIONS['edit']], [
            'description' => 'Edición de partes',
            'category_id' => '7',
        ]);
         /**
         * Permission
         */
        Permission::updateOrCreate(['name' => PermissionController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de permiso',
            'category_id' => '8',
        ]);
        /**
         * Project
         */
        Permission::updateOrCreate(['name' => ProjectController::PERMISSIONS['create']], [
            'description' => 'Creación de proyectos',
            'category_id' => '9',
        ]);
        Permission::updateOrCreate(['name' => ProjectController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de proyectos',
            'category_id' => '9',
        ]);
        Permission::updateOrCreate(['name' => ProjectController::PERMISSIONS['edit']], [
            'description' => 'Edición de proyectos',
            'category_id' => '9',
        ]);
        /**
         * Role
         */
        Permission::updateOrCreate(['name' => RoleController::PERMISSIONS['create']], [
            'description' => 'Creación de roles',
            'category_id' => '10',
        ]);
        Permission::updateOrCreate(['name' => RoleController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de roles',
            'category_id' => '10',
        ]);
        Permission::updateOrCreate(['name' => RoleController::PERMISSIONS['edit']], [
            'description' => 'Edición de roles',
            'category_id' => '10',
        ]);
        /**
         * Serv
         */
        Permission::updateOrCreate(['name' => ServController::PERMISSIONS['create']], [
            'description' => 'Creación de servicios',
            'category_id' => '11',
        ]);
        Permission::updateOrCreate(['name' => ServController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de servicios',
            'category_id' => '11',
        ]);
        Permission::updateOrCreate(['name' => ServController::PERMISSIONS['edit']], [
            'description' => 'Edición de servicios',
            'category_id' => '11',
        ]);
        /**
         * Activity
         */
        Permission::updateOrCreate(['name' => ActivityController::PERMISSIONS['create']], [
            'description' => 'Creación de actividades',
            'category_id' => '12',
        ]);
        Permission::updateOrCreate(['name' => ActivityController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de actividades',
            'category_id' => '12',
        ]);
        Permission::updateOrCreate(['name' => ActivityController::PERMISSIONS['edit']], [
            'description' => 'Edición de actividades',
            'category_id' => '12',
        ]);
    }
}
