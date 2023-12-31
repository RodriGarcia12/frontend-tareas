<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    private $requestHeaders = [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ];

    public function Register(Request $request){
        try {
            $response = Http::post("http://oauth.tasks-namespace.svc.cluster.local/api/v1/register/", [
                    "name" => $request -> post("name"),
                    "email" => $request -> post("email"),
                    "password" => $request -> post('password'),
                    "password_confirmation" => $request -> post('password_confirmation'),
            ]);
            if($response -> successful()){
                $user = json_decode($response->body(),true);
                return redirect("/task");
            }
        }

        catch(\Illuminate\Http\Client\ConnectionException $e) {
            return view("error",["error" => "No se pudo conectar con la API"]);
        }

        return view("error",[ "error" => "Hubo un error"]);
        
    }
}
