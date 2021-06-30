<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeingKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');
        });
        Schema::table('locations', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
        });

        Schema::table('users', function (Blueprint $table) {
            
            $table->bigInteger('typeD_id')->unsigned()->nullable();
            $table->foreign('typeD_id')->references('id')->on('valists'); 

            $table->bigInteger('charge_id')->unsigned()->nullable();
            $table->foreign('charge_id')->references('id')->on('valists');

            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects');

        });

        Schema::table('lists', function (Blueprint $table) {
            $table->bigInteger('father_id')->unsigned()->nullable();
            $table->foreign('father_id')->references('id')->on('lists');
        });
        Schema::table('valists', function (Blueprint $table) {
            $table->bigInteger('father_id')->unsigned()->nullable();
            $table->foreign('father_id')->references('id')->on('valists');
            $table->bigInteger('list_id')->unsigned();
            $table->foreign('list_id')->references('id')->on('lists');
        });

        Schema::table('client_costs', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
        });
        Schema::table('control_fills', function (Blueprint $table) {
            $table->bigInteger('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->bigInteger('valist_id')->unsigned()->nullable();
            $table->foreign('valist_id')->references('id')->on('valists');
            $table->bigInteger('component_id')->unsigned()->nullable();
            $table->foreign('component_id')->references('id')->on('components');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->bigInteger('family_id')->unsigned()->nullable();
            $table->foreign('family_id')->references('id')->on('valists');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('valists');
        });
        Schema::table('components', function (Blueprint $table) {
            $table->bigInteger('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
        });
        Schema::table('equipments', function (Blueprint $table) {
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->bigInteger('flota_id')->unsigned()->nullable();
            $table->foreign('flota_id')->references('id')->on('valists');
            $table->bigInteger('marca_id')->unsigned()->nullable();
            $table->foreign('marca_id')->references('id')->on('valists');
            $table->bigInteger('modelo_id')->unsigned()->nullable();
            $table->foreign('modelo_id')->references('id')->on('valists');
            $table->bigInteger('sistema_id')->unsigned()->nullable();
            $table->foreign('sistema_id')->references('id')->on('valists');
            $table->bigInteger('periodicidad_id')->unsigned()->nullable();
            $table->foreign('periodicidad_id')->references('id')->on('valists');
        });
        Schema::table('equip_has_compos', function (Blueprint $table) {
            $table->bigInteger('compo_id')->unsigned()->nullable();
            $table->foreign('compo_id')->references('id')->on('components');
            $table->bigInteger('equip_id')->unsigned()->nullable();
            $table->foreign('equip_id')->references('id')->on('equipments');
           
        });
        Schema::table('equip_has_parts', function (Blueprint $table) {
            $table->bigInteger('item_id')->unsigned()->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->bigInteger('equip_id')->unsigned()->nullable();
            $table->foreign('equip_id')->references('id')->on('equipments');
            $table->bigInteger('attr_id')->unsigned()->nullable();
            $table->foreign('attr_id')->references('id')->on('valists');
           
        });
        Schema::table('activities', function (Blueprint $table) {
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->bigInteger('creator_id')->unsigned()->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('type_activs');
            $table->bigInteger('equip_id')->unsigned()->nullable();
            $table->foreign('equip_id')->references('id')->on('equipments');
        });
        Schema::table('activ_lists', function (Blueprint $table) {
            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('type_activs');
            $table->bigInteger('father_id')->unsigned()->nullable();
            $table->foreign('father_id')->references('id')->on('activ_lists');
        });
       
        Schema::table('answers_activities', function (Blueprint $table) {
            $table->bigInteger('creator_id')->unsigned()->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->bigInteger('list_id')->unsigned()->nullable();
            $table->foreign('list_id')->references('id')->on('activ_lists');
            $table->bigInteger('activ_id')->unsigned()->nullable();
            $table->foreign('activ_id')->references('id')->on('activities');
        });
        
        
        

    
       
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
