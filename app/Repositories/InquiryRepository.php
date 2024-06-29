<?php

namespace App\Repositories;

use App\Models\Inquiry;
use App\Mail\InquiryMail;
use Illuminate\Support\Facades\Mail;
use App\Interfaces\InquiryRepositoryInterface;

class  InquiryRepository implements InquiryRepositoryInterface
{

  public function storeInquiry($data)
  {

    $inquiry = Inquiry::create($data);
    // inquiry@mail.test
    // $mail = [
    //   'title' =>  $inquiry->title,

    // ];

    Mail::to('thethhsan@gmail.com')->send(new InquiryMail([
      'title' => $inquiry->title,
      'email' => $inquiry->email,
      'description' => $inquiry->description
    ]));
    return $inquiry;
  }
}
