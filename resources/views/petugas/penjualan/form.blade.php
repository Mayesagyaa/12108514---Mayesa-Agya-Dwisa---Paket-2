@extends('petugas.index')

@section('title', 'Penjualan')

@section('content.index')
<div class="container">
    <h1>Penjualan</h1>
    <!-- Tab content -->
    <div class="row" id="product-list">
    <!-- Daftar Produk -->
        
    </div>

    <div class="row fixed-bottom d-flex justify-content-end align-content-center" style="margin-left: 18%; width: 83%; height: 70px; border-top: 3px solid #4b545c; background-color: white;">
        <div class="col text-center" style="margin-right: 50px;">
            <form action="{{ route('petugas.checkout') }}" method="get">
                <div id="shop"></div>
                <button type="submit" class="btn text-light" style="background: #4b545c">Next</button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        let produk = @json($produk);
        let i = 1;
        $('.odd').hide();
        $.each(produk, function(key, item) {
            $("#product-list").append(`
                <div class="col-md-4">
                    <div class="card shadow">
                        <!-- Card body -->
                        <div class="card-body text-center">
                            <!-- Gambar produk -->
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="card-img-top" src="{{asset('`+item.gambar+`')}}" style="width: 200px; height: 200px; object-fit: cover;">
                            </div>
                            <!-- Informasi produk -->
                            <div class="card-body align-items-center justify-content-center">
                                <h5 class="card-text"><b>`+item.nama_produk+`</b></h5>
                                <p class="card-text"><small>Stok Tersedia: `+item.stok+`</small></span></p>
                                <p class="card-text" id="price_`+item.id+`">Harga: Rp. `+ item.harga +`</p>
                                <!-- Tombol tambah dan kurang -->
                                <div class="d-flex align-items-center justify-content-center input-group mb-3">
                                    <button class="btn" style="padding: 0px 10px 0px 10px; cursor: pointer;" id="minus_`+item.id+`"><b>-</b></button>
                                    <button class="btn" style="padding: 0px 10px 0px 10px; cursor: default" id="quantity_`+item.id+`">0</button>
                                    <button class="btn" style="padding: 0px 10px 0px 10px; cursor: pointer;" id="plus_`+item.id+`"><b>+</b></button>
                                </div>
                                <!-- Total harga -->
                                <p id="total_`+item.id+`"> </p>
                            </div>
                        </div>
                        <!-- End of Card body -->
                    </div>
                </div>
            `);
            i++;

            $('#plus_'+item.id).click(function (e) {
                const elem=$(this).prev();
                const getId=elem.attr("id").split("_")[1]; // To find the price id
                const harga=item.harga // harga amount
                let total_produk = parseInt(elem.html())+1;
                elem.html(total_produk);
                let total = harga*total_produk;
                $("#total_"+item.id).html("$ "+harga*total_produk); // set total, assume total is total_produk * harga
                if (total_produk > 0) {
                    let shop = ``+item.id+`;`+item.nama_produk+`;`+item.harga+`;`+total_produk+`;`+total+`;`;
                    $('#shop').append(`
                        <input name="shop[`+item.id+`]" value="`+shop+`" type="text" hidden />
                    `)
                }
            });
            $('#minus_'+item.id).click(function (e) {
                const elem=$(this).next();
                const getId=elem.attr("id").split("_")[1]; // To find the harga id
                const harga=item.harga; // harga amount
                let total_produk = parseInt(elem.html());
                if(total_produk>0){
                    total_produk--;
                }
                elem.html(total_produk);
                let total = harga*total_produk;
                $("#total_"+item.id).html("$ "+harga*total_produk); // set total, assume total is total_produk * harga
                if (total_produk >= 0) {
                    let shop = ``+item.id+`;`+item.nama_produk+`;`+item.harga+`;`+total_produk+`;`+total+`;`;
                    $('#shop').append(`
                        <input name="shop[`+item.id+`]" value="`+shop+`" type="text" hidden />
                    `)
                }
            });
        })
    })
</script>
@endpush