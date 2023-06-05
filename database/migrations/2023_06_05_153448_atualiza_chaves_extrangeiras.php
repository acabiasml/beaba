<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AtualizaChavesExtrangeiras extends Migration
{

    public function up()
    {
        DB::statement("ALTER TABLE frequencias ADD CONSTRAINT FK_id_diarios FOREIGN KEY (diarios_id) REFERENCES diarios(id) ON DELETE CASCADE;");
        DB::statement("ALTER TABLE frequencias ADD CONSTRAINT FK_id_users FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE;");
        DB::statement("ALTER TABLE frequencias ADD CONSTRAINT FK_id_turmas FOREIGN KEY (turmas_id) REFERENCES turmas(id) ON DELETE CASCADE;");
    }

    public function down()
    {
        //
    }
}
