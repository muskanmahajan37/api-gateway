<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        Mail::to('hello@example.org')->send(new Welcome());
    }
}
