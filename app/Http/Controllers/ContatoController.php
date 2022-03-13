<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        
        $motivo_contatos = MotivoContato::all();
 
    return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request) {
       
        $regras = [
            'nome' => 'required|min:3|max:40|', //nomes com no minimo 3 caracteres e no maximo 40
            'telefone' => 'required|unique:site_contatos',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [

            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome só é permitido 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'telefone.unique' => 'O telefone informado já esta em uso',

            'required' => 'O campo :attribute deve ser preenchido',

            'email.unique' => 'O e-mail informado já está em uso',
            'email.email' => 'O email informado não é valido',

            'mensagem.max' => 'A mensagem deve ter no máximo 2.000 caracteres'

        ];


        $request->validate($regras, $feedback);
    
        SiteContato::create($request->all());
        return redirect()->route('site.index');

    }
}
