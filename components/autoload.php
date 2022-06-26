<?php

namespace components;


use controller\RegistrationController;
use model\Database;

class autoload
{
        spl_autoload_register(function ($class_name)) {
            include $class_name . ' .php';
});

$obj = new Database();
$obj1 = new RegistrationController();


}