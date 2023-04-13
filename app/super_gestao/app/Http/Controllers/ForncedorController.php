<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForncedorController extends Controller
{
    public function index() {
        $fornecedores = [
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            'Fornecedor1',
            
        ];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
