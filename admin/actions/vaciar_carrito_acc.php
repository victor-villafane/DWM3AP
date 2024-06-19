<?php

require_once "../../funciones/autoload.php";

(new Carrito())->vaciar_carrito();

header("location: ../../index.php?sec=carrito");