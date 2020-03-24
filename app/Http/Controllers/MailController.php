<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;



class MailController extends Controller
{
    //enviar correo con estructura basica

    public function enviarBasico() {
        $data = ['mensaje' => 'Bienvenidos al Workshop'];

        Mail::send([], $data, function($body){
            //cuerpo del envio deo correo

            $body->to('ofazzito@yahoo.com.ar','Prueba de Email');
            $body->subject('Laravel Prueba Basica');
            $body->from('ofazzito@yahoo.com.ar','Omar Fazzito');

        });

        return response()->json([
            'response' => 'Se envio correctamente el correo Basico',
            'code' => 200
        ]);
    }

    //enviar correo con estructura HTML

    public function enviarHtml() {
        $data = [
            'titulo' => 'Go desde Cero',
            'mensaje' => 'Lorem ipsum dolor sit, amet consectetur adipisicing 
            elit. Ratione excepturi inventore dolore, reprehenderit voluptate 
            nam suscipit mollitia amet dolorum deserunt sapiente quas voluptates 
            cum magnam? Corporis voluptas non ex possimus!'
        ];

        Mail::send('mail.testing', $data, function($body) use ($data){
            $body->to('ofazzito@yahoo.com.ar','Prueba de Email');
            $body->subject('Nuevo Curso ' .$data['titulo']);
            $body->from('ofazzito@yahoo.com.ar','Omar Fazzito');
        });

        return response()->json([
            'response' => 'Se envio correctamente el correo HTML',
            'code' => 200
        ]);
    }

    //enviar correo con PLANTILLA

    public function enviarTemplate() {
        $data = [
            'titulo' => 'Go desde Cero',
            'mensaje' => 'Lorem ipsum dolor sit, amet consectetur adipisicing 
            elit. Ratione excepturi inventore dolore, reprehenderit voluptate 
            nam suscipit mollitia amet dolorum deserunt sapiente quas voluptates 
            cum magnam? Corporis voluptas non ex possimus!'
        ];

        Mail::send('mail.template', $data, function($body) use ($data){
            $body->to('ofazzito@yahoo.com.ar','Prueba de Email');
            $body->subject('Nuevo Curso ' .$data['titulo']);
            $body->from('ofazzito@yahoo.com.ar','Omar Fazzito');
        });

        return response()->json([
            'response' => 'Se envio correctamente el correo con template',
            'code' => 200
        ]);
    }
}
