<?php


namespace App\Http\Controllers\Payment;


use App\Services\PaymentService;
use App\Traits\ApiResponser;

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
}