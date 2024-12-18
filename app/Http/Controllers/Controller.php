<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){

        $email = Auth::user()->email;
        $mailData = [
            'title' => 'Mail from KEP FKIP',
            'body' => 'This is for testing email using smtp.',
            'subject' => 'Tes',
            'view' => 'pages.email.sendUser'
        ];

        Mail::to($email)->send(new SendMail($mailData));

        return ['message' => 'Email sent!', 'email' => $email, 200];

    }

    public function tes(){
       $pass = Hash::make(env('USER_PASSWORD'));
       $d = env('USER_PASSWORD', '123');
         return ['message' => $pass, 'data' => $d];
    }
}
