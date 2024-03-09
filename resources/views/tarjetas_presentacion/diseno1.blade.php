<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tarjeta de presentacion | </title>
    <link rel="stylesheet" href="{{ asset('assets/css/tarjeta_uno.css') }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="modal modal-sheet position-static d-block bg_tarjeta_uno p-3 py-md-4" tabindex="-1" role="dialog" id="modalTour">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-4 shadow">
            <div class="modal-body p-4 bg_card_tarjetas_uno" >

              <h4 class="fw-bold mb-0 text-center tittle_vendexa_tarjeta">VENDEXA</h4>

              <h2 class="text-center mt-3 mb-3">
                <img class="logo_desgin_tarjetas" src="{{ asset('logo/empresa'.$empresa->id_empresa.'/'.$configuracion->logo) }}" alt="">
              </h2>

              <h2 class="fw-bold mt-4 mb-4 text-center subtittle_vendexa_tarjeta">
                {{ $empresa->nombre }}
              </h2>

              <div class="row mb-3">

                <div class="col-4">
                    <a class="d-flex justify-content-center" href="https://api.whatsapp.com/send?phone=52{{ $empresa->telefono }}" target="_blank">
                        <img src="{{ asset('assets/media/icons/whatsap.webp') }}" class="icon_desgin_tarjetas">
                    </a>

                    <p class="text-center mt-3">
                        <a class="d-flex justify-content-center link_redirecionamiento_tp" href="https://api.whatsapp.com/send?phone=52{{ $empresa->telefono }}" target="_blank" style="text-decoration: none">
                            WhatsApp
                        </a>
                    </p>
                </div>

                <div class="col-4">
                    <a class="d-flex justify-content-center" href="mailto:{{ $empresa->correo }}" target="_blank">
                        <img src="{{ asset('assets/media/icons/email.webp') }}" class="icon_desgin_tarjetas">
                    </a>

                    <p class="text-center mt-3">
                        <a class="link_redirecionamiento_tp" href="mailto:{{ $empresa->correo }}">
                            Email
                        </a>
                    </p>
                </div>

                <div class="col-4">
                    <a class="d-flex justify-content-center" href="tel:+{{ $empresa->telefono }}" target="_blank">
                        <img src="{{ asset('assets/media/icons/phone.webp') }}" class="icon_desgin_tarjetas">
                    </a>

                    <p class="text-center mt-3">
                        <a class="link_redirecionamiento_tp" href="tel:+{{ $empresa->telefono }}" target="_blank">
                            Teléfono
                        </a>
                    </p>
                </div>

                <div class="col-4">
                    <a class="d-flex justify-content-center link_redirecionamiento_tp" href="data:text/vcard;charset=utf-8,BEGIN%3AVCARD%0AVERSION%3A3.0%0AFN%3AJohn%20Doe%0ATEL%3A%2B1234567890%0AEMAIL%3Ajohn.doe%40example.com%0AEND%3AVCARD">
                        <img src="{{ asset('assets/media/icons/contactcard.webp') }}" class="icon_desgin_tarjetas">
                    </a>

                    <p class="text-center mt-3">
                        <a class="link_redirecionamiento_tp" href="data:text/vcard;charset=utf-8,BEGIN%3AVCARD%0AVERSION%3A3.0%0AFN%{{ $empresa->nombre }}%0ATEL%3A%{{ $empresa->telefono }}%0AEMAIL%3A{{ $empresa->correo }}%0AEND%3AVCARD">
                            Guardar contacto
                        </a>
                    </p>
                </div>

                <div class="col-4">
                    <p class="d-flex justify-content-center">
                        <img src="{{ asset('assets/media/icons/gps.webp') }}" class="icon_desgin_tarjetas">
                    </p>

                    <p class="text-center mt-3">
                        <a class="link_redirecionamiento_tp " >
                            Direccion
                        </a>
                    </p>
                </div>

                <div class="col-4">
                    <p class="d-flex justify-content-center">
                        <img src="{{ asset('assets/media/icons/carrito.webp') }}" class="icon_desgin_tarjetas">
                    </p>

                    <p class="text-center mt-3">
                        <a class="link_redirecionamiento_tp " >
                            Tienda Online
                        </a>
                    </p>
                </div>

              </div>

              {{-- <button type="button" class="btn btn-lg btn-primary mt-0 w-100" data-bs-dismiss="modal">Great, thanks!</button> --}}

            </div>
          </div>
        </div>
      </div>

  </body>
</html>
