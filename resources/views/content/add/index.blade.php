<section class="hero d-flex align-items-baseline">
    <div class="container-fluid">
        <h2><b>Tambah Data Barang</b></h2>
        <br />
        <div class="card">
            <form>
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div class="col-md-5">
                        <label>Kategori Barang</label>
                        <div class="form-group m-0">
                            <select class="form-select form-control" id="add-category" required>
                                <option class="d-none" disabled selected value="">Pilih Kategori</option>
                                @foreach ($data as $x)
                                    <option value="{{ $x->id }}">{{ $x->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label>Jenis Barang</label>
                        <input type="text" class="form-control" id="add-name" placeholder="Enter Jenis Barang" required />
                    </div>
                </div>
                <div class="row align-items-center mb-3">
                    <div class="col-md-2">
                        <label>Jumlah Barang</label>
                        <input type="number" min="1" max="1000" class="form-control" id="add-amount"
                            placeholder="Enter Jumlah Barang" required />
                    </div>
                    <div class="col-md-5">
                        <form>
                            <label for="add-gambar">Gambar Barang</label>
                            <input accept=".jpg, .jpeg, .png" class="form-control" name="arquivo" id="add-image"
                                type="file" required />
                        </form>
                    </div>
                </div>

                <div class="row align-items-center mb-3">
                    <div class="col-auto">
                        <div>
                            <button type="submit" class="my-button" id="add-create">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15"
                                        height="15">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                                    </svg>
                                    Tambah
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</section>
