<section class="hero d-flex align-items-baseline">
    <!-- Begin Page Content -->
    <div class="container-fluid" id="content-item">
        <br />
        <h2><b>Data List Laptop</b></h2>
        <br />
        <form>
        <div class="row align-items-center mb-3">
            <div class="col-md-3">
                <div class="form-group m-0">
                    <div class="input-group">
                        <input class="form-select form-control" list="listType" id="details-type"
                            placeholder="Pilih Kategori" required />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary" id="findBy" style="border-radius: 5px;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18">
                                    <g data-name="Layer 2">
                                        <path
                                            d="m20.71 19.29-3.4-3.39A7.92 7.92 0 0 0 19 11a8 8 0 1 0-8 8 7.92 7.92 0 0 0 4.9-1.69l3.39 3.4a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42zM5 11a6 6 0 1 1 6 6 6 6 0 0 1-6-6z"
                                            fill="#FFFFFF" data-name="search"></path>
                                    </g>
                                </svg>
                                Find
                            </button>
                        </div>
                    </div>
                    <datalist id="listType">
                        @foreach ($data as $x)
                            <option value="{{ $x->name }}"></option>
                        @endforeach
                    </datalist>
                </div>
            </div>

            <div class="col-md-3 d-none" id="field-increment">
                <div class="input-group">
                    <input type="number" min="1" max="1000" class="form-control" id="details-increment"
                        placeholder="Enter Jumlah Barang.....">
                    <button type="submit" class="btn btn-primary" id="details-add" style="font-size: 11px;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                        </svg>Tambah
                    </button>
                </div>
            </div>
        </div>
    </form>

        <br />
        <!-- Content Row -->
        <div class="table-responsive">

        </div>
</section>
