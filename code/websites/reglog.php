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
<button class="btn btn-primary mt-3">Bejelentkezés</button>

</div>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

