<?php
require "includes/login-inc.php";
unset($_SESSION['login']);
header("Location: login.php");
