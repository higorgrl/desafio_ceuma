<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Aluno;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas = json_encode([
            ["titulo"=>"Home", "url"=>route('home')],
            ["titulo"=>"Lista de Alunos", "url"=>""]
        ]);

        $listaModelo = Aluno::select('id','cod_aluno','nome_aluno','nome_curso')->paginate(2);    

        return view('admin.alunos.index',compact('listaMigalhas','listaModelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validacao = \Validator::make($data,[
            "cod_aluno" => "required",
            "nome_aluno" => "required",
            "cpf" => "required",
            "endereco" => "required",
            "cep" => "required",
            "email_aluno" => "required",
            "telefone" => "required",
            "nome_curso" => "required",
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Aluno::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Aluno::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validacao = \Validator::make($data,[
            "cod_aluno" => "required",
            "nome_aluno" => "required",
            "cpf" => "required",
            "endereco" => "required",
            "cep" => "required",
            "email_aluno" => "required",
            "telefone" => "required",
            "nome_curso" => "required",
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Aluno::find($id)->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aluno::find($id)->delete();
        return redirect()->back();
    }
}
