<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::orderBy('created_at', 'desc')->take(10)->get();
        $user = auth()->user()->id_empresa;
        $proveedores = Proveedores::where('id_empresa', $user)->get();
        $marcas = Marcas::where('id_empresa', $user)->get();
        $categorias = Categorias::where('id_empresa', $user)->get();
        $subcategorias = SubCategorias::where('id_empresa', $user)->get();

        return view('products.index', compact('proveedores', 'marcas', 'categorias', 'subcategorias', 'productos'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'stock' => 'required',
            'sku_scanner' => 'required_if:sku_generado,null',
            'costo' => 'required',
            'precio_normal' => 'required',
            'visibilidad_estatus' => 'required',
            'id_proveedor' => 'required',
            'codigo_proveedor' => 'required',
            'id_marca' => 'required',
            'id_categoria' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = auth()->user();

        if($request->get('sku_generado') == NULL){
            $sku = $request->get('sku_scanner');
        }else{
            $sku = $request->get('sku_generado');
        }

        if($request->get('nombre_marca') == NULL){
            $marcas = $request->get('id_marca');
        }else{
            $marcas = new Marcas;
            $marcas->nombre = $request->get('nombre_marca');
            $marcas->id_empresa = $user->id_empresa;
            $marcas->save();
            $marcas = $marcas->id;
        }

        if($request->get('nombre_categoria') == NULL){
            $categoria = $request->get('id_categoria');
        }else{
            $categoria = new Categorias;
            $categoria->nombre = $request->get('nombre_categoria');
            $categoria->area = 'Productos';
            $categoria->id_empresa = $user->id_empresa;
            $categoria->save();
            $categoria = $categoria->id;
        }

        if($request->get('nombre_subcategoria') == NULL){
            $subcategoria = $request->get('id_subcategoria');
        }else{
            $subcategoria = new SubCategorias;
            $subcategoria->nombre = $request->get('nombre_subcategoria');
            $subcategoria->id_categoria = $categoria;
            $subcategoria->id_empresa = $user->id_empresa;
            $subcategoria->save();
            $subcategoria = $subcategoria->id;
        }

        $producto = new Productos;
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->sku = $sku;
        $producto->id_proveedor = $request->get('id_proveedor');
        $producto->codigo_proveedor = $request->get('codigo_proveedor');
        $producto->stock = $request->get('stock');
        $producto->costo = $request->get('costo');
        $producto->precio_normal = $request->get('precio_normal');
        $producto->precio_mayo = $request->get('precio_mayo');
        $producto->precio_descuento = $request->get('precio_descuento');
        $producto->fecha_inicio_desc = $request->get('fecha_inicio_desc');
        $producto->fecha_fin_desc = $request->get('fecha_fin_desc');
        $producto->visibilidad_estatus = $request->get('visibilidad_estatus');
        $producto->id_marca = $marcas;
        $producto->id_categoria = $categoria;
        $producto->id_subcategoria = $subcategoria;
        $producto->clave_sat = $request->get('clave_sat');
        $producto->unidad_venta = $request->get('unidad_venta');

        if ($request->hasFile("imagen_principal")) {
            $file = $request->file('imagen_principal');
            $path = public_path() . '/imagen_principal';
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $producto->imagen_principal = $fileName;
        }

        $producto->id_empresa = $user->id_empresa;
        $producto->id_user = $user->id;
        $producto->save();

        $producto_data = [
            "nombre" => $producto->nombre,
            "stock" => $producto->stock,
            "precio" => $producto->precio_normal,
            "sku" => $producto->sku,
        ];

        return response()->json(['success' => true, 'producto_data' => $producto_data]);

    }
}
