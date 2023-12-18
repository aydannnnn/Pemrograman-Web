<?php

namespace app\Controller;

include "app/Traits/ApiResponseFormatter.php";
include "app/Models/Company.php";

use app\Models\Company;
use app\Traits\ApiResponseFormatter;

class CompanyController
{
    // PAKAI TRAIT YANS SUDAH DIBUAT
    use ApiResponseFormatter;
    public function index()
    {
        $CompanyModel = new Company();
        $response = $CompanyModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $CompanyModel = new Company();
        $response = $CompanyModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            # code...
            return $this->apiResponse(400, "error invalid input", null);
        }

        $CompanyModel = new Company();
        $response = $CompanyModel->create([
            "nik" => $inputData['nik'],
            "name" => $inputData['name'],
            "position_id" => $inputData['position_id']
        ]);
        return $this->apiResponse(200, "success", $response);
    }
    public function update($id)
    {
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);
        if (json_last_error()) {
            # code...
            return $this->apiResponse(400, "error invalid input", null);
        }
        $CompanyModel = new Company();
        $response = $CompanyModel->update([
            "name" => $inputData['name']
        ], $id);
        return $this->apiResponse(200, "success", $response);
    }
    public function delete($id)
    {
        $CompanyModel = new Company();
        $response = $CompanyModel->destroy($id);

        return $this->apiResponse(200, "success", $response);
    }
}
