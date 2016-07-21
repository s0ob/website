<?php
if (session_start()){
session_destroy();
header("Location: Home.php");
}
?>

