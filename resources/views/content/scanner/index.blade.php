<div class="scanner-container row align-items-center w-100 h-100">
    <div class="col-12 aligh-self-center position-relative">
        <div class="btn-group position-absolute top-0 end-0">
            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: lightblue;">
                Mode
            </button>
            <ul class="dropdown-menu">
                @include('content.scanner.access.' . $data['access'])
            </ul>
        </div>
        <div class="scanner-reader-container position-absolute top-50 start-50 translate-middle" id="reader"></div>
    </div>
</div>
