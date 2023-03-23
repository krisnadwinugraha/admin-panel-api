<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $blogs = Transaction::with('productId')->latest()->paginate(5);
        return response()->json($blogs);
    }

    public function search(Request $request)
    {
        $blogs = Transaction::with('productId')->where('name', 'like', '%' . $request->keywords . '%')
        ->orWhere('product_id', 'like', '%' . $request->keywords . '%')
        ->orWhere('status', 'like', '%' . $request->keywords . '%')
        ->orWhere('qty', 'like', '%' . $request->keywords . '%')->paginate(5);
        return response()->json($blogs); 
    }

    public function print_pdf()
    {
    	$transaction = Transaction::all();
 
    	$pdf = PDF::loadview('report',['transaction'=>$transaction]);
    	return $pdf->stream();
    }

    public function export_excel()
	{
		return Excel::download(new TransactionExport, 'report.xlsx');
	}
}

