<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Report View
     */
    public function reportView(){
        return view('backend.report.report_view');
    }

    /**
     * Search By Date
     */
    public function searchByDate(Request $request){
        $date = new DateTime($request->date);
        $date_format = $date->format('d F Y');
        $orders = Order::where('order_date', $date_format)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    }

    /**
     * Search By Month
     */
    public function searchByMonth(Request $request){
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    }

    /**
     * Search By Year
     */
    public function searchByYear(Request $request){
        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    }
}
