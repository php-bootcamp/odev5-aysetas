<?php
include '../layouts/header.php';
require '../netting/connect.php';
require '../netting/process.php';
?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-0 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Ürün Yönetimi</h3>
            </div>
            <div class="content-header-right col-md-6 col-12">
            </div>
        </div>
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form-center">
                            Ürün Ekle
                        </h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <?php
                            if(@$_GET['durum']=="ok"):
                                ?>
                                <b style="color:green;">Ürün eklendi..</b>
                            <?php
                            elseif(@$_GET['durum']=="no"):
                            ?>
                                <b style="color:#ff0000;">Ürün eklenemedi..</b>
                            <?php
                            endif;
                            ?>
                        </ul>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" method="POST" action="../netting/process.php">
                                <input type="hidden" name="token" value="<?php echo $_SESSION['token']?>">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="product_name"><b>Ürün Adı:</b></label>
                                                <input type="text" id="product_name" class="form-control" placeholder="Ürün adını giriniz" name="product_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="price"><b>Fiyatı:</b></label>
                                                <input type="text" id="price" class="form-control" placeholder="Fiyatı giriniz" name="price" >
                                            </div>
                                            <div class="form-group">
                                                <label for="content"><b>Açıklama:</b></label>
                                                <textarea id="content" class="form-control" placeholder="" name="content" ></textarea>
                                            </div>

                                            <div class="btn-group float-md-right">
                                                <input style="width:%100" class="btn btn-success" type="submit" name="productSave" value="Kaydet">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../layouts/footer.php"?>

