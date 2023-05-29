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
        <h2 class="reglog">Bejelentkezés</h2>
<form action="" method="POST">
    <div class="form-group">
        <label class="text-white" for="">Email</label>
        <input name="email" type="email" class="form-control" placeholder="valami@gmail.com">
    </div>
    <div class="form-group">
        <label class="text-white" for="">Password</label>
        <input name="password" type="password" class="form-control" placeholder="a-z A-Z 0-9">
    </div>
</form>
<button type="button" class="btn btn-primary mt-3" >Bejelentkezés</button>
<p><label class="text-white mt-2" for=""> <a href="signup.php">Még nincs fiókod? Katt ide</a></label></p>

<?php
require_once('../others/config.inc.php');

session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $dbh = new PDO("mysql:host=localhost;dbname=$db_name", $db_name, $db_pass);
    $sql = "SELECT * FROM users WHERE email = ? AND password = SHA1(?)";
    $sth = $dbh->prepare($sql);
    $sth->execute([$_POST['email'], $_POST['password']]);
    $users = $sth->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) === 1) {
        $_SESSION['authenticated'] = true;
       
        header('Location: termekek.php');
        return;
    } else {
        $error = 'Incorrect username or password';
    }
}

?>
    </div>
    </div>
    </div>
  

<div class="regloghatter">

</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

</div>