<?php

namespace Controller;

include "Traits/ResponseFormatter.php";
include "Controller/Controller.php";

use ResponseFormatter;
// use Traits\ResponseFormatter;

class FilmController extends Controller
{
    use ResponseFormatter;

    public function __construct()
    {
        $this->controllerName = "List of Movies";
        $this->controllerMethod = "GET";
    }

    public function getAllProduct()
    {
        $dummyData = [
            [
                "title" => "WALL·E",
                "genre" => "Animation",
                "release_year" => 2008,
            ],
            [
                "title" => "Spider-Man: Across the Spider-Verse",
                "genre" => "Action",
                "release_year" => 2023,
            ],
            [
                "title" => "The Dark Knight",
                "genre" => "Action",
                "release_year" => 2008,
            ],
            [
                "title" => "Oppenheimer",
                "genre" => "Biography",
                "release_year" => 2023,
            ],
            [
                "title" => "Schindler's List",
                "genre" => "Historical Drama",
                "release_year" => 1993,
            ],
        ];

        $response = [
            "controller_attribute" => $this->getControllerAttribute(),
            "products" => $dummyData,
        ];

        return $this->responseFormatter(200, "Success", $response);
    }
}