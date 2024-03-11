<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Services\PaymentService;
use App\Http\Requests\CreatePaymentPostRequest;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $payments = $this->paymentService->getAllPayments();
        return response()->json(['data' => $payments], 200);
    }

    public function show(Payment $payment)
    {
        return response()->json(['data' => $payment], 200);
    }

    public function store(CreatePaymentPostRequest $request)
    {
        $data = $request->validated();

        $payment = $this->paymentService->createPayment($data);

        return response()->json(['data' => $payment], 201);
    }

    public function update(CreatePaymentPostRequest $request, Payment $payment)
    {
        $data = $request->validated();

        $payment = $this->paymentService->updatePayment($payment, $data);

        return response()->json(['data' => $payment], 200);
    }

    public function destroy(Payment $payment)
    {
        $this->paymentService->deletePayment($payment);
        return response()->json(['message' => 'Payment deleted successfully'], 200);
    }
}
