<?php
namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Service;
use App\Services\ServiceService;
use App\Traits\ApiResponser;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Auth;


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
        $user = Auth::user();
        $user_id = $user["id"];
        $user_role = $user["role_id"];
        $servisi = json_decode($this->serviceService->show($service), true);
        $service_id = $servisi["id"];
        $service_user_id = $servisi["user_id"];

        if ($service_user_id != $user_id && $user_role == 1) {
            return response()->json("Forbidden", 403);
        } else if ($service_user_id != $user_id && $user_role == 2) {
            $image = $request->file('image');
            $fileToStore = $image->getClientOriginalName();
            $image->move(base_path('public/images'), $fileToStore);
            return $this->successResponse($this->serviceService->update($request->all(), $service));
        } else {
            $image = $request->file('image');
            $fileToStore = $image->getClientOriginalName();
            $image->move(base_path('public/images'), $fileToStore);
            return $this->successResponse($this->serviceService->update($request->all(), $service));
        }
    }

    public function destroy($service)
    {
        $user = Auth::user();
        $user_id = $user["id"];
        $user_role = $user["role_id"];

        $servisi = json_decode($this->serviceService->show($service), true);
        $service_user_id = $servisi["user_id"];

        if($user_id != $service_user_id && $user_role == 1){
            return response()->json("Forbidden", 403);
        }else if($user_id != $service_user_id && $user_role == 2){
            return $this->successResponse($this->serviceService->destroy($service));
        }else{
            return $this->successResponse($this->serviceService->destroy($service));
        }
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

