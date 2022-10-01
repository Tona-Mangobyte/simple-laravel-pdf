<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CallReportsController extends Controller
{

    public static $controllers = [
        'product' => 'ProductReportController'
    ];

    public $templates = [
        'product' => 'product2'
    ];


    public function get_reports(Request $request) {
        $ids = explode(',', $request->input('ids'));
        $pdf_reports = [];
        try {
            foreach ($ids as $id) {
                $called = app()->make('App\Http\Controllers\Reports\\'.CallReportsController::$controllers[$id]);
                $func = array($called, "{$id}_reports");
                $report = $func($request);

                //pdf
                if(!empty($report)){
                    $report = array_merge($report, array('id' => $id));
                    $pdf_reports[] = $report;
                }
            }

            return $pdf_reports;
        } catch (\Exception $e) {
            Log::error("export pdf error: ". $e->getMessage());
        }
    }
}
