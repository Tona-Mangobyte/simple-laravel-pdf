<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ProductReportController extends BaseController
{
    public function product_reports(Request $request) {
        $header_csv = [
            'no' => "No",
        ];

        $csv_data = [
            'no' => 1
        ];

        return array('header_csv' => $header_csv, 'data_csv' => $csv_data);
    }
}
