<?php
session_start();
unset($_SESSION['id_admin']);
unset($_SESSION['username']);
unset($_SESSION['nama']);
unset($_SESSION['telepon']);
unset($_SESSION['email']);
unset($_SESSION['foto']);
unset($_SESSION['is_login']);
session_destroy();
header("Location: index.php");
echo"<script>alert('Annda telah berhasil logout!');</script>";

?>