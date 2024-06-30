<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Exports\CategoryExport;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\CategoryListResource;

class DashboardController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
        $this->middleware('permission:dashboardList', ['only' => 'dashboardList']);
        $this->middleware('permission:getCategoryCsv', ['only' => 'getCategoryCsv']);
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

    public function getCategoryCsv()
    {
        try {
            $startTime = microtime(true);

            $data = $this->service->getCategory();

            $result = CategoryListResource::collection($data);
            return Excel::download(new CategoryExport($result), 'Category.csv',  \Maatwebsite\Excel\Excel::CSV);
            return response()->success(request(), $result, 'Category Retrieve Sucessfully.', 200, $startTime, count($data));
        } catch (Exception $e) {

            Log::channel('hackathon_daily_error')->error('Error Category Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        };
    }
}
