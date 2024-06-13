<?php
require_once "includes/header.php";

if (isset($_SESSION['login'])) {
?>

  <body style=" background:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.8)), url(includes/pozadina.jpg); background-size: 100% 100%; background-repeat: no-repeat;  ">
    <main class="px-3">
      <h1 style="margin-top: 10%;">Klik do posla</h1>
      <p class="lead">Klikom pogledaj CRM App ponudu poslova</p>
      <p class="lead">
        <a href="#" class="btn btn-lg btn-secondary text-black fw-bold border-white bg-white">Pročitaj više</a>
      </p>
    </main>

    <footer class="mt-auto text-white-50">
      <p> <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a> @mdo</p>
    </footer>
    </div>
  </body>
<?php

} else {
  header("Location: login.php?error");
}

require_once "includes/footer.php";
?>