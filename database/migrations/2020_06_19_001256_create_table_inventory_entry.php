<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInventoryEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_entry', function (Blueprint $table) {
            $table->increments('inventory_entryID');
            $table->string('description',250);
            $table->integer('estatus');
            $table->timestamps();
        });

        Schema::create('inventory_entry_det', function (Blueprint $table) {
            $table->increments('inventory_entry_detID');
            $table->integer('inventory_entryID')->unsigned();
            $table->integer('productsID')->unsigned();
            $table->integer('quantity');
        });

        Schema::table('inventory_entry_det', function (Blueprint $table) {
            $table->foreign('inventory_entryID')
              ->references('inventory_entryID')
              ->on('inventory_entry');
        });

        Schema::table('inventory_entry_det', function (Blueprint $table) {
            $table->foreign('productsID')
              ->references('productsID')
              ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_entry_det');
        Schema::dropIfExists('inventory_entry');
    }
}
