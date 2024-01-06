<?php

require './Management/AuthManangment.php';
require './Management/UserManangment.php';

checkSession();

$users = indexUser();
?>

<?php
include './view/header.php'
?>


<title>Anasayafa || Arı Matik - Aklinda Tut</title>


<?php
include './view/body_a.php'
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">


            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                    </div>
                    <h3 class="card-title">Kullanicilar</h3>

                </div>


                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">Sira</th>
                            <th>Isim</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        foreach ($users as $key => $item) {
                            echo '
                                <tr>
                                    <td> ' . $key + 1 . ' </td>
                                    <td> ' . $item["name"] . ' </td>
                                    <td> ' . $item["email"] . ' </td>
                                </tr>
                                    ';

                        }
                        ?>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <?php
            include './view/body_b.php'
            ?>

