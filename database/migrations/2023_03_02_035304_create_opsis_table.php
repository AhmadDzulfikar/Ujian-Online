<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opsis', function (Blueprint $table) {
            $table->id();
            $table->text('opsi');
            $table->foreignId('soal_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('is_correct');
            $table->string('urutan');
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
        Schema::dropIfExists('opsis');
    }
}
