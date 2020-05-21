<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class SubcategoryService
{
    use ConsumeExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.service.base_uri');
        $this->secret = config('services.service.secret');
    }

    public function index()
    {
        return $this->performRequest('GET', '/subcategories');
    }

    public function store($data)
    {
        return $this->performRequest('POST', '/subcategories', $data);
    }

    public function show($subcategory)
    {
        return $this->performRequest('GET', "/subcategories/{$subcategory}");
    }

    public function update($data, $subcategory)
    {
        return $this->performRequest('PATCH', "/subcategories/{$subcategory}", $data);
    }

    public function destroy($subcategory)
    {
        return $this->performRequest('DELETE', "/subcategories/{$subcategory}");
    }


}




