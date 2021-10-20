<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;

class PanelController extends Controller
{
    public function dashboard(){
        $users=User::all();
        return view('panel.dashboard', compact('users'));
    } 

    public function orders(){
        $orders=Order::all();
        return view('panel.orders', compact('orders'));
    }

    public function delete(Request $request){
        $status=Order::find($request->order_id)->delete();
        return redirect()->route('orders');

    }

    public function checked(Request $request){
        $status=Order::find($request->order_id)->update([
            'status'=>1
        ]);
        return $status;
    }

    public function unChecked(Request $request){
        $status=Order::find($request->order_id)->update([
            'status'=>0
        ]);
        return $status;
    }

    public function users(){
         $users=user::all();
         return view('panel.users', compact('users'));
    }


    public function showRegisterAdvertisementForm(){
        return view('panel.showRegisterAdvertisementForm');
    }
    public function registerAdvertisement(Request $request){
        
        $result=getCount($request->order, '=');
        $order=str_replace("=", "", $request->order);
        $orderResult=Order::create([
            'user_id'=>$request->cookie('user_id'),
            'type'=>$result[0],
            'description'=>$order,
            'price'=>$result[1]
        ]);
        $imageName = $orderResult->id .'.'.$request->file->extension();  
        $request->file->move(public_path('uploads'), $imageName);
        
        return view('panel.showRegisterAdvertisementForm');
    }
}



function getCount($str, $mode){
    $length = strlen($str);
    $sublength = strlen(str_replace($mode, "", $str));
    $sub = $length - $sublength;
    for($i=0; $i < $sub/2; $i++){
        $pos = strpos($str, $mode);
        $tex = substr($str, $pos + 1);
        $pos = strpos($tex, $mode);
        $res = substr($tex, 0, $pos);
        $array[$i] = $res;
        $str = substr($tex, $pos + 1);  
    }
    return $array;
}