@section('css_custom')

@endsection

@if(isset($producto))
<!-- Modal -->
<div class="modal fade" id="editProduct-{{$producto->id}}" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border: solid 1px transparent;">

        <div class="modal-body modal_bg row">
            @include('modals.producto_info')
        </div>

      </div>
    </div>
</div>
@endif

@section('js_custom')

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script>

        $(document).ready(function() {
            $("#miFormulario2").on("submit", function (event) {
                event.preventDefault(); // Evita el envío predeterminado del formulario

                // Realiza la solicitud POST usando AJAX
                $.ajax({
                    url: $(this).attr("action"),
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: async function(response) { // Agrega "async" aquí
                        // El formulario se ha enviado correctamente, ahora realiza la impresión
                        saveSuccess(response);

                    },
                    error: function (xhr, status, error) {
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';

                            // Itera a través de los errores y agrega cada mensaje de error al mensaje final
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    var errorMessages = errors[key].join('<br>'); // Usamos <br> para separar los mensajes
                                    errorMessage += '<strong>' + key + ':</strong><br>' + errorMessages + '<br>';
                                }
                            }
                            console.log(errorMessage);
                            // Muestra el mensaje de error en una SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Faltan Campos',
                                html: errorMessage, // Usa "html" para mostrar el mensaje con formato HTML
                            });
                    }
                });

            });

            async function saveSuccess(response) {
                const producto_data = response.producto_data;

                Swal.fire({
                        title: "Producto Guardado <strong>¡Exitosamente!</strong>",
                        icon: "success",
                        html: "<div class='row'><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/fuente.webp') }}' ><p><strong>Nombre:</strong> <br>"+ producto_data.nombre +"</p></div><div class='col-6 mt-3'><img class='icon_span_tab' src='{{ asset('assets/media/icons/en-stock.png.webp') }}' ><p><strong>Stock:</strong><br>"+ producto_data.stock +" </p> </div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/monedas.webp') }}' ><p><strong>Precio:</strong><br> "+ producto_data.precio +"</p></div><div class='col-6'><img class='icon_span_tab' src='{{ asset('assets/media/icons/sku.webp') }}'><p><strong>Sku:</strong><br>"+ producto_data.sku +" </p></div></div>",
                        showCloseButton: true,
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: '<a class="btn_swalater_confirm"  style="text-decoration: none;color: #fff;" href="{{ route('productos.index') }}" >Ver Productos</a>',
                        cancelButtonText: `<a  class="btn_swalater_cancel" style="text-decoration: none;color: #fff;" href="" >Cerrar</a>`,
                    }).then(() => {
                        // Recarga la página
                       window.location.href = '/home/';
                    });

            }
        });

  </script>


@endsection
