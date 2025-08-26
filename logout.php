<?php
session_start();
session_unset();
session_destroy();

// Borrar cookies
setcookie("usuario", "", time() - 3600, "/");
setcookie("rol", "", time() - 3600, "/");

header("Location: login.php");
exit();
