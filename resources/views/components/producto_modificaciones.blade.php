
@foreach ($modoficaciones_productos as $modoficacion_producto)
@if ($producto->id == $modoficacion_producto->id_producto)
    <div class="col-12 px-4 py-1 mb-lg-3 mb-md-2">
        <div class="row bg_minicart_ventas" style="margin-left: 5px">

            <div class="col-2 my-auto">
                <p class="text-left" style="margin: 0">
                    @if($modoficacion_producto->User->foto == NULL)
                    <img class="img_portada_product_edit_ventas" src="{{ asset('assets/media/icons/user_predeterminado.webp') }}" alt="">
                    @else
                        <img class="img_portada_product_edit_ventas" src="{{ asset('foto_trabajador/empresa'.auth()->user()->id_empresa.'/'.$modoficacion_producto->User->foto) }}" alt="">
                    @endif

                </p>
            </div>

            <div class="col-10 ">

                <div class="row">
                    <div class="col-6">
                        <p class="text_empleado text-start">Empleado</p>
                    </div>

                    <div class="col-6">
                        <p class="text_empleado text-end"><strong> #{{$modoficacion_producto->id}}</strong></p>
                    </div>

                    <div class="col-12 mb-2">
                        <P class="text_empleado_value text-start">
                            {{$modoficacion_producto->User->name}}
                        </P>
                    </div>

                    @if($modoficacion_producto->precio_normal != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                Precio
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->precio_normal}}
                            </p>
                        </div>
                        @else
                    @endif

                    @if($modoficacion_producto->precio_mayo != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                                P. Mayoreo
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->precio_mayo}}
                            </p>
                        </div>
                        @else
                    @endif

                    @if($modoficacion_producto->unidad_venta != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/cinta-metrica.webp') }}" alt="">
                                Unidad de venta
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->unidad_venta}}
                            </p>
                        </div>
                        @else

                    @endif

                    @if($modoficacion_producto->costo != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/efectivo.webp') }}" alt="">
                                Costo
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->costo}}
                            </p>
                        </div>
                        @else

                    @endif

                    @if($modoficacion_producto->sku != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/sku.webp') }}" alt="">
                                SKU
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->sku}}
                            </p>
                        </div>
                        @else

                    @endif

                    @if($modoficacion_producto->stock != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/en-stock.png.webp') }}" alt="">
                                Stock
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->stock}}
                            </p>
                        </div>
                        @else

                    @endif

                    @if($modoficacion_producto->visibilidad_estatus != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                                Visibilidad
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->visibilidad_estatus}}
                            </p>
                        </div>
                        @else

                    @endif

                    @if($modoficacion_producto->codigo_proveedor != NULL)
                    <div class="col-4 mb-3">
                        <p class="text_subtittle_ventas text-start">
                            <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                            Codigo Proveedor
                        </p>
                        <p class="text_subtittle_ventas_sv text-start">
                            {{$modoficacion_producto->codigo_proveedor}}
                        </p>
                    </div>
                        @else

                    @endif

                    @if($modoficacion_producto->clave_sat != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/sat.webp') }}" alt="">
                                Clave SAT
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->clave_sat}}
                            </p>
                        </div>
                        @else

                    @endif

                    @if($modoficacion_producto->descuento != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/descuento.webp') }}" alt="">
                                Descuento
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->descuento}}
                            </p>
                        </div>
                        @else

                    @endif

                    @if($modoficacion_producto->precio_descuento != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/gasto.webp') }}" alt="">
                                Precio Descuento
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->precio_descuento}}
                            </p>
                        </div>
                        @else
                    @endif

                    @if($modoficacion_producto->fecha_inicio_desc != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="">
                                Fecha Inicio Desc
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->fecha_inicio_desc}}
                            </p>
                        </div>
                        @else
                    @endif


                    @if($modoficacion_producto->fecha_fin_desc != NULL)
                        <div class="col-4 mb-3">
                            <p class="text_subtittle_ventas text-start">
                                <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/calendar-dar.webp') }}" alt="">
                                Fecha Fin Desc
                            </p>
                            <p class="text_subtittle_ventas_sv text-start">
                                {{$modoficacion_producto->fecha_fin_desc}}
                            </p>
                        </div>
                        @else
                    @endif

                    <div class="col-12 mb-2 mt-2">
                        <div class="d-flex justify-content-between  ">
                            <P class="text_empleado_value text-start mt-2">
                                {{\Carbon\Carbon::createFromFormat('Y-m-d', $modoficacion_producto->fecha)->format('d \d\e F Y')}}

                            </P>
                            <a type="button"  class="btn btn-sm btn_edit_prodcut_warning" data-bs-toggle="modal" data-bs-target="#editProduct">
                                Ver <img class="icon_edit_btn_warning" src="{{ asset('assets/media/icons/editar.webp') }}" alt="">
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endif
@endforeach
