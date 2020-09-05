<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relacionamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->integer('aluno_id')->unsigned()->default(1);
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['aluno_id']);
            $table->dropColumn('aluno_id');
        });
    }
}
