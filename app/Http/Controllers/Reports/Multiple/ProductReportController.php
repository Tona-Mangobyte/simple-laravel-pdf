<?php

namespace App\Http\Controllers\Reports\Multiple;

use App\Http\Controllers\CallReportsController;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ProductReportController extends BaseController
{
    public function multiple_product_reports(Request $request) {
        $call_reports_controller = new CallReportsController;
        $request->merge([
            'ids' => 'product',
        ]);

        $download = $request->input('download');
        if (!is_null($download)){
            $request->merge([
                'download' => $download,
            ]);
        }

        return $call_reports_controller->get_reports($request);
    }
}
