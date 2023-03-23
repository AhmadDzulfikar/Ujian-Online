<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsianSingkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isian_singkats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('kunci');
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
        Schema::dropIfExists('isian_singkats');
    }
}
