<?php

    $db_pass = 'EsXteT/UmicE/61h';

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

  <?php include_once('../others/navbar.php')?>

  <div class="container">
<form action="" method="POST">
    <div class="form-group">
        <label for="">Name</label>
        <input name="name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input name="email" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input name="password" type="password" class="form-control">
    </div>
</form>

<button class="btn btn-primary mt-3">Regisztráció</button>
<?php
            $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);
            $result = $dbh->query("SELECT * FROM users");
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
        ?>
<button class="btn btn-primary mt-3">Bejelentkezés</button>
<?php

require_once('config.inc.php');

session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);
    $sql = "SELECT * FROM users WHERE email = ? AND password = SHA1(?)";
    $sth = $dbh->prepare($sql);
    $sth->execute([$_POST['email'], $_POST['password']]);
    $users = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) === 1) {
        $_SESSION['authenticated'] = true;
        // Redirect to your secure location
        header('Location: users.php');
        return;
    } else {
        $error = 'Incorrect username or password';
    }
}

?>
</div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

