<?php

namespace App\Repositories;

use App\Interfaces\InquiryRepositoryInterface;
use App\Models\Inquiry;

class  InquiryRepository implements InquiryRepositoryInterface
{

  public function storeInquiry($data)
  {

    $inquiry = Inquiry::create($data);
    // inquiry@mail.test
    return $inquiry;
  }
}
