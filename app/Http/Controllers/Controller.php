<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Support\Facades\View;

abstract class Controller{
   public function __construct(){
        $categorias = Categoria::all();
        View::share('categorias', $categorias);
   } 
}
