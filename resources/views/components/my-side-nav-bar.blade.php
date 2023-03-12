<!-- BEGIN Side Nav Bar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sideNav" aria-labelledby="sideNavLabel">
  <div class="offcanvas-header">
    <a href="/" class="text-decoration-none text-dark">
      <h5 class="offcanvas-title" id="sideNavLabel">{{ env('APP_NAME') ?? 'Application Name' }}</h5>
    </a>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body px-0">
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item border-bottom-0">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <i class="me-2 bi-person-circle"></i>{{ Auth::user()->name }}
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <form method="POST" action="{{ route('logout') }}">
              <div class="list-group list-group-flush">
                <a href="{{ route('root') }}" class="list-group-item list-group-item-action border-bottom-0"><i class="me-2 bi-house"></i>Halaman awal</a>
                @csrf
                <!--<a href="{{ route('password.email') }}" class="list-group-item list-group-item-action border-bottom-0"><i class="me-2 bi-lock"></i>Change password</a>-->
                <a onclick="event.preventDefault(); this.closest('form').submit();" href="#" class="list-group-item list-group-item-action border-bottom-0"><i class="me-2 bi-box-arrow-left"></i>Keluar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="accordion-item border-bottom-0">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            <i class="bi-list me-2"></i>Kelola
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <div class="list-group list-group-flush">
              <a href="{{ route('knownCase.index') }}" class="{{ $pageTitle == 'Kasus' ? 'fw-bold' : ''}} list-group-item list-group-item-action border-bottom-0"></i><i class="bi-file-earmark-medical me-2"></i>Kasus</a>
              <a href="{{ route('disease.index') }}" class="{{ $pageTitle == 'Penyakit' ? 'fw-bold' : ''}} list-group-item list-group-item-action border-bottom-0"></i><i class="bi-file-earmark-medical me-2"></i>Penyakit</a>
              <a href="{{ route('symptom.index') }}" class="{{ $pageTitle == 'Gejala' ? 'fw-bold' : ''}} list-group-item list-group-item-action border-bottom-0"></i><i class="bi-file-earmark-medical me-2"></i>Gejala</a>
              <a href="{{ route('solution.index') }}" class="{{ $pageTitle == 'Solusi' ? 'fw-bold' : ''}} list-group-item list-group-item-action border-bottom-0"></i><i class="bi-file-earmark-medical me-2"></i>Solusi</a>
              @if (Auth::user()->role == 'admin')
              <a href="{{ route('user.index') }}" class="{{ $pageTitle == 'Pengguna' ? 'fw-bold' : ''}} list-group-item list-group-item-action border-bottom-0"></i><i class="bi-people me-2"></i>Pengguna</a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <i class="bi-question-circle me-2"></i>Dapatkan bantuan
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <div class="list-group list-group-flush">
              <a href="https://api.whatsapp.com/send?phone={{ env('DEV_WHATSAPP') }}&text=*%5B{{ urlencode(env('APP_NAME')) }}%3A%3APermintaan%20dukungan%20pengguna%5D*%0A%0A%0A" target="_blank" class="list-group-item list-group-item-action border-bottom-0"><i class="bi-whatsapp me-2"></i>Chat via WhatsApp</a>
              <a data-bs-toggle="collapse" href="#donateDropdown" target="_blank" class="list-group-item list-group-item-action border-bottom-0"><i class="bi-info-circle me-2"></i>Tentang aplikasi</a>
              <div class="collapse" id="donateDropdown">
                <div class="my-4">
                  <center><strong>Created with <i class="bi-heart-fill"></i> by <a class="text-dark" href="{{ env('DEV_WEBSITE_URL') }}" target="_blank">{{ env('DEV_NAME') }}</a></strong></center>
                </div>
                <div class="card mt-2">
                  <div class="card-body">
                    <small>{{ env('APP_NAME') }} is a freeware. We rely solely on donations to fund the development. If you think the software is useful somehow, please consider <a href="{{ env('DEV_DONATION_URL') }}" target="_blank">donating</a>.</small><br><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Side Nav Bar-->