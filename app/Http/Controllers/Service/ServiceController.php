<?php
namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Service;
use App\Services\ServiceService;
use App\Traits\ApiResponser;
use App\User;
use Illuminate\Http\Request;

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

        $user = User::find($request->get("user_id"));
        if (!$user) {
            return response()->json("User cannot be found", 404);
        }
        $image = $request->file('image');
        $fileToStore = $image->getClientOriginalName();
        $image->move(base_path('public/images'), $fileToStore);
        return $this->successResponse($this->serviceService->store($request->all()));

    }

    public function show($service)
    {
        return $this->successResponse($this->serviceService->show($service));
    }

    public function update(Request $request,$service)
    {
        $user_id = $request->get("user_id");
        $user = User::find($user_id);
        if (!$user) {
            return response()->json("User doesn't exist", 404);
        }
        $servisi = json_decode($this->serviceService->show($service), true);
        $service_id = $servisi["id"];
        $service_user_id = $servisi["user_id"];
        if ($service_user_id != $user_id && $user->role_id == 1) {
            return response()->json("Forbidden", 403);
        } else if ($service_user_id != $user_id && $user->role_id == 2) {
            $image = $request->file('image');
            $fileToStore = $image->getClientOriginalName();
            $image->move(base_path('public/images'), $fileToStore);
        } else {
            $image = $request->file('image');
            $fileToStore = $image->getClientOriginalName();
            $image->move(base_path('public/images'), $fileToStore);
        }
        return $this->successResponse($this->serviceService->update($request->all(), $service));


    }

    public function destroy($service)
    {
        return $this->successResponse($this->serviceService->destroy($service));
    }
    public function findByCategory($category)
    {
        return $this->successResponse($this->serviceService->findByCategory($category));
    }
    public function findBySubCategory($subcategory){
        return $this->successResponse($this->serviceService->findBySubCategory($subcategory));

    }
    public function findByUser($user){
        return $this->successResponse($this->serviceService->findByUser($user->id));
    }
}

