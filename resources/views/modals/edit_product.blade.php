@section('css_custom')

@endsection

@if(isset($producto))
<!-- Modal -->
<div class="modal fade" id="editProduct-{{$producto->id}}" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border: solid 1px transparent;">

        <div class="modal-body modal_bg row">
            @include('components.producto_info')
        </div>

      </div>
    </div>
</div>
@endif

@section('js_custom')

  <script>

$(document).ready(function() {
    $(".formularioProducto").on("submit", function (event) {

        event.preventDefault();
        var formID = $(this).attr("id");

        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: async function(response) {
                saveSuccessEdit(response);
            },
            error: function (xhr, status, error) {
                // Manejo de errores
            }
        });

    });

    async function saveSuccessEdit(response) {
        const producto_data = response.producto_data;

        Swal.fire({
            title: "Producto Guardado <strong>¡Exitosamente!</strong>",
            icon: "success",
            html: "<div class='row'><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/fuente.webp') }}' ><p><strong>Nombre:</strong> <br>"+ producto_data.nombre +"</p></div><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/en-stock.png.webp') }}' ><p><strong>Stock:</strong><br>"+ producto_data.stock +" </p> </div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/monedas.webp') }}' ><p><strong>Precio:</strong><br> "+ producto_data.precio +"</p></div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/sku.webp') }}'><p><strong>Sku:</strong><br>"+ explode('_', $producto_data.sku)[0] +" </p></div></div>",
            showCloseButton: true,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="#" >Cerrar</a>',
            }).then(() => {
                // Cierra todos los modales abiertos
                $('.modal').modal('hide');
            });
    }
});

  </script>


@endsection
