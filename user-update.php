<?php

require './Management/AuthManangment.php';
require './Management/UserManangment.php';
checkSession();


$return = userUpdate();
?>


<?php
include './view/header.php'
?>


    <title>Bilgileri Guncelleme || Ari Money - Aklinda Tut</title>

<?php
include './view/body_a.php'
?>


    <form method="post" action="user-update.php">

        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Isim</label>
            <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" class="form-control"
                   id="exampleInputName">
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" value="<?php echo $_SESSION['email'] ?>" class="form-control"
                   id="exampleInputEmail1"
                   aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Sifre</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Sifre Tekrari</label>
            <input type="password" name="password_again" class="form-control" id="exampleInputPassword1">
        </div>

        <?php
        echo $return . '<br>'
        ?>

        <button type="submit" class="btn btn-primary">Guncelle</button>
    </form>


<?php
include './view/body_b.php'
?>