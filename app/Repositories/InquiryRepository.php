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
    Mail::to('inquiry@mail.test')->send(new InquiryMail($inquiry));
    return $inquiry;
  }
}
