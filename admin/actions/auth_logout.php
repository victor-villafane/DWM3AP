<?php

require_once "../../funciones/autoload.php";

(new Autentificacion())->log_out();

header("Location: ../index.php");