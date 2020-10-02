<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsInTableCartExtras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart_extras', function (Blueprint $table) {
            $table->double('quantity', 9, 2)->default(0);
            $table->double('price', 9, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_extras', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('price');
        });
    }
}
