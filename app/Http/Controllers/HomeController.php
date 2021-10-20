<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Order;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function home(Request $request){
        $result=Order::with('user')->where('status', 1)->orderBy('id', 'DESC')->get();
        //return $result;
        
        return view('home', compact('result'));
    }
    public function authentication(){
        return view('authentication');
    }

    public function register(Request $reqeust){
        $user=User::create([
            'mobile'=>$reqeust->mobile,
            'password'=>$reqeust->password
        ]);
        $user_id=$user->id;
        return redirect()->route('home', ['user_id'=>$user_id]);
    }

    public function login(Request $request){
        $user=User::where('mobile', $request->mobile)->where('password', $request->password)->first();
        if($user != null){
            Cookie::queue('user_id', $user->id, 60 * 60 * 24 * 365);
            return redirect()->route('home');
        }
    }

    public function detail($id, $type){
        $result=Order::find($id);
        if(Str::contains($result, 'باغ'))
            $relatedOrder=Order::all()->where('type', $type)->where('description', 'باغ')->where('status', 1)->except($id);
        else
            $relatedOrder=Order::all()->where('type', $type)->where('status', 1)->except($id);
        return view('detail', compact('result', 'relatedOrder'));
    }
    public function list($type){
        if($type==1)
            $result=Order::where('description', 'not LIKE', "%باغ%")->where('status', 1)->paginate(16);

        else
            $result=Order::where('description', 'LIKE', "%باغ%")->where('status', 1)->paginate(16);
        return view('list', compact('result'));
    }

    public function advertise($user_id){
         $result=Order::where('user_id', $user_id)->where('status', 1)->paginate(16);
         return view('advertise', compact('result'));
    }

    public function about(){
        return view('about');
    }


}
