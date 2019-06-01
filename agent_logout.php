<?php
session_start();
unset($_SESSION["agent_email"]);
unset($_SESSION["agent_name"]);

header("Location:index.php");
?>