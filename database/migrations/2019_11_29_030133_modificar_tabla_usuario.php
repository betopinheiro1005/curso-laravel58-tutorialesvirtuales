<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModificarTablaUsuario extends Migration
{
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->string('email', 100)->unique()->after('nombre');
        });
    }

    public function down()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropColumn('email');
        });
    }
}
