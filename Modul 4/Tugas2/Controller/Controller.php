<?php

namespace Controller;

abstract class Controller
{
    protected $controllerName;
    protected $controllerMethod;

    public function getControllerAttribute()
    {
        return [
            "ControllerName" => $this->controllerName,
            "Method" => $this->controllerMethod,
        ];
    }
    abstract public function getAllProduct();
}
