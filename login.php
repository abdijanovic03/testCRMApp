<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.98.0">
  <title>CRM App</title>
  <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
</head>

<body class="text-center bg-dark text-white ">
  <br><br><br><br><br>
  <main class="form-signin m-auto" style="margin-top: 121px;">
    <div class="container col-3">
      <form action="includes/login-inc.php" method="post">
        <img class="rounded" src="includes/photo.png">
        <h1 class="h3 mb-3 fw-normal text-white">Please sign in</h1>
        <?php
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (strpos($url, 'error') !== false) {
        ?>
          <div class="form-floating text-black has-validation">
            <input type="text" class="form-control is-invalid" id="validationServerUsername" name="username" placeholder="Password">

            <label for="validationServerUsername">Username</label>
          </div> <br>
          <div class="form-floating text-black  has-validation">
            <input type="password" class="form-control is-invalid" id="validationServerUsername" name="password" placeholder="Password">
            <div id="validationServerUsername" class="invalid-feedback">Unesite tačne podatke</div>
            <label for="validationServerUsername">Password</label>
          </div> <br>

          <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
      </form>
    </div>
  <?php
        } else {
  ?>
    <div class="form-floating text-black ">
      <input type="text" class="form-control" id="floatingInput" type="text" name="username" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div> <br>
    <div class="form-floating text-black">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div> <br>


    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
    </div>
  <?php
        }
  ?>
  </main>
</body>

</html>