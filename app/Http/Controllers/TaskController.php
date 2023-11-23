<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    private $requestHeaders = [
        "Content-Type" => "application/json",
        "Accept" => "application/json",
    ];

    private function sendGet(){
        return Http::withHeaders($this -> requestHeaders) 
            -> get(getenv("API_TASKS_URL"));
    }
    private function sendGetOne($id){
        return Http::withHeaders($this -> requestHeaders) 
            -> get(getenv("API_TASKS_URL") . $id);
    }
    private function sendDelete($id){
        return Http::withHeaders($this -> requestHeaders) 
            -> delete(getenv("API_TASKS_URL") . $id);
    }

    private function sendPost($data){
        return Http::withHeaders($this -> requestHeaders) 
            -> post(getenv("API_TASKS_URL"), $data);
    }

    public function Read(Request $request){
        try {
            $response = $this -> sendGet();

            if($response -> successful()){
                $tasks = json_decode($response->body(),true);
                return view("tasks",[ "tasks" => $tasks ]);
            }
        }
        catch(\Illuminate\Http\Client\ConnectionException $e) {
            return view("error",["error" => "No se pudo conectar con la API"]);
        }
        return view("error",[ "error" => "Hubo un error"]);
        
        
    }

    public function GetTask(Request $request,$idTask){
        try {
            $response = $this -> sendGetOne($idTask);

            if($response -> successful()){
                $task = json_decode($response->body(),true);
                return view("task",[ "task" => $task ]);
            }
        }
        catch(\Illuminate\Http\Client\ConnectionException $e) {
            return view("error",["error" => "No se pudo conectar con la API"]);
        }
        
        return view("error",[ "error" => "Hubo un error"]);
        
    }
    public function Create(Request $request){
        try {
            $response = $this -> sendPost([
                    "title" => $request -> post("title"),
                    "body" => $request -> post("body"),
                    "author_id" => $request -> post('authorId'),
                    "user_assigned_id" => $request -> post('userAssignedId'),
            ]);
            if($response -> successful()){
                $task = json_decode($response->body(),true);
                return redirect("/task")->with("task",$task);
            }
        }

        catch(\Illuminate\Http\Client\ConnectionException $e) {
            return view("error",["error" => "No se pudo conectar con la API"]);
        }

        return view("error",[ "error" => "Hubo un error"]);
        
    }

    public function Delete(Request $request, $idTask){
        try{
            $response = $this -> sendDelete($idTask);
            if(
                $response -> successful() && json_decode($response->body(),true)['message'] === "Deleted"
            ){
                return redirect("/task")
                    ->with("eliminado",$idTask);
            }
        }

        catch(\Illuminate\Http\Client\ConnectionException $e) {
            return view("error",["error" => "No se pudo conectar con la API"]);
        }
        
        return view("error",[ "error" => "Hubo un error"]);
        
    }
}
