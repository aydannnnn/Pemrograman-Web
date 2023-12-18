<?php
header("Content-Type: application/json; charset=UTF-8");

include "app/Routes/CompanyRoutes.php";

use app\Routes\CompanyRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$companyRoute = new CompanyRoutes();
$companyRoute->handle($method, $path);