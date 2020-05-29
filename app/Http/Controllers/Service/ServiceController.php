<?php
namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ServiceService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

        $image = $request->file('image');
         $fileToStore =$image->getClientOriginalName();
        $image->move(base_path('public/images'), $fileToStore);
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

////        $image = $request->file('image');
////        $fileToStore =$image->getClientOriginalName();
////        return $fileToStore;
////        return $request->all();
//        $imagee = $request->file('image');
//        $fileToStore =$imagee->getClientOriginalName();
//        $user_id = $request->user_id;
//        $name=$request->name;
//        $description = $request->description;
//        $category_id = $request->category_id;
//        $subcategory_id = $request->subcategory_id;
//        $price = $request->price;
//        $image= $fileToStore;
//        $data = array($user_id,$name,$description,$category_id,$subcategory_id,$price,$image);
////        return $fileToStore;
////        return $request->all();