<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class PaymentService
{
    use ConsumeExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.payment.base_uri');
        $this->secret = config('services.payment.secret');
    }

    public function index()
    {
        return $this->performRequest("GET", "/payments");
    }

    public function show($payment){
        return $this->performRequest("GET","payments/{$payment}");
    }

    public function create($data){
        return $this->performRequest("POST", "/payments",$data);
    }

    public function destroy($payment){
        return $this->performRequest("DELETE","/payments/{$payment}");
    }

    # Stripe customer

    public function showAllCustomers(){
        return $this->performRequest("GET","/customers");
    }

    public function showCustomer($customer){
        return $this->performRequest("GET","/customers/{$customer}");
    }

    public function deleteCustomer($customer){
        return $this->performRequest("DELETE","/customers/{$customer}");
    }

}