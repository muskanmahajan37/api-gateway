<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class CategoryService
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
        return $this->performRequest('GET', '/categories');
    }

    public function store($data)
    {
        return $this->performRequest('POST', '/categories', $data);
    }

    public function show($category)
    {
        return $this->performRequest('GET', "/categories/{$category}");
    }


    public function update($data, $category)
    {
        return $this->performRequest('PATCH', "/categories/{$category}", $data);
    }

    public function destroy($category)
    {
        return $this->performRequest('DELETE', "/services/{$category}");
    }

}

