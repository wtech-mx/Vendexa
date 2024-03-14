@extends('layouts.app')
@section('css_custom')

    <link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
    <style>
        .modal-backdrop.show {
            opacity: 0 !important;
        }
        .modal-backdrop {
            --bs-backdrop-zindex: 0 !important;
            z-index: 0 !important;
        }
    </style>

@endsection

@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative px-3 px-md-4 px-xl-5">

        <div class="col-12 mt-2 mb-3">
            <div class="d-flex justify-content-center ">
                <h5 class="tittle_dash text-center mt-2 mb-3 animation_card_header">
                    {{$proveedor->nombre}}
                </h5>

                <a class="btn btn_filter" data-bs-toggle="modal" data-bs-target="#editProveedorFact{{ $proveedor->id }}" style="margin-left: 1rem">
                    <img class="icon_search" src="{{ asset('assets/media/icons/anadir_white.webp') }}" alt="">
                </a>
                @include('modals.add_facturas')
            </div>
        </div>

        <div class="row">
            @if ($facturas->isEmpty())
                <div class="col-12">
                    <h2 class="tiitle_modal_dark text-center mt-3 mb-3">Sin facturas</h2>
                </div>
            @else
                @foreach ($facturas as $facturas)
                    <div class="col-6 px-4 py-1">
                        <div class="row bg_minicart_ventas">
                            <div class="col-12">

                                <div class="row">
                                    <div class="col-12">
                                        <p class="text_empleado text-start">Fecha: {{$facturas->fecha}}</p>
                                    </div>

                                    @if (pathinfo($facturas->file, PATHINFO_EXTENSION) == 'pdf')
                                    <p class="text-center ">
                                        <iframe class="mt-2" src="{{asset('facturas/empresa'. auth()->user()->id_empresa . '/' .$facturas->file)}}" style="width: 60%; height: 60px;"></iframe>
                                    </p>
                                    <a class="btn btn_primary_blue_dash" href="{{asset('facturas/empresa'. auth()->user()->id_empresa . '/' .$facturas->file) }}" target="_blank">Ver archivo</a>
                                    @elseif (pathinfo($facturas->file, PATHINFO_EXTENSION) == 'doc')
                                    <p class="text-center ">
                                        <img id="blah" src="{{asset('media/icons/docx.png') }}" alt="Imagen" style="width: 60px; height: 60px;"/>
                                    </p>
                                            <a class="btn btn_primary_blue_dash" href="{{asset('facturas/empresa'. auth()->user()->id_empresa . '/' .$facturas->file) }}" target="_blank">Descargar</a>
                                    @elseif (pathinfo($facturas->file, PATHINFO_EXTENSION) == 'docx')
                                    <p class="text-center ">
                                        <img id="blah" src="{{asset('media/icons/docx.png') }}" alt="Imagen" style="width: 60px; height: 60px;"/>
                                    </p>
                                            <a class="btn btn_primary_blue_dash" href="{{asset('facturas/empresa'. auth()->user()->id_empresa . '/' .$facturas->file) }}" target="_blank">Descargar</a>
                                    @else
                                        <p class="text-center mt-2">
                                            <img id="blah" src="{{asset('facturas/empresa'. auth()->user()->id_empresa . '/' .$facturas->file) }}" alt="Imagen" style="width: 60px;height: 60%;"/><br>
                                        </p>
                                            <a class="text-center btn_primary_blue_dash" href="{{asset('facturas/empresa'. auth()->user()->id_empresa . '/' .$facturas->file) }}" target="_blank">Ver Imagen</a>

                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>


    </div>

</section>

@endsection
