<?php

namespace App\Http\Controllers;

use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function index()
    {
        // dd(9);
        $content = [
            'subject' => 'This is the mail subject',
            'body' => 'This is the email body of how to send email from laravel 10 with mailtrap.'
        ];

        Mail::to('nguyenvancuong13102001t@gmail.com')->send(new SampleMail($content));

        return "Email has been sent!";
    }
}