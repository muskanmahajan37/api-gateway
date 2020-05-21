<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ServiceService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubCategoryController
{
    use ApiResponser;
    public $subcategoryService;

    public function __construct(SubCategoryService $subcategoryService)
    {
        $this->subcategoryService = $subcategoryService;
    }

    public function index()
    {
        return $this->successResponse($this->subcategoryService->index());
    }

    public function store(Request $request)
    {
        return $this->successResponse($this->subcategoryService->store($request->all()));
    }

    public function show($subcategory)
    {
        return $this->successResponse($this->subcategoryService->show($subcategory));
    }

    public function update(Request $request, $subcategory)
    {
        return $this->successResponse($this->subcategoryService->update($request->all(), $subcategory));
    }

    public function destroy($subcategory)
    {
        return $this->successResponse($this->subcategoryService->destroy($subcategory));
    }
}