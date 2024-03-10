@foreach($ordesprodcutos as $item)
@if($producto->id == $item->id_producto)

        <div class="col-12 col-sm-6 col-md-6 col-xl-4 px-4 py-1">
                <div class="row bg_minicart_ventas">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-6">
                                <p class="text_empleado text-start">Empleado</p>
                            </div>

                            <div class="col-6">
                                <p class="text_empleado text-end"><strong> #{{$item->Ordenes->id}}</strong></p>
                            </div>

                            <div class="col-12 mb-2">
                                <P class="text_empleado_value text-start">
                                    {{$item->Ordenes->User->name}}
                                </P>
                            </div>

                            <div class="col-4 mb-1">
                                <p class="text_subtittle_ventas text-start">
                                    <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/etiqueta-del-precio.webp') }}" alt="">
                                    Telefono:
                                </p>
                                <p class="text_subtittle_ventas_sv text-center">
                                    <a  target="_blank"  href="https://api.whatsapp.com/send?phone=521{{$item->Ordenes->Cliente->telefono}}&text=¡Hola!">{{$item->Ordenes->Cliente->telefono}}</a>
                                </p>
                            </div>

                            <div class="col-4 mb-1">
                                <p class="text_subtittle_ventas text-start">
                                    <img class="img_subtittle_ventas" src="{{ asset('assets/media/icons/coins.webp') }}" alt="">
                                    Total :
                                </p>
                                <p class="text_subtittle_ventas_sv text-center">
                                    ${{$item->Ordenes->total}}
                                </p>
                            </div>

                            <div class="col-12 mb-2 mt-2">
                                <div class="d-flex justify-content-between  ">
                                    <P class="text_empleado_value text-start mt-2">
                                        {{\Carbon\Carbon::createFromFormat('Y-m-d', $item->Ordenes->fecha)->format('d \d\e F Y')}}

                                    </P>
                                    <a type="button" class="btn btn-sm btn_edit_prodcut_warning" href="{{ route('orders.show', ['id' => $item->Ordenes->id, 'code' => $code_global]) }}">
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
