<?php
require "../netting/connect.php";
include "../layouts/header.php";
?>
<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Kategori Yönetimi</h3>
                </div>


            </div>
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="card-header">
                                <h4 class="card-title">Kategori Listesi</h4>
                                <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <a href="../category/add.php" class="btn btn-primary btn-sm"><i class="ft-plus white"></i>Kategori Ekle</a>
                                    <span class="dropdown">
                                        <button id="btnSearchDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-warning dropdown-toggle dropdown-menu-right btn-sm"><i class="ft-download-cloud white"></i></button>
                                        <span aria-labelledby="btnSearchDrop1" class="dropdown-menu mt-1 dropdown-menu-right">
                                            <a href="#" class="dropdown-item"><i class="ft-upload"></i>Yükle</a>
                                            <a href="#" class="dropdown-item"><i class="ft-download"></i>İndir</a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="card-body">
                                <!-- Task List table -->
                                <div class="table-responsive">
                                    <table id="users-contacts" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kategori Adı</th>
                                                <th>Ayarlar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $category=$db->prepare("select * from categories");
                                            $category->execute(array());
                                            $list=$category->FetchALL(PDO::FETCH_ASSOC);
                                            foreach ($list as $entry){?>
                                            <tr>
                                                <td><?php echo $entry['id'];?></td>

                                                <td>
                                                    <div class="media">
                                                        <div class="media-body media-middle">
                                                            <a href="#" class="media-heading"><?php echo $entry['category_name'];?></a>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <span class="dropdown">
                                                        <button id="btnSearchDrop2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-primary dropdown-toggle dropdown-menu-right"><i class="ft-settings"></i></button>
                                                        <span aria-labelledby="btnSearchDrop2" class="dropdown-menu mt-1 dropdown-menu-right">
                                                            <a href="edit.php?id=<?php echo $entry['id'];?>" class="dropdown-item"><i class="ft-edit-2"></i>Düzenle</a>
                                                            <a href="../netting/process.php?id=<?php echo $entry['id'];?>&delete=ok" class="dropdown-item" onclick="return confirm('Emin misiniz?')">
                                                                <i class="ft-trash-2"></i>Sil</a>
                                                        </span>
                                                    </span>
                                                </td>
                                            </tr>
                                       <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
   <?php include "../layouts/footer.php"?>