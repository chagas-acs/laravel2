<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal() {
        //echo 'Olá, seja bem vindo!';
        return view('site.principal'); //utilizando o método view, por default o larável busca a view dentro da pasta resource/views
    }
}
