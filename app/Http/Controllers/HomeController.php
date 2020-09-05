<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;
use App\User;
use App\Aluno;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo"=>"Home", "url"=>""]
        ]);

        $totalUsuarios = User::count();
        $totalCursos = Curso::count();
        $totalAlunos = Aluno::count();

        return view('home',compact('listaMigalhas','totalUsuarios','totalCursos','totalAlunos'));
    }
}
