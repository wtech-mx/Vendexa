

<!-- Modal -->
<div class="modal fade" id="show_Scanner" tabindex="-1" aria-labelledby="show_ScannerLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-body modal_bg row">

              <form method="POST" action="" class="z-1"  id="" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                      <div class="col-10">
                          <h2 class="tiitle_modal_dark text-center mt-3">Scanner</h2>
                      </div>

                      <div class="col-2">
                          <a class="input-group-text span_custom_primary_dark mt-3" data-bs-dismiss="modal" style="margin-right: 0rem!important;">
                              <img class="icon_span_form" src="{{ asset('assets/media/icons/close_white.webp') }}" alt="" >
                          </a>
                      </div>
                  </div>
              </form>

          </div>

        </div>
      </div>
  </div>
