<?php
namespace App\Services;

use App\Traits\ConsumeExternalService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ServiceService
{
    use ConsumeExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.service.base_uri');
        $this->secret = config('services.service.secret');
    }


    public function obtainServices()
    {
        return $this->performRequest('GET', '/services');
    }

    public function store($data)
    {

        $fileToStore= $data['image'];
        $file = $fileToStore->getClientOriginalName();
        $data['image']=$file;

        return $this->performRequest('POST', '/services', $data);
    }

    public function show($service)
    {
        return $this->performRequest('GET', "/services/{$service}");
    }


    public function update($data, $service)
    {
        return $this->performRequest('PATCH', "/services/{$service}", $data);
    }

    public function destroy($service)
    {
        return $this->performRequest('DELETE', "/services/{$service}");
    }
    public function findByCategory($category){

        return $this->performRequest('GET', "/categories/{$category}/services");
    }
    public function findBySubCategory($subcategory){
        return $this->performRequest('GET', "/subcategories/{$subcategory}/services");
    }
    public function findByUser($user){
        return $this->performRequest('GET', "/users/{$user}/services");

    }


}