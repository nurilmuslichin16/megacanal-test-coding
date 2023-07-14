<div class="container">
    <div class="row mt-5 mb-3">
        <div class="col-6">
            <h2><u>PRODUCT LIST</u></h2>
        </div>
        <div class="col-6">
            <a href="#" id="btnShowProduct" class="btn btn-primary">Show Products</a>
        </div>
    </div>
    <table id="listProduct" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    <img style="width: 20%;" src="https://www.nurulfikri.com/wp-content/uploads/2019/11/logo-2582748_960_720.png" alt="Logo Product">
                </th>
                <td>IPhone 13</td>
                <td>Phone</td>
                <td>Apple</td>
                <td>10</td>
                <td>13000000</td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#detailModal" class="btn btn-primary">View</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#listProduct').DataTable();

        $('#btnShowProduct').click(function() {
            alert('Okee');
        });
    });
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
                    <div class="col-6">
                        <h4><u>IPhone 13</u></h4>
                    </div>
                    <div class="col-3">
                        Price : $1999
                    </div>
                    <div class="col-3">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <img style="width: 80%;" src="https://cdn.eraspace.com/media/catalog/product/i/p/iphone_13_blue_1.jpg" alt="">
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <b>Category</b> : Smartphone
                            </div>
                            <div class="col-6">
                                <b>Brand</b> : Apple
                            </div>
                        </div>
                        <p class="mt-4"><b>Stock</b> : 900</p>
                        <p class="mt-4"><b>Description :</b></p>
                        <p>
                            iPhone 13. Sistem kamera ganda paling canggih yang pernah ada di iPhone. Chip A15 Bionic yang secepat kilat. Lompatan besar dalam kekuatan baterai. Desain kokoh
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>