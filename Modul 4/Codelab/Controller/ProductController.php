<?php

namespace Controller;

include "Traits/ResponseFormater.php";
include "Controller/Controller.php";

use ResponseFormatter;
// use Traits\ResponseFormater;

class ProductController extends Controller
{
    use ResponseFormatter;
    public function __construct()
    {
        $this->controllerName = "Get All Product";
        $this->controllerMethod = "GET";
    }
    public function getAllProduct()
    {
        $dummyData = [
            "Air Mineral",
            "Kebab",
            "Spaghetti",
            "Jus Jambu"
        ];

        $response = [
            "controller_attribute" => $this->getControllerAttribute(),
            "product" => $dummyData
        ];

        return $this->responseFormatter(200, "Success", $response);
    }
}
