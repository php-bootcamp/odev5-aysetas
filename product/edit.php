<?php
include '../layouts/header.php';
require '../netting/connect.php';
require '../netting/process.php';

$edit=$db->prepare("select * from products where id=:id");
$edit->execute(array('id'=> $_GET['id']));
$entry= $edit -> Fetch(PDO::FETCH_ASSOC);

?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-0 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Ürün Yönetimi</h3>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">

                    </div>
                </div>
            </div>
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form-center">
                                Ürün Düzenle
                            </h4>
                            <div class="content-header-right col-md-4 col-12">
                                <div class="btn-group float-md-right">
                                    <ul class="nav navbar-right panel_toolbox">
                                        <?php
                                        if(@$_GET['durum']=="ok"):
                                            ?>
                                            <b style="color:green;">Ürün düzenlendi..</b>
                                        <?php
                                        elseif(@$_GET['durum']=="no"):
                                            ?>
                                            <b style="color:#ff0000;">Ürün düzenlenmedi..</b>
                                        <?php
                                        endif;
                                        ?>
                                    </ul>
                                </div>
                            </div>
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
                                                <input type="hidden" name="id" value="<?php echo $entry['id'];?>">
                                                <div class="form-group">
                                                    <label for="product_name"><b>Ürün Adı:</b></label>


                                                    <input type="text" id="product_name" class="form-control"  name="product_name" value="<?php echo $entry['product_name'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price"><b>Fiyatı:</b></label>
                                                    <input type="text" id="price" class="form-control"  name="price" value="<?php echo $entry['price'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="content"><b>Açıklama:</b></label>
                                                    <input type="text" id="content" class="form-control"  name="content" value="<?php echo $entry['content'];?>">
                                                </div>

                                                <div class="btn-group float-md-right">
                                                    <input style="width:%100" class="btn btn-success" type="submit" name="ProductEdit" value="Güncelle">
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
