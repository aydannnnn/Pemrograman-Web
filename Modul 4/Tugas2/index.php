<?php
include "Controller/FilmController.php";

use Controller\FilmController;

$filmController = new FilmController;

echo $filmController->getAllProduct();