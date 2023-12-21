<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\ModificacionesProductos;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ProductosController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $mesActual = $now->month;
        $user = auth()->user()->id_empresa;

        $productos = Productos::where('id_empresa', $user)->orderBy('created_at', 'desc')->take(10)->get();
        $modoficaciones_productos = ModificacionesProductos::whereMonth('fecha', $mesActual)->get();
        $proveedores = Proveedores::where('id_empresa', $user)->get();
        $marcas = Marcas::where('id_empresa', $user)->get();
        $categorias = Categorias::where('id_empresa', $user)->get();
        $subcategorias = SubCategorias::where('id_empresa', $user)->get();

        return view('products.index', compact('productos', 'modoficaciones_productos','proveedores', 'marcas', 'categorias', 'subcategorias'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'stock' => 'required',
            'sku_scanner' => 'required_if:sku_generado,null',
            'costo' => 'required',
            'precio_normal' => 'required',
            'visibilidad_estatus' => 'required',
            'id_proveedor' => 'required_if:nombre_proveedor,null',
            'codigo_proveedor' => 'required',
            'id_marca' => 'required_if:nombre_marca,null',
            'id_categoria' => 'required_if:nombre_categoria,null',
            'unidad_venta' => 'required',
            'precio_mayo' => 'required_if:RadioMayo,Si',
            'precio_descuento' => 'required_if:Radiorebaja,Si',
            'fecha_inicio_desc' => 'required_if:Radiorebaja,Si',
            'fecha_fin_desc' => 'required_if:Radiorebaja,Si',
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

        if($request->get('nombre_proveedor') == NULL){
            $proveedor = $request->get('id_proveedor');
        }else{
            $proveedor = new Proveedores;
            $proveedor->nombre = $request->get('nombre_proveedor');
            $proveedor->correo = '';
            $proveedor->telefono = '';
            $proveedor->id_empresa = $user->id_empresa;
            $proveedor->save();
            $proveedor = $proveedor->id;
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
        $producto->sku = $sku.'_'.$user->id_empresa;

        if($request->get('nombre_proveedor') == NULL){
            $producto->id_proveedor = $request->get('id_proveedor');
        }else{
            $producto->id_proveedor = $proveedor;
        }

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
            $path = public_path() . '/imagen_principal/empresa'.auth()->user()->id_empresa;
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

    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'stock' => 'required',
            'sku' => 'required',
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

        $producto = Productos::find($id);
        $changes = [];

        $fields = [
            'nombre' => 'Nombre',
            'costo' => 'Costo',
            'precio_normal' => 'Precio de venta',
            'sku' => 'SKU',
            'stock' => 'Stock',
            'unidad_venta' => 'Unidad de Venta',
            'visibilidad_estatus' => 'Visibilidad',
        ];

        foreach ($fields as $field => $label) {
            $oldValue = $producto->{$field};
            $newValue = $request->input($field);

            if ($oldValue != $newValue) {
                $changes[$field] = "De {$oldValue} A {$newValue}";
                $producto->{$field} = $newValue;
            }
        }

        if (!empty($changes)) {
            $historial = new ModificacionesProductos;
            $historial->id_producto = $id;
            $historial->id_user = $user->id;
            $historial->id_empresa = $user->id_empresa;
            $historial->fecha = Carbon::now();

            // Asigna cada cambio a su propia columna
            foreach ($changes as $column => $change) {
                $historial->{$column} = $change;
            }

            $historial->save();
        }

        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->sku = $request->get('sku');
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
            $path = public_path() . '/imagen_principal/empresa'.auth()->user()->id_empresa;
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
