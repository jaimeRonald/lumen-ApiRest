<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;

class LibroController extends Controller{

    public function index(Request $req){
        // $datosLibro=Libro::all();
        return response()->json($req);
    }

    public function guardar(Request $req){
        $libro= new Libro();
        $req->file('imagen');// la infomracion se almacena con esto
        if($req->hasFile('imagen')){
            $nombreArchivoOrignial=$req->file('imagen')->getClientOriginalName();
            $nuevoNombre=Carbon::now()->timestamp."-".$nombreArchivoOrignial;
            $carpetaDestino="./upload/";
            $req->file('imagen')->move($carpetaDestino,$nuevoNombre);// mpvemps el nuevo nombre de la imagen a la caerpeta uploadas
            $libro->titulo=$req->titulo;
            $libro->imagen=ltrim($carpetaDestino,".").$nuevoNombre;// guardamos en el campo imagen la ruta de laimagen y nombre            $libro->save();
            $libro->save();
        }
       
        return response()->json($nuevoNombre);
    }
    public function update(Request $req){
        $libro= new Libro();
        $req->file('imagen');// la infomracion se almacena con esto
        // if($req->hasFile('imagen')){
        //     $nombreArchivoOrignial=$req->file('imagen')->getClientOriginalName();
        //     $nuevoNombre=Carbon::now()->timestamp."-".$nombreArchivoOrignial;
        //     $carpetaDestino="./upload/";
        //     $req->file('imagen')->move($carpetaDestino,$nuevoNombre);// mpvemps el nuevo nombre de la imagen a la caerpeta uploadas
        //     $libro->titulo=$req->titulo;
        //     $libro->imagen=ltrim($carpetaDestino,".").$nuevoNombre;// guardamos en el campo imagen la ruta de laimagen y nombre            $libro->save();
        //     $libro->save();
        // }
       
        return response()->json($req);
    }
}