<?php

namespace App\Service;

use App\Mail\SendMail;
use App\Models\Payment;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PricingService
{
    private function getPrice($userId)
    {
        $users = ProfileUser::where('user_id', $userId)->first();
        if ($users->status == 'Mahasiswa' && $users->univ == NULL){
            $amount = 75000;
        } else if($users->status == 'Mahasiswa' && $users->univ != NULL){
            $amount = 150000;
        } else if($users->status == 'Dosen' && $users->univ == NULL){
            $amount = 150000;
        } else if($users->status == 'Dosen' && $users->univ != NULL){
            $amount = 200000;
        } else {
            $amount = 0;
        }
        return $amount;
    }

    private function createPayment($userId, $amount, $dummyId){
        Payment::create([
            'user_id' => $userId,
            'group_id' => $dummyId, //group
            'amount' => $amount,
            'payment_method' => null,
            'payment_date' => null,
            'path_proof' => null,
        ]);
    }

    private function paymentNotification($userId, $amount): void
    {
        $mailData = [
            'title' => 'Pembayaran Ajuan Ethical Clearance',
            'body' => 'Ajuan akan di proses. Mohon untuk melakukan pembayaran sebesar '.$this->formatRupiah($amount).' Upload bukti pembayaran di menu Payment.',
            'subject' => 'Pembayaran Ajuan Ethical Clearance',
            'view' => 'pages.email.sendUser',
            'link' => 'user/payment',
        ];
        $user = User::find($userId);
        Mail::to($user->email)->send(new SendMail($mailData));
    }

    public function formatRupiah($amount)
    {
        return 'Rp ' . number_format($amount, 0, ',', '.').',00 ';
    }

    public function executePayment($userId, $dummyId): void
    {
        $amount = $this->getPrice($userId);
        $this->createPayment($userId, $amount, $dummyId);
        $this->paymentNotification($userId, $amount);
    }

}
