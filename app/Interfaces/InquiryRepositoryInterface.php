<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface InquiryRepositoryInterface
{
    public function storeInquiry(Request $request);
}
