<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Report View
     */
    public function reportView(){
        return view('backend.report.report_view');
    }
}