<?php

namespace app\Routes;

include "app/Controller/CompanyController.php";

use app\Controller\CompanyController;

class CompanyRoutes
{
    public function handle($method, $path)
    {
        if ($method === 'GET' && $path === '/api/company') {
            $controller = new CompanyController();
            echo $controller->index();
        }

        if ($method === 'GET' && strpos($path, '/api/company/') === 0) {
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new CompanyController();
            echo $controller->getById($id);
        }

        if ($method === 'POST' && $path === '/api/company') {
            $controller = new CompanyController();
            echo $controller->insert();
        }

        if ($method === 'PUT' && strpos($path, '/api/company/') === 0) {
            # code...
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new CompanyController();
            echo $controller->update($id);
        }

        if ($method === 'DELETE' && strpos($path, '/api/company/') === 0) {
            # code...
            $pathParts = explode('/', $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new CompanyController();
            echo $controller->delete($id);
        }
    }
}
