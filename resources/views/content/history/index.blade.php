<section class="hero d-flex align-items-baseline">
    <!-- Begin Page Content -->
    <div class="container-fluid" id="content-item">
        <br />
        <h2><b>History Peminjaman Barang</b></h2>
        <br />
        <div class="row align-items-center mb-3">
            <div class="col-md-2">
                <div class="form-group m-0">
                    <select class="form-select form-control" id="history-status">
                        <option selected disabled class="d-none" value=" ">--Pilih Status--</option>
                        <option value="0">Belum Dikembalikan</option>
                        <option value="1">Sudah Dikembalikan</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-control form-select" id="history-category" required>
                    <option class="d-none" disable selected value=" ">--Kategori--</option>
                    @foreach ($data as $x)
                        <option value="{{ $x->id }}">{{ $x->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <input type="date" id="history-date" name="trip-start" min="2023-01-01" max="2123-01-01"
                    style="padding: 5px 10px; border: 1px solid #cecbcb;">
            </div>

            <div class="col">
                <div>
                    <button type="button" class="btn btn-primary h-100" id="findBy">Find</button>
                </div>
            </div>
        </div>
        <br />
        <!-- Content Row -->
        <div class="table-responsive">

        </div>
</section>
