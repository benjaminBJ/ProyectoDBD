<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Subcategoria;
use App\Models\UnidadesMedida;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //Obtener todos los datos de una table (get)
    public function index()
    {
        $producto = Producto::all()->where('delete',FALSE);
        if($producto != NULL){
            return response()->json($producto);
        }
        else {
            $data['titulo'] = '404';
            $data['nombre'] = 'Page not found';
            return response()
                ->view('errors.404',$data,404);
        }
    }

    //Crear una nueva tupla (post)
    public function store(Request $request, $id_subcategoria, $id_unidades_medida)
    {
       $producto = new Producto();
       $producto->delete = FALSE;
 
       $fallido=FALSE;
       $mensajeFallos='';
       //Valida que 'nombre' no sea nulo
       if($request->nombre == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
       }
       else{
            $producto->nombre = $request->nombre;
       }
        //Valida que 'descripcion' sea no nulo 
       if(($request->descripcion == NULL) ){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'descripcion' es inválido ";
       }
       else{
            $producto->descripcion = $request->descripcion;
       }
       //Valida atributo 'precio'
       if(($request->precio == NULL)){
           $fallido=TRUE;
           $mensajeFallos=$mensajeFallos."- El campo 'precio' está vacío";
       }
       else if (!ctype_digit($request->precio)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'precio' debe ser un numero mayor a 0";
       }
       else{
           $producto->precio=$request->precio;
       }
       //Valida atributo 'stock'
       if(($request->stock == NULL)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'stock' está vacío";
         }
        else if (!ctype_digit($request->stock)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'stock' debe ser un numero mayor o igual a 0";
        }
        else{
            $producto->stock=$request->stock;
        }
       //valida que id_subcategorias sea no nulo
       if($id_subcategoria == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_subcategorias' está vacío ";
        }
        else{
            $producto->id_subcategorias= $id_subcategoria;
        }

        //Valida que id existe en subcategorias
        $subcategoria = Subcategoria::find($id_subcategoria);
        if(($subcategoria == NULL) || ($subcategoria->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'subcategoria' no existe"
            ]);
        }
        //Valida que id_unidades_medidas no es nulo
        if($id_unidades_medida == NULL){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'id_unidades_medidas' está vacío ";
        }
        else{
            $producto->id_unidades_medidas= $id_unidades_medida;
        }

        //Valida que id existe en unidades_medidas
        $unidades_medidas = UnidadesMedida::find($id_unidades_medida);
        if(($unidades_medidas == NULL) || ($unidades_medidas->delete==TRUE)){
            return response()->json([
                "message" => "El dato en 'unidades_medidas' no existe"
            ]);
        }



        // Si se crea
        if($fallido == FALSE){
                $producto->save();
                return response()->json([
                    "message" => "Se ha creado el producto",
                    "id" => $producto->id
                ]);
        }

        // No se crea
        else{
            return response()->json([
                    "message" => $mensajeFallos,
                ]); 
        }
        }

    //Obtener una tupla especifica de una tabla por ID (get)
    public function show($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $producto = Producto::find($id);

        //Valida existencia de tupla
        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }

        else{
            return response()->json($producto);
        }

    }

    //Modificar una tupla especifica (put)
    public function update(Request $request, $id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $producto = Producto::find($id);
        $fallido=FALSE;
        $mensajeFallos='';
        
        //Valida existencia de tupla
        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        //Valida que 'nombre' no sea nulo
        if($request->nombre == NULL){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'nombre' está vacío ";
        }
        else{
             $producto->nombre = $request->nombre;
        }
         //Valida que 'descripcion' sea no nulo 
        if(($request->descripcion == NULL) ){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'descripcion' es inválido ";
        }
        else{
             $producto->descripcion = $request->descripcion;
        }
        //Valida atributo 'precio'
       if(($request->precio == NULL)){
           $fallido=TRUE;
           $mensajeFallos=$mensajeFallos."- El campo 'precio' está vacío";
       }
       else if (!ctype_digit($request->precio)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'precio' debe ser un numero mayor a 0";
       }
       else{
           $producto->precio=$request->precio;
       }
       //Valida atributo 'stock'
       if(($request->stock == NULL)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'stock' está vacío";
         }
        else if (!ctype_digit($request->stock)){
            $fallido=TRUE;
            $mensajeFallos=$mensajeFallos."- El campo 'stock' debe ser un numero mayor o igual a 0";
        }
        else{
            $producto->stock=$request->stock;
        }
        //valida que id_subcategorias sea no nulo
        if($request->id_subcategorias == NULL){
         $fallido=TRUE;
         $mensajeFallos=$mensajeFallos."- El campo 'id_subcategorias' está vacío ";
     }
 
     if($fallido == FALSE){
         if(ctype_digit($request->id_subcategorias)==FALSE){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'id_subcategorias' es inválido ";   
         }
         else{
             $producto->id_subcategorias = $request->id_subcategorias;
         }
     }
 
        //Valida que id existe en subcategorias
     $subcategoria = Subcategoria::find($request->id_subcategorias);
     if(($subcategoria == NULL) || ($subcategoria->delete==TRUE)){
         return response()->json([
             "message" => "El dato en 'subcategoria' no existe"
         ]);
     }
     //Valida que id_unidades_medidas no es nulo
     if($request->id_unidades_medidas == NULL){
         $fallido=TRUE;
         $mensajeFallos=$mensajeFallos."- El campo 'id_unidades_medidas' está vacío ";
     }
 
     if($fallido == FALSE){
         if(ctype_digit($request->id_unidades_medidas)==FALSE){
             $fallido=TRUE;
             $mensajeFallos=$mensajeFallos."- El campo 'id_unidades_medidas' es inválido ";   
         }
         else{
             $producto->id_unidades_medidas = $request->id_unidades_medidas;
         }
     }
     //Valida que id existe en unidades_medidas
     $unidades_medidas = UnidadesMedida::find($request->id_unidades_medidas);
     if(($unidades_medidas == NULL) || ($unidades_medidas->delete==TRUE)){
         return response()->json([
             "message" => "El dato en 'unidades_medidas' no existe"
            ]);
        }
 
 
 
    // Se actualiza
    if($fallido == FALSE){
        $producto->save();
        return response()->json([
        "message" => "Se ha actualizado el producto",
        "id" => $producto->id
        ]);
    }
 
    // No se actualiza
    else{
        return response()->json([
        "message" => $mensajeFallos,
        ]); 
    }
}

    //Borrar una tupla especifica
    public function destroy($id)
    {
        // Valida ID
        if(ctype_digit($id) != TRUE){
            return response()->json([
                "message" => "El id es inválido"
            ]);
        }

        $producto = Producto::find($id);

        //Valida existencia de tupla
        if(($producto == NULL) || ($producto->delete==TRUE)){
            return response()->json([
                "message" => "El dato no existe"
            ]);
        }
        $producto->delete = TRUE;
        $producto->save();
        return response()->json([
            "message" => "El dato ha sido borrado"
        ]);
    }
}
