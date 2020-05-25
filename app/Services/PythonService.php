<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class PythonService
{

    use ConsumeExternalService;
    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.python.base_uri');
        $this->secret = config('services.python.secret');
    }

    public function getHello()
    {
        return $this->performRequest('GET', '/api/v1/users/hello');
    }

}