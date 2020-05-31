<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class PaymentService
{
    use ConsumeExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.payment.base_uri');
        $this->secret = config('services.payment.secret');
    }

    public function index()
    {
        return $this->performRequest('GET', '/charge');
    }



}