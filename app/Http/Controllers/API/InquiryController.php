<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\InquiryRequest;
use App\Repositories\InquiryRepository;

class InquiryController extends Controller
{

    protected $inquiryRepo;
    public function __construct(InquiryRepository $inquiryRepo)
    {
        $this->inquiryRepo = $inquiryRepo;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(InquiryRequest $request)
    {
        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->inquiryRepo->storeInquiry($validatedData);

            return response()->success($request, $data, 'Inquiry Created Sucessfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('hackthon_daily_error')->error('Error Create Inquiry' . $e->getMessage());

            return response()->error($request, null, $e->getMessage(), 500, $startTime);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
