<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = ['teste 1','teste2','teste3', 'teste4', 'teste5', 'teste6', 'teste7', 'teste8', 'teste9', 'teste10', '12'];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
