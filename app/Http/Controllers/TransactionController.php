<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('productId')->latest()->paginate(5);
        return response()->json($transactions);
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
        $transactions = Transaction::with('productId')->where('name', 'like', '%' . $request->keywords . '%')
        ->orWhere('product_id', 'like', '%' . $request->keywords . '%')
        ->orWhere('status', 'like', '%' . $request->keywords . '%')
        ->orWhere('qty', 'like', '%' . $request->keywords . '%')->paginate(5);
        return response()->json($transactions); 
    }

    public function filter(Request $request)
    {
        $transactions = Transaction::with('productId')
        ->orWhere('product_id', 'like', '%' . $request->filters . '%')
        ->paginate(5);
        return response()->json($transactions); 
    }

    public function getAllTransactions()
    {
        $transactions = Transaction::with('productId')->get();
        return response()->json($transactions);
    }

    public function getTotalPrice()
    {
        $total = Transaction::select('products.name', 'products.id as product_id','products.price','transactions.qty', 'transactions.created_at','transactions.id as id') 
            ->whereBetween('transactions.created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->join('products', 'products.id', '=', 'transactions.product_id')
            ->sum(DB::raw('products.price * transactions.qty'));

        return response()->json($total);
    }

    public function getTotalPriceLastYear()
    {
        $total = Transaction::select('products.name', 'products.id as product_id','products.price','transactions.qty', 'transactions.created_at','transactions.id as id') 
            ->whereBetween('transactions.created_at', [
                Carbon::now()->subYear()->startOfYear(),
                Carbon::now()->subYear()->endOfYear(),
            ])
            ->join('products', 'products.id', '=', 'transactions.product_id')
            ->sum(DB::raw('products.price * transactions.qty'));

        return response()->json($total);
    }
}