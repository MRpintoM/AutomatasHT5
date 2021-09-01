<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Registro extends Controller
{
    public function Welc()
    {
        return \view('welcome');


    }
    public function registrar(){

        return View('formulario');

    }

}
