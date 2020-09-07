<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $fillable = ['cod_aluno','nome_aluno','cpf','endereco','cep','email_aluno','telefone','nome_curso','curso_id'];

    protected $dates = ['deleted_at'];

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
}
