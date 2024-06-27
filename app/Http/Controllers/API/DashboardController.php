<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryListResource;

class DashboardController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
    public function dashboardList()
    {
        try {
            $startTime = microtime(true);

            $data = $this->service->getCategory();

            $result = CategoryListResource::collection($data);

            return response()->success(request(), $result, 'Category Retrieve Sucessfully.', 200, $startTime, count($data));
        } catch (Exception $e) {

            Log::channel('hackathon_daily_error')->error('Error Category Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        };
    }
}
