<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobdesctargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdesctargets', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->foreignId('user_id')
            ->constrained('users');
            $table->longText('tugas');
            $table->integer('sasaran');
            $table->string('tipe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobdesctargets');
    }
}
