<?php
session_start();
session_unset();
session_destroy();
header("Location: /master.blade.php"); // Redirige al login después de cerrar sesión
exit;
?>

