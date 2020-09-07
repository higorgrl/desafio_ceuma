<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Aluno;
use App\Curso;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
            ["titulo"=>"Admin", "url"=>route('admin')],
            ["titulo"=>"Lista de Alunos", "url"=>""]
        ]);

        $listaModelo = Aluno::select('id','cod_aluno','nome_aluno','nome_curso')->paginate(10);

        $listaCursos = Curso::select('id','codigo','nome','data_cadastro','carga_horaria');   

        //$listaCursos = DB::table('cursos')->select('');

        return view('admin.alunos.index',compact('listaMigalhas','listaModelo','listaCursos'));
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
            'cod_aluno'   => 'required|min:4|max:4|unique:alunos',
            'nome_aluno'  => 'required|string|max:255',
            'cpf'         => 'required|min:11|max:11|unique:alunos',
            'endereco'    => 'required|string|max:255',
            'cep'         => 'required|min:8|max:8',
            'email_aluno' => 'required|string|email|max:255|unique:alunos',
            'telefone'    => 'required|min:9',
            'nome_curso'  => 'required|string',
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

        if(isset($data['id']) && $data['id'] != "") {
            $validacao = \Validator::make($data,[
                'cod_aluno'   => ['required','min:4','max:4',Rule::unique('alunos')->ignore($id)],
                'nome_aluno'  => 'required|string|max:255',
                'cpf'         => ['required','min:11','max:11',Rule::unique('alunos')->ignore($id)],
                'endereco'    => 'required|string|max:255',
                'cep'         => 'required|min:8|max:8',
                'email_aluno' => ['required','string','email','max:255',Rule::unique('alunos')->ignore($id)],
                'telefone'    => 'required|min:9',
                'nome_curso'  => 'required|string',
            ]);
        }else{
            $validacao = \Validator::make($data,[
                'cod_aluno'   => ['required','min:4','max:4',Rule::unique('alunos')->ignore($id)],
                'nome_aluno'  => 'required|string|max:255',
                'cpf'         => ['required','min:11','max:11',Rule::unique('alunos')->ignore($id)],
                'endereco'    => 'required|string|max:255',
                'cep'         => 'required|min:8|max:8',
                'email_aluno' => ['required','string','email','max:255',Rule::unique('alunos')->ignore($id)],
                'telefone'    => 'required|min:9',
                'nome_curso'  => 'required|string',
            ]);
            unset($data['id']);
        }

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
