<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $fillable = ['cod_aluno','nome_aluno','cpf','endereco','cep','email_aluno','telefone','nome_curso'];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongs('App\Curso');
    }
}
