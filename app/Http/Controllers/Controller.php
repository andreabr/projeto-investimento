<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homePage()
    {
        $variavel = 'Titulo da Página HomePage';
        return view('welcome', [
            'title' => $variavel
        ]);
    }

    
    public function fazerLogin()
    {
        return view('user.login');
        echo "<h1>Fazer login.</h1>";
    }


}