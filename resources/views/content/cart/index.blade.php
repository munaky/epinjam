<section style="background-color: #eee;">
    <div class="container mt-5 p-3 rounded cart">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="product-details mr-2">
                    <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span
                            class="ml-2">Menu Keranjang Barang</span></div>
                    <hr>
                    <h6 class="mb-0">Keranjang Barang</h6>
                    <div class="d-flex justify-content-between"><span> *hapus barang jika tidak jadi meminjam</span>
                    </div>
                    @foreach ($data as $x)
                    <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                        <div class="d-flex flex-row">
                            <img class="rounded" src="{{ $x->image }}" width="40"
                                style="margin-right: 10px;">
                            <div class="ml-2">
                                <span class="font-weight-bold d-block">{{ $x->name }}</span>
                                <span class="spec">{{ $x->items_count }} Dipilih</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <div class="my-namespace">
                                <button>
                                    <svg id="menu-scanner" data-menu="scanner" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <br>
                    <div>
                        <button class="contactButton" id="checkout"> Pinjam
                            <div class="iconButton">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path fill="currentColor"
                                        d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z">
                                    </path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
