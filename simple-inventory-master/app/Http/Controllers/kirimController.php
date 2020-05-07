<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\DummyEmail;
use Illuminate\Support\Facades\Mail;

class kirimController extends Controller
{
    public function kirim(){
      Mail::to("testing@abyan.com")->send(new DummyEmail());

		  return "Email telah dikirim";
    }
}
