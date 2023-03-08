<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $blogs = Transaction::with('productId')->latest()->paginate(5);
        return response()->json($blogs);
    }

    public function store(Request $request)
    {
        $transaction = Transaction::create($request->post());
        return response()->json([
            'message'=>'Transaction Created Successfully!!',
            'transaction'=>$transaction
        ]);
    }

    public function show(Transaction $transaction)
    {
        return response()->json($transaction);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->fill($request->post())->save();
        return response()->json([
            'message'=>'Transaction Updated Successfully!!',
            'transaction'=>$transaction
        ]);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return response()->json([
            'message'=>'Transaction Deleted Successfully!!'
        ]);
    }
    
    public function search(Request $request)
    {
        $blogs = Transaction::with('productId')->where('nama', 'like', '%' . $request->keywords . '%')
        ->orWhere('product_id', 'like', '%' . $request->keywords . '%')
        ->orWhere('status', 'like', '%' . $request->keywords . '%')
        ->orWhere('qty', 'like', '%' . $request->keywords . '%')->paginate(5);
        return response()->json($blogs); 
    }
}
