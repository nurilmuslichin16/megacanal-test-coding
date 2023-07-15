<div class="container">
    <div class="row mt-5 mb-3">
        <div class="col-6">
            <h2><u>PRODUCT LIST</u></h2>
        </div>
        <div class="col-6" style="text-align: right;">
            <a href="#" onclick="addOrder()" class="btn btn-success">Add Order</a> &nbsp;
            <a href="#" id="btnShowProduct" class="btn btn-primary">Show Products</a>
        </div>
    </div>
    <table id="listProduct" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col" style="width: 20%;">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <footer class="mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <b>&copy; 2023</b> Developer by <a href="https://www.linkedin.com/in/nurilmuslichin16/">Nuril Muslichin</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    $(document).ready(function() {
        $('#listProduct').DataTable();

        $('#btnShowProduct').click(function() {
            $.ajax({
                url: 'https://dummyjson.com/products',
                dataType: 'JSON',
                success: function(data) {
                    var table = $('#listProduct').DataTable();
                    table.clear();

                    $.each(data.products, function(index, value) {
                        table.row.add([
                            '<img style="width: 100%;" src="' + value.thumbnail + '" alt="Logo Product">',
                            value.title,
                            value.category,
                            value.brand,
                            value.stock,
                            '$ ' + value.price,
                            '<a href="#" onclick="detail(' + value.id + ')" class="btn btn-primary">View</a>'
                        ]);

                        table.draw();
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            })
        });

        $('#total').change(function() {
            $format_rupiah = rupiah($('#total').val());

            $('#total').val($format_rupiah);
        })
    });

    function detail(id) {
        $.ajax({
            url: 'https://dummyjson.com/products/' + id,
            dataType: 'JSON',
            success: function(data) {
                let price = '<b>Price</b> : $ ' + data.price;
                let category = '<b>Category</b> : ' + data.category;
                let brand = '<b>Brand</b> : ' + data.brand;
                let stock = '<b>Stock</b> : ' + data.stock;
                let rating = String(data.rating);
                let arrayRating = rating.split('.');
                let image = data.images;

                let htmlStar = "";

                image.forEach(setImage);

                for (let index = 1; index <= 5; index++) {
                    if (arrayRating[0] >= index) {
                        htmlStar += '<span class="fa fa-star checked"></span>';
                    } else if (arrayRating[0] >= (index - 1) && arrayRating[1].charAt(0) > 4) {
                        htmlStar += '<span class="fa fa-star-half-o checked"></span>';
                    } else {
                        htmlStar += '<span class="fa fa-star-o checked"></span>';
                    }
                }

                $('#title').text(data.title);
                $('#price').html(price);
                $('#star').html(htmlStar);
                $('#brand').html(brand);
                $('#stock').html(stock);
                $('#description').text(data.description);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        })

        $('#detailModal').modal('show');
    }

    function setImage(item, index) {
        if (index == 0) {
            $('#image' + index).attr('src', item);
            $('#image' + index).attr('onclick', 'changeImage("' + item + '")');
            $('#imageProduct').attr('src', item);
        } else {
            $('#image' + index).attr('src', item);
            $('#image' + index).attr('onclick', 'changeImage("' + item + '")');
        }
    }

    function changeImage(src) {
        $('#imageProduct').attr('src', src);
    }

    function addOrder() {
        $('#addOrder').modal('show');
        $('#formAddOrder')[0].reset();
    }

    function save() {
        $.ajax({
            url: 'http://localhost/megacanal-test-coding/welcome/save',
            dataType: 'JSON',
            data: $('#formAddOrder').serialize(),
            method: 'POST',
            success: function(data) {
                if (data.status) {
                    Swal.fire(
                        'Success',
                        'Data Pesanan Berhasil Disimpan!',
                        'success'
                    ).then((_) => {
                        $('#addOrder').modal('hide');
                    })
                } else {
                    Swal.fire(
                        'Error',
                        'Oops! Server Error.',
                        'error'
                    )
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }

    function rupiah(nominal) {
        var number_string = nominal.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah;
    }
</script>

<!-- Modal -->
<div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <h4><u id="title">IPhone 13</u></h4>
                    </div>
                    <div class="col-2" id="price">
                        <b>Price</b> : $ 1999
                    </div>
                    <div class="col-2" id="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half-o checked"></span>
                        <span class="fa fa-star-o checked"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <img id="imageProduct" style="width: 80%;" src="https://cdn.eraspace.com/media/catalog/product/i/p/iphone_13_blue_1.jpg" alt="Gambar Product">
                    </div>
                    <div class="col-4">
                        <div class="row mt-2">
                            <div class="col-6" id="category">
                                <b>Category</b> : Smartphone
                            </div>
                            <div class="col-6" id="brand">
                                <b>Brand</b> : Apple
                            </div>
                        </div>
                        <p class="mt-4" id="stock"><b>Stock</b> : 900</p>
                        <p class="mt-4"><b>Description :</b></p>
                        <p id="description">
                            iPhone 13. Sistem kamera ganda paling canggih yang pernah ada di iPhone. Chip A15 Bionic yang secepat kilat. Lompatan besar dalam kekuatan baterai. Desain kokoh
                        </p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <img id="image0" style="width: 100%;" src="https://cdn.eraspace.com/media/catalog/product/i/p/iphone_13_blue_1.jpg" alt="Gambar Product">
                    </div>
                    <div class="col-2">
                        <img id="image1" style="width: 100%;" src="https://cdn.eraspace.com/media/catalog/product/i/p/iphone_13_blue_1.jpg" alt="Gambar Product">
                    </div>
                    <div class="col-2">
                        <img id="image2" style="width: 100%;" src="https://cdn.eraspace.com/media/catalog/product/i/p/iphone_13_blue_1.jpg" alt="Gambar Product">
                    </div>
                    <div class="col-2">
                        <img id="image3" style="width: 100%;" src="https://cdn.eraspace.com/media/catalog/product/i/p/iphone_13_blue_1.jpg" alt="Gambar Product">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAddOrder">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4" style="margin-top: 7px;">
                                <label for="no_pesanan" class="form-label">No Pesanan</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" aria-describedby="Nomer Pesanan">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4" style="margin-top: 7px;">
                                <label for="tanggal" class="form-label">Tanggal</label>
                            </div>
                            <div class="col-8">
                                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" aria-describedby="Tanggal">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4" style="margin-top: 7px;">
                                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" aria-describedby="Nama Supplier">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4" style="margin-top: 7px;">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="nama_produk" name="nama_produk" aria-describedby="Nama Produk">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4" style="margin-top: 7px;">
                                <label for="total" class="form-label">Total</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" id="total" name="total" aria-describedby="Total">
                            </div>
                        </div>
                    </div>
                    <a href="#" onclick="save()" class="btn btn-primary">Submit</a>
                </form>
            </div>
        </div>
    </div>
</div>