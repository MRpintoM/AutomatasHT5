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
    public function save( Request $request){
        if ($_POST) {
            $regex1 = '/.(a{3})./';
            $regex2 = '/(\w*[aeuio]\w*){3,}/';
            $regex3 = '/^\w+\s+\w+/';
            $regex4 = '/^(?=[a-zA-Z\d\s]{20,30}$)([a-zA-Z01-9]+ ?)*$/';
            $regex5 = '/(?=.*aa)(?=.*ee)/';
            $regexEmail = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';

            if (
                !preg_match($regex1, $_POST["nombre"]) || !preg_match($regex3, $_POST["nombre"]) || !preg_match($regex2, $_POST["nombre"]) || !preg_match($regex4, $_POST["nombre"]) || !preg_match($regex5, $_POST["nombre"])
                || !preg_match($regex1,  $_POST["apellido"]) || !preg_match($regex3,  $_POST["apellido"]) || !preg_match($regex2,  $_POST["apellido"]) || !preg_match($regex4,  $_POST["apellido"]) ||
                !preg_match($regex5,  $_POST["apellido"]) || !preg_match($regexEmail, $_POST["email"])
            ) {
                echo '<script>alert("Compruebe que los textos ingresados cumplen con las indicaciones recomendadas.")</script>';
            } else {
                echo '<script>alert("Se ha registrado satisfactoriamente.")</script>';
            };
        }


        $data = request()->validate([
            'nombre'=>'required|max:75',
            'apellido'=>'required|max:75',
            'email'=> 'required|max:75',

        ],[

            'nombre.required'=>'El campo Nombre no debe estar vacio.',
            'apellido.required'=>'El campo Apellido no debe estar vacio.',
            'email.required'=>'El campo Email no debe estar vacio.',


        ]);
        try{
            $nombres= Nombre::create([
                'Nombre'=>$data['nombre'],
            ]);
            $apellidos= Apellido::create([

                'Apellido'=>$data['apellido'],
            ]);
            $emails= Email::create([

                'Email'=>$data['email'],
            ]);

        }
        catch(QueryException $queryException){ //capturamos el erro en el catch
            return redirect()->route('registrarge')->with('warning', 'Ocurrio un error al registrar el producto. ');
        }

        return redirect()->route('registrarge')->with('success', 'Registro realizado exitosamente');

    }



}
