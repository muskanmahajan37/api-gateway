<?php


namespace App\Http\Controllers\Payment;


use App\Services\PaymentService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PaymentController
{
    use ApiResponser;
    public $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return $this->successResponse($this->paymentService->index());
    }

    public function show($payment){
        return $this->successResponse($this->paymentService->show($payment));
    }

    public function create(Request $request){
        return $this->successResponse($this->paymentService->create($request->all()));
    }

    public function destroy($payment){
        return $this->successResponse($this->paymentService->destroy($payment));
    }

    public function showAllCustomers(){
        return $this->successResponse($this->paymentService->showAllCustomers());
    }

    public function showCustomer($customer){
        return $this->successResponse($this->paymentService->showCustomer($customer));
    }

    public function deleteCustomer($customer){
        return $this->successResponse($this->paymentService->deleteCustomer($customer));
    }

}