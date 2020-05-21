<?php
namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ServiceService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    use ApiResponser;
    public $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        return $this->successResponse($this->serviceService->obtainServices());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->serviceService->store($request->all()));
    }

    public function show($service)
    {
        return $this->successResponse($this->serviceService->show($service));
    }

    public function update(Request $request, $service)
    {
        return $this->successResponse($this->serviceService->update($request->all(), $service));
    }

    public function destroy($service)
    {
        return $this->successResponse($this->serviceService->destroy($service));
    }
}

