<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Curso;
use App\Aluno;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CursosController extends Controller
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
            ["titulo"=>"Lista de Cursos", "url"=>""]
        ]);

        $listaCursos = Curso::select('id','codigo','nome','data_cadastro','carga_horaria')->paginate(10);

        return view('admin.cursos.index',compact('listaMigalhas','listaCursos'));
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
            'codigo' => 'required|min:6|max:6|unique:cursos',
            'nome' => 'required|string|max:255',
            'data_cadastro' => 'required',
            'carga_horaria' => 'required|string',
        ]);

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Curso::create($data);
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
        return Curso::find($id);
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
                'codigo' => ['required','min:6','max:6',Rule::unique('cursos')->ignore($id)],
                'nome' => 'required|string|max:255',
                'data_cadastro' => 'required',
                'carga_horaria' => 'required|string',
            ]);
        }else{
            $validacao = \Validator::make($data,[
                'codigo' => ['required','min:6','max:6',Rule::unique('cursos')->ignore($id)],
                'nome' => 'required|string|max:255',
                'data_cadastro' => 'required',
                'carga_horaria' => 'required|string',
            ]);
            unset($data['id']);
        }

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        Curso::find($id)->update($data);
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
        Curso::find($id)->forceDelete();
        return redirect()->back();
    }
}
