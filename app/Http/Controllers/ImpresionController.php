<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;
use App\Models\Categorias;
use App\Models\Marcas;
use App\Models\Productos;
use App\Models\Proveedores;
use App\Models\SubCategorias;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ImpresionController extends Controller
{
    public function imprimir_etiqueta($sku, Request $request){

        $producto = Productos::where('sku', '=', $sku)->first();

        $pdf = PDF::loadView('pdf.eticketa_productos',compact('producto'));

        // Para cambiar la medida se deben pasar milimetros a putnos
        $pdf->setPaper([0, 0,141.732,70.8661], 'portrair');
        return $pdf->download('etiqueta_'.$sku.'.pdf');

    }

    public function pdf_productos(Request $request){

        $productosSeleccionados = $request->get('productos');

        $products = []; // Inicializar un arreglo vacío para almacenar los productos
        $fechaActual = date('Y-m-d');

        foreach ($productosSeleccionados as $producto) {
            $product = Productos::where('id', $producto)->first(); // Obtener el producto por SKU
            if ($product) {
                $products[] = $product; // Agregar el producto al arreglo
            }
        }


        $pdf_productos = public_path() . '/pdf';

        $path = $pdf_productos;

        $pdf = PDF::loadView('pdf.catalogo_productos', ['productos' => $products]);

        // Guardar el PDF temporalmente
        $pdfPath = public_path('pdfs/productos_' . $fechaActual . '.pdf');


        $pdf->save($pdfPath);

        // Obtener la URL del PDF almacenado temporalmente
        $pdfUrl = asset('pdfs/productos_' . $fechaActual . '.pdf');

        return response()->json(['url' => $pdfUrl], 200); // Enviar la URL del PDF como respuesta

    }
}
