<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Support\Facades\Storage;

class PaymentService
{
    public function getAllPayments()
    {
        return Payment::with('occupant', 'house', 'duesType')->get();
    }

    public function createPayment($data)
    {
        // Check if the payment_proof is present in the data
        if (isset($data['payment_proof_url'])) {
            // Store the payment proof image and update the payment_proof_url field
            $data['payment_proof_url'] = $this->storePaymentProof($data['payment_proof_url']);
        }

        return Payment::create($data);
    }

    public function updatePayment(Payment $payment, $data)
    {
        if (isset($data['payment_proof_url'])) {
            // Store the payment proof image and update the payment_proof_url field
            $data['payment_proof_url'] = $this->storePaymentProof($data['payment_proof_url']);
        }

        $payment->update($data);

        return $payment;
    }

    public function deletePayment(Payment $payment)
    {
        $this->deletePaymentProof($payment->payment_proof_url);
        $payment->delete();
    }

    private function storePaymentProof($paymentProof)
    {
        // Logika untuk menyimpan foto KTP ke storage
        $path = Storage::putFile('ktp_images', $paymentProof);
        return Storage::url($path);
    }

    private function deletePaymentProof($paymentProofUrl)
    {
        $path = str_replace(Storage::url(''), '', $paymentProofUrl);
        Storage::delete($path);
    }
}
