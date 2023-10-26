<?php

namespace App\Http\Controllers;


use App\Mail\DuyetMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Testsendmail extends Controller
{
    //
    function sendMails(){
        
        $data = [
            'key' => 'value'
        ];
        Mail::to('giangvanduyet@gmail.com')->send(new DuyetMail($data));
    }
}
