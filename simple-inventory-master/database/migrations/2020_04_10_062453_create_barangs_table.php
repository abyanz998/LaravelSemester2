<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id_barang');
            $table->unsignedInteger('ruangan_id')->index();
            $table->string('name_barang', 255);
            $table->string('file_foto_barang')->nullable();
            $table->integer('total');
            $table->integer('broken');
            $table->string('created_by',50)->index()->nullable(); // disetting biar NULL jadi kalo gak ada isinya dia tetep bisa
            $table->string('updated_by',50)->index()->nullable(); // disetting biar NULL jadi kalo gak ada isinya dia tetep bisa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
