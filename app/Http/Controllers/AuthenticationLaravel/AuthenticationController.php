<?php

namespace App\Http\Controllers\AuthenticationLaravel;


use App\Http\Controllers\Controller;
use App\Services\AuthenticationService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    use ApiResponser;
    public $authenticatonService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticatonService = $authenticationService;
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->authenticatonService->createUser($request->all()));
    }

    public function login(Request $request)
    {
        return $this->successResponse($this->authenticatonService->login($request->all()));
    }

}