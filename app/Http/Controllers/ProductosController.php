<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\ModificacionesProductos;
use App\Models\Ordenes;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ProductosController extends Controller
{
    public function index(){
        $now = Carbon::now();
        $mesActual = $now->month;
        $user = auth()->user()->id_empresa;

        $productos = Productos::where('id_empresa', $user)->orderBy('created_at', 'desc')->take(10)->get();
        $modoficaciones_productos = ModificacionesProductos::whereMonth('fecha', $mesActual)->get();
        $compras = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'No')->get();

        return view('products.index', compact('compras' ,'productos', 'modoficaciones_productos'));
    }

    public function filtro(Request $request){
        $now = Carbon::now();
        $mesActual = $now->month;
        $user = auth()->user()->id_empresa;
        $compras = Ordenes::where('id_empresa', $user)->where('cotizacion', '=', 'No')->get();
        $modoficaciones_productos = ModificacionesProductos::whereMonth('fecha', $mesActual)->get();

        $productos = Productos::where('id_empresa', $user);
        if( $request->nombre_producto){
            $productos = $productos->where('nombre', 'LIKE', "%" . $request->nombre_producto . "%");
        }
        if( $request->stock_de && $request->stock_a ){
            $productos = $productos->where('stock', '>=', $request->stock_de)
                                     ->where('stock', '<=', $request->stock_a);
        }
        if( $request->id_marca){
            $productos = $productos->where('id_marca', 'LIKE', "%" . $request->id_marca . "%");
        }
        if( $request->id_categoria){
            $productos = $productos->where('id_categoria', 'LIKE', "%" . $request->id_categoria . "%");
        }
        if( $request->id_subcategoria){
            $productos = $productos->where('id_subcategoria', 'LIKE', "%" . $request->id_subcategoria . "%");
        }
        if( $request->id_proveedor){
            $productos = $productos->where('id_proveedor', 'LIKE', "%" . $request->id_proveedor . "%");
        }
        if( $request->visibilidad_estatus){
            $productos = $productos->where('visibilidad_estatus', 'LIKE', "%" . $request->visibilidad_estatus . "%");
        }
        if( $request->descuento){
            $productos = $productos->where('descuento', 'LIKE', "%" . $request->descuento . "%");
        }
        $productos = $productos->get();
        return view('products.index', compact('productos','modoficaciones_productos','compras'));
    }

    public function bukaction_pausar(Request $request){

        $productosSeleccionados = $request->get('productos');

        $products = []; // Inicializar un arreglo vacío para almacenar los productos

        foreach ($productosSeleccionados as $producto) {
            $product = Productos::find($producto); // Obtener el producto por SKU

            if ($product) {
                $product->visibilidad_estatus = 'No';
                $product->update();
            }
        }

        return response()->json(['success' => true]);
    }

    public function bukaction_publicar(Request $request){
        $productosSeleccionados = $request->get('productos');

        $products = []; // Inicializar un arreglo vacío para almacenar los productos

        foreach ($productosSeleccionados as $producto) {
            $product = Productos::find($producto); // Obtener el producto por SKU

            if ($product) {
                $product->visibilidad_estatus = 'Visible';
                $product->update();
            }
        }

        return response()->json(['success' => true]);
    }

    public function bukaction_promocion(Request $request){

        $validator = Validator::make($request->all(), [
            'tipo_opcion' => 'required',
            'tipo_bulk' => 'required',
            'monto_bulk' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $productos = $request->get('productosSeleccionados');
        $productosSeleccionados = explode(',', $productos);

        $products = []; // Inicializar un arreglo vacío para almacenar los productos

        foreach ($productosSeleccionados as $producto) {
            $product = Productos::find($producto); // Obtener el producto por SKU

            if ($product) {

                $precioNormal = $product->precio_normal;


                if($request->get('tipo_opcion') == 'Agregar Promocion' ){

                    if ($request->get('tipo_bulk') == 'Porcentaje') {

                        $porcentaje = $request->get('monto_bulk');
                        // Convertir el porcentaje a decimal (por ejemplo, 20% -> 0.2)
                        $porcentajeDecimal = $porcentaje / 100;

                        // Calcular el descuento basado en el porcentaje
                        $descuento = $precioNormal * $porcentajeDecimal;

                        // Restar el descuento al precio normal
                        $precioConDescuento = $precioNormal - $descuento;

                        // Guardar $precioConDescuento o hacer lo que necesites con él
                    } elseif ($request->get('tipo_bulk') == 'Fijo') {
                        $montoFijo = $request->get('monto_bulk');

                        // Restar el monto fijo al precio normal
                        $precioConDescuento = $precioNormal - $montoFijo;

                        // Guardar $precioConDescuento o hacer lo que necesites con él
                    }

                }else{

                    if ($request->get('tipo_bulk') == 'Porcentaje') {

                        $porcentaje = $request->get('monto_bulk');
                        // Convertir el porcentaje a decimal (por ejemplo, 20% -> 0.2)
                        $porcentajeDecimal = $porcentaje / 100;

                        // Calcular el descuento basado en el porcentaje
                        $descuento = $precioNormal * $porcentajeDecimal;

                        // Sumar el descuento al precio normal
                        $precioConDescuento = $precioNormal + $descuento;

                        // Guardar $precioConDescuento o hacer lo que necesites con él
                    } elseif ($request->get('tipo_bulk') == 'Fijo') {
                        $montoFijo = $request->get('monto_bulk');

                        // Sumar el monto fijo al precio normal
                        $precioConDescuento = $precioNormal + $montoFijo;

                        // Guardar $precioConDescuento o hacer lo que necesites con él
                    }

                }

                if($request->get('fecha_inicio_desc_bulk') == null ){

                    $product->precio_normal = $precioConDescuento;

                    $product->update();

                }else{

                    $product->precio_descuento = $precioConDescuento;

                    $product->fecha_inicio_desc = $request->get('fecha_inicio_desc_bulk') ;
                    $product->fecha_fin_desc = $request->get('fecha_fin_desc_bulk') ;

                    $product->update();

                }

            }
        }
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

        $producto_edit_data = [
            "nombre" => $producto->nombre,
            "stock" => $producto->stock,
            "precio" => $producto->precio_normal,
            "sku" => $producto->sku,
        ];

        return response()->json(['success' => true, 'producto_edit_data' => $producto_edit_data]);

    }
}
