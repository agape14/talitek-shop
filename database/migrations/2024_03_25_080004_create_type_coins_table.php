<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_coins', function (Blueprint $table) {
            $table->id();
            $table->string('valor');
            $table->string('descripcion');
            $table->timestamps();
        });

        DB::table('type_coins')->insert([
            ['valor' => 'S/.', 'descripcion' => 'Soles',],
            ['valor' => '$', 'descripcion' => 'Dólares',],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_coins');
    }
}
