<?php

namespace App\app\controllers;

class PaymentMethodsController extends BaseController
{
    public function __construct()
    {
    }

    public function getClientMethodOnline()
    {
        $this->loadView("clients/MethodOnline.php");
    }
}
