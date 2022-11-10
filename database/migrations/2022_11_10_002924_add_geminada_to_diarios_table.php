<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGeminadaToDiariosTable extends Migration
{
    public function up()
    {
        Schema::table('diarios', function (Blueprint $table) {
            $table->integer("geminada");
        });
    }

    public function down()
    {
        Schema::table('diarios', function (Blueprint $table) {
            $table->dropColumn("geminada");
        });
    }
}
