@extends('layouts.app')

@section('css_custom')

<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">

@endsection


@section('content')

<section class="products bg_product ">

    <div class="row z-1 position-relative">

        <div class="col-12">
            <h2 class="tiitle_modal_dark text-center mt-3 mb-3">Productos</h2>
        </div>

        <div class="col-12">

            <div class="d-flex justify-content-center">

                <form class="d-flex" role="search">
                    <input class="form-control input_search" type="search" placeholder="Buscar productos" aria-label="Search">
                     <a class="btn btn_search me-5" type="submit">
                        <img class="icon_search" src="{{ asset('assets/media/icons/buscar.webp') }}" alt="">
                    </a>
                  </form>

                  <a class="btn btn_filter" data-bs-toggle="collapse" href="#collapseFilter" role="button" aria-expanded="false" aria-controls="collapseFilter">
                    <img class="icon_search" src="{{ asset('assets/media/icons/filtrar.webp') }}" alt="">
                  </a>
            </div>

              <div class="collapse" id="collapseFilter">
                dfsdf
              </div>
        </div>

    </div>




</section>

@endsection
