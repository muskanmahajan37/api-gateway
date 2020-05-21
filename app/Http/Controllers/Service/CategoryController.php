<?php


namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ServiceService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController
{
    use ApiResponser;
    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->successResponse($this->categoryService->index());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->categoryService->store($request->all()));
    }

    public function show($category)
    {
        return $this->successResponse($this->categoryService->show($category));
    }

    public function update(Request $request, $category)
    {
        return $this->successResponse($this->categoryService->update($request->all(), $category));
    }

    public function destroy($category)
    {
        return $this->successResponse($this->serviceService->destroy($category));
    }
}






