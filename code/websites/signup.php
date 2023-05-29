<?php

    $db_pass = '*HaKCSJF.[EOU2Ki';

    $db_name = 'SzimplaKert';

    if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) ) {
        $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);

        $sql = "INSERT INTO users (name, email, password) 
            VALUES 
            ('{$_POST['name']}', '{$_POST['email']}', SHA1('{$_POST['password']}'))
        ";


        $dbh->query($sql); 
    }
?>

<!doctype html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bejelentkezés/Regisztráció</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../others/style.css">
</head>
  <body>
  <?php include_once('../others/navbar.php')?>
    
    <div class= "content">
        <div class="titlepage">
    <div class="container  w-25">
        <h2 class="reglog">Regisztráció</h2>
<form action="" method="POST">
    <div class="form-group">
        <label class="text-white" for="" >Name</label>
        <input name="name" type="text" class="form-control" placeholder="Kovács Béla">
    </div>
    <div class="form-group">
        <label class="text-white" for="">Email</label>
        <input name="email" type="email" class="form-control" placeholder="valami@gmail.com">
    </div>
    <div class="form-group">
        <label class="text-white" for="">Password</label>
        <input name="password" type="password" class="form-control" placeholder="a-z A-Z 0-9">
    </div>
</form>

<button type="button" class="btn btn-primary mt-3">Regisztráció</button>

    <?php
            $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);
            $result = $dbh->query("SELECT * FROM users");
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
        ?>

    </div>
    </div>
    </div>
  

<div class="regloghatter">

</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
