<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller{

    public function index(){
        $libro= new Libro();
        // $products = DB::table('libros')->get();
        $datosLibro=libro::all();

        return response()->json($datosLibro);
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

    public function leer(Request $req){
        // $libro=new Libro();
        // $variable="";
        $todos=DB::table('Libro') // ese codigo aun no esta operativo
        // ->where('id',$req)
        ->get();
        return  response()->json($todos);// este conebtario es desde la cuenta de alvaro 
        
    }
}