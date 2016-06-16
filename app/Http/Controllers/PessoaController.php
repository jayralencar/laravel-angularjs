<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB; // para usar a classe DB

class PessoaController extends Controller
{
	// Listando pessoas
    public function lista()
    {
    	return DB::table('pessoas')
    		->get();
    }

    // Cadastrando Pessoa
    public function novo(Request $request)
    {
    	$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw

    	return DB::table('pessoas')
    		->insertGetId($data);
    }

    // Editando pessoas
	public function editar($id, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
		$res = DB::table('pessoas')
			->where('id',$id)
			->update($data);
 
		return ["status" => ($res)?'ok':'erro'];
	}

	// Excluindo pessoa
	public function excluir($id)
	{
		$res = DB::table('pessoas')
			-> where('id',$id)
			-> delete();
			
		return ["status" => ($res)?'ok':'erro'];
	}
}
