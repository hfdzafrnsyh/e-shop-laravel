<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //

    public function index(){
        $transaction = Transaction::paginate(7);
        return view('transaction.index' , ['transaction' => $transaction]);
    }


    public function delete($transaction){
        Transaction::destroy($transaction);
        return redirect('/transaction')->with('success' , 'Transaction berhasil di hapus');
    }
}
