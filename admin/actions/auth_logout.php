<?php

require_once "../../funciones/autoload.php";

unset($_SESSION["login"]);
session_destroy();

header("Location: ../index.php");