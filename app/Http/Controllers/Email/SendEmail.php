<?php

namespace App\Http\Controllers\Email;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

class SendEmail extends Controller
{
    public function mail()
    {
       /*$name = 'ilham';
       Mail::to('plato.ilham@gmail.com')->send(new RegisterMail($name));
       
       return 'Email was sent';

       return $this->view('backend.email.register-notification');*/
    }
}
