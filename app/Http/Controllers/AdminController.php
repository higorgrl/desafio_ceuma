<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;
use App\User;
use App\Aluno;

class AdminController extends Controller
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
            ["titulo"=>"Admin", "url"=>""]
        ]);

        $totalUsuarios = User::count();
        $totalCursos = Curso::count();
        $totalAlunos = Aluno::count();
        $totalServidores = User::where('servidor','=','S')->count();
        $totalAdmin = User::where('admin','=','S')->count();

        return view('admin',compact('listaMigalhas','totalUsuarios','totalCursos','totalAlunos','totalServidores','totalAdmin'));
    }
}
