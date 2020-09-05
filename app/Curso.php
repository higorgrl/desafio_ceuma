<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    protected $fillable = ['codigo','nome','data_cadastro','carga_horaria'];

    protected $dates = ['deleted_at'];

    public function aluno(){
        return $this->hasMany('App\Aluno');
    }
}
