<?php
session_start();
unset($_SESSION["UID"]);
session_destroy();
header("Location:login.php");


?> 