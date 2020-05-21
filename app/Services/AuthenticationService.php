<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class AuthenticationService
{
    use ConsumeExternalService;

    public $baseUri;

    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authentication.base_uri');
        $this->secret = config('services.authentication.secret');
    }



    public function createUser($data)
    {
        return $this->performRequest('POST', '/api/auth/signup', $data);
    }

    public function login($data)
    {
        return $this->performRequest('POST', '/api/auth/login', $data);
    }

}