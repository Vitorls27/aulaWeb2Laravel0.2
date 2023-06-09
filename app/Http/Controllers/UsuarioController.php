<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;

class UsuarioController extends Controller
{
   function index(){

        $usuarios = Usuario::All();
       // dd($usuarios);

		return view("UsuarioList")->with(["usuarios"=> $usuarios]);
	 }

    function create(){

        $categorias = Categoria::orderBy('nome')->get();

        return view("UsuarioForm")->with(["categorias"=> $categorias]);
     }

     function store(Request $request){
        $request->validate([
            'nome'=>"required | max: 120",
            'telefone'=>"required | max: 20",
            'email'=>"nullable | email | max: 100",
            'categoria_id'=>"nullable",
            'imagem'=> "nullable | image | mimes:jpeg, jpg, png | max:2049"
        ],
        [
            'nome.required'=>"O nome é obrigatório",
            'nome.max'=>"Só é permitido 120 caracteres",
            'telefone.required'=>"O telefone é obrigatório",
            'telefone.max'=>"Só é permitido 20 caracteres",
            'nome.max'=>"Só é permitido 100 caracteres"
        ]
    );
    $imagem = $request->file('imagem');
    $nome_arquivo ="";
    if($imagem){
        $nome_arquivo = date('YmdHis').".".$imagem->getClientOriginalExtension();
        $diretorio = 'imagem/';
        $imagem->storeAs($diretorio,$nome_arquivo,'public');
        $nome_arquivo = $diretorio.$nome_arquivo;
    }
      //dd( $request->nome);
        Usuario::create([
            'nome'=> $request->nome,
            'telefone'=> $request->telefone,
            'email'=> $request->email,
            'categoria_id'=> $request->categoria_id,
            'imagem'=> $nome_arquivo
        ]);

        return \redirect()->action("App\Http\Controllers\UsuarioController@index");
     }

     function update(Request $request){
        $request->validate([
            'nome'=>"required | max: 120",
            'telefone'=>"required | max: 20",
            'email'=>"nullable | email | max: 100",
            'categoria_id'=>"nullable",
            'imagem'=> "nullable | image | mimes:jpeg, jpg, png | max:2049"
        ],[
            'nome, required'=>"O nome é obrigatório",
            'nome, max'=>"Só é permitido 120 caracteres",
            'telefone, required'=>"O telefone é obrigatório",
            'telefone, max'=>"Só é permitido 20 caracteres",
            'nome, max'=>"Só é permitido 100 caracteres"
        ]);
        //dd( $request->nome);
        $imagem = $request->file('imagem');
        $nome_arquivo ="";
        if($imagem){
            $nome_arquivo = date('YmdHis').".".$imagem->getClientOriginalExtension();
            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio,$nome_arquivo,'public');
            $nome_arquivo = $diretorio.$nome_arquivo;
        }

          Usuario::updateOrCreate(['id'=>$request->id], [
              'nome'=> $request->nome,
              'telefone'=> $request->telefone,
              'email'=> $request->email,
              'categoria_id'=> $request->categoria_id,
              'imagem'=> $nome_arquivo]);

          return \redirect()->action("App\Http\Controllers\UsuarioController@index");
        }

     function edit($id){
        $usuario = Usuario::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();
        //dd($usuario);
        return view("UsuarioForm")->with(['usuario'=> $usuario, "categorias"=> $categorias]);
     }
     function show($id){
        $usuario = Usuario::findOrFail($id);
        $categorias = Categoria::orderBy('nome')->get();
        //dd($usuario);
        return view("UsuarioForm")->with(['usuario'=> $usuario, "categorias"=> $categorias]);
     }

//

     function destroy($id){
        $usuario = Usuario::findOrFail($id);

        $usuario->delete();

        return \redirect()->action("App\Http\Controllers\UsuarioController@index");
     }

     function search(Request $request){
        if($request->campo == "nome"){
            $usuarios = Usuario::where('nome','like','%'.$request->valor.'%')->get();
        } else {
            $usuarios = Usuario::All();
        }
       // dd($usuarios);

		return view("UsuarioList")->with(["usuarios"=> $usuarios]);
	 }

}
