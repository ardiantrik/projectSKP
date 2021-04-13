<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnnameSubdepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subdepartments', function (Blueprint $table) {
            $table->renameColumn('id_bidang', 'bidang_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subdepartments', function (Blueprint $table) {
            $table->renameColumn('bidang_id', 'id_bidang');
        });
    }
}
