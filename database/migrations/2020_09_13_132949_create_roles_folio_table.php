<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesFolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_folio', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');            
            $table->string('prefix', 15);
            $table->integer('next')->default(0);
        });

        //Insertar los prefijos basado en los roles
        DB::table('roles_folio')->insert(array('id' => 1, 'role_id' => 3, 'prefix' => 'PRMM'));
        DB::table('roles_folio')->insert(array('id' => 2, 'role_id' => 4, 'prefix' => 'PRMC'));
        DB::table('roles_folio')->insert(array('id' => 3, 'role_id' => 5, 'prefix' => 'PRMD'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles_folio', function (Blueprint $table) {
            Schema::drop('roles_folio');
        });
    }
}
