<?php


namespace App\Http\Controllers\Python;


use App\Services\PythonService;
use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;


class PythonController extends Controller
{

    use ApiResponser;
    public $pythonService;

    public function __construct(PythonService $pythonService)
    {
        $this->pythonService = $pythonService;
    }

    public function hello()
    {
        return $this->successResponse($this->pythonService->getHello());
    }

}