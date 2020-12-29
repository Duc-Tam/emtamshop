<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\Order;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function index(){
        $transaction = Transaction::orderByDesc('id')->paginate(5);
        return view('admin.transaction.index',compact('transaction'));
    }
    public function delete($id){
        $transaction = Transaction::find($id);
        if($transaction){
            $transaction->delete();
            \DB::table('orders')->where('transaction_id',$id)->delete();
        }
        return redirect()->back()->with('success','Xóa đơn hàng thành công');
    }
    public function TransactionDetail(Request $request, $id){
        if($request->ajax()){
            $order = Order::where('transaction_id',$id)->get();
            $html = view('components.orders',compact('order'))->render();
            return response([
                'html' => $html
            ]);
        }
    }
    public function deleteOrder(){
        
    }
    public function getAction($action,$id){
        $transaction = Transaction::find($id);
        if($transaction){
            switch($action){
                case 'info';
                    $transaction->status = 2;
                    break;
                case 'success';
                    $transaction->status = 3;
                    break;
                case 'cancel';
                    $transaction->status = -1;
                    break;
            }
            $transaction->save();
        }
        return redirect()->back();
    }
}
