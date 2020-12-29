<?php

namespace App\Http\Controllers;
use App\User;
use App\Transaction;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests\RequestRegister;
use App\Http\Requests\RequestLogin;
use App\Http\Requests\RequestPayment;
use Illuminate\Support\Facades\Auth;
use App\Mail\TransactionSuccess;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller
{
    private $user;
    private $transaction;
    private $order;
    public function __construct(User $user,Transaction $transaction, Order $order){
        $this->user = $user;
        $this->transaction = $transaction;
        $this->order = $order;
    }
    public function getFormLogin(){
        return view('frontend.login.login');
    }
    public function postFormLogin(RequestLogin $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đăng nhập thành công'
            ]);
            return redirect()->intended('/');
        }
        return redirect()->back();
    }
    public function postFormRegister(RequestRegister $request){
        $data = [
            'email'      => $request->email,
            'name'       => $request->name,
            'password'   => bcrypt($request->password),
            'phone'      => $request->phone,
        ];
        $user = $this->user->create($data);
        return redirect()->route('account.login')->with('success','Đăng ký thành công, vui lòng đăng nhập');
    }
    public function getLogout(){
        Auth::logout();
        session()->forget('cart');
        return redirect()->to('/');
    }
    public function checkout(){
        $carts = session()->get('cart');
        return view ('layouts.checkout',compact('carts'));
    }
    public function postPay(RequestPayment $request){
        if(isset(Auth::user()->id)){
            $data['user_id'] = Auth::user()->id;
        }
        $data = [
            'user_id'        => Auth::user()->id ?? '0',
            'total_money'    => $request->total_money,
            'email'          => $request->email,
            'name'           => $request->name,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'notes'          => $request->notes,
        ];
        $transaction = $this->transaction->create($data);
        $tranID = $transaction->id;
        $tranDate = $transaction->created_at;
        $carts = session()->get('cart');
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        if($tranID){
            $carts = session()->get('cart');
            Mail::to($request->email,'Shop Em Tâm')->send(new TransactionSuccess($carts,$name,$phone,$address,$tranID,$tranDate));
            foreach ($carts as $id => $item){
                $this->order->create([
                    'transaction_id'   => $tranID,
                    'product_id'       => $id,
                    'quantity'         => $item['quantity'],
                    'price'            => $item['price'],
                ]);
            }
        }
        // session()->flush();
        session()->forget('cart');
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Đơn hàng đã được xác nhận.'
        ]);
        return redirect()->to('/');
    }
    public function index(){
        return view ('frontend.account.index');
    }
    public function infoTransaction(){
        $transaction = Transaction::where('user_id',Auth::user()->id)->get();
        return view ('frontend.account.info-transaction',compact('transaction'));
    }
    public function DetailTransaction($id){
        $transaction = Transaction::find($id);
        $order = Order::where('transaction_id',$id)->get();
        return view ('frontend.account.transaction-detail',compact('order','transaction'));
    }
    public function cancelTransaction($id){
        $transaction = Transaction::find($id);
        if($transaction->status == 1){
            $transaction->status = -1;
            $transaction->save();
            \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đơn hàng đã được hủy.'
            ]);
        }
        return redirect()->back();
    }
}
