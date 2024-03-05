<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\contact;
use App\Models\food;
use App\Models\FoodChef;
use App\Models\order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homecontroller extends Controller
{
    
    public function index()
{
    if(Auth::id())
    {

        if(Auth::user()->name == 'admin')
        {
            return view('admin.adminhome');
        }
        else
        {
            $fooddb = food::all()->unique('debartment');
            $food = food::all();
        
            $chefs = FoodChef::all();
            $user_id = Auth::id();
            $count = Cart::where('user_id',$user_id)->count();
        
            return view('home',compact('food','chefs','count','fooddb'));
        }
        
    }
    else
    {
        $fooddb = food::all()->unique('debartment');
        $food = food::all();
    
    $chefs = FoodChef::all();
    $user_id = Auth::id();
    $count = Cart::where('user_id',$user_id)->count();
    
        return view('home',compact('food','chefs','count','fooddb'));
    }
}
    public function contactadmin(Request $request ,$id)
    {
        
       $contact = new contact();
       $contact->massage = $request->massage;
       
       $contact->sender = $request->sender;
       $contact->user_id = Auth::id();
       $contact->admin_id = $request->admin_id;
       $contact->save();
       return redirect()->back();
    }
    public function showadmin()
    {
        $user_id = Auth::id();
        $show_massages = contact::where('user_id',$user_id)->get();
        $admin = User::where('usertype','1')->get();
        $count_string = strlen($show_massages);
        $count = Cart::where('user_id',$user_id)->count();
        $fooddb = food::all()->unique('debartment');
        $offer = food::where('offer','yes')->get();
        $food = food::all();
        $chefs = FoodChef::all();
        $single = food::where('shareorsingleordouble','single')->get();
        $user_data = contact::where('user_id',$user_id)->join('users', 'contacts.user_id' , '=' , 'users.id')->get();
        return view('showadmin',compact('user_data','count_string','single','offer','show_massages','chefs','fooddb','count','admin','food','user_id'));
        
    }
    public function single()
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $fooddb = food::all()->unique('debartment');
        $offer = food::where('offer','yes')->get();
        $chefs = FoodChef::all();
        $single = food::where('shareorsingleordouble','single')->get();
        return view('single_page',compact('single','offer','chefs','fooddb','count'));
    }
    public function contact()
    {
       return view("contact");
    }
    public function double()
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $fooddb = food::all()->unique('debartment');
        $offer = food::where('offer','yes')->get();
        $chefs = FoodChef::all();
        $double = food::where('shareorsingleordouble','double')->get();
        return view('double_page',compact('double','offer','chefs','fooddb','count'));
    }
    public function share()
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $fooddb = food::all()->unique('debartment');
        $offer = food::where('offer','yes')->get();
        $chefs = FoodChef::all();
        $share = food::where('shareorsingleordouble','share')->get();
        return view('share_page',compact('share','offer','chefs','fooddb','count'));
    }
    public function offer()
    {
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        $food = food::all()->unique('debartment');
        $offer = food::where('offer','yes')->get();
        $chefs = FoodChef::all();
        return view('offer_page',compact('offer','chefs','food','count'));
    }
    public function choice_chef(Request $request)
    {
        $food = food::all()->unique('debartment');
        
        $chefs = FoodChef::all();
        $chef_food = food::where('chef',$request->chef_selected)->get();
        $user_id = Auth::id();
        $count = Cart::where('user_id',$user_id)->count();
        return view("selectcheffood",compact('chef_food','count','food','chefs'));
    }
public function choice_debartment(Request $request)
{
    
    $req=$request->user_selected;
    $user_id = Auth::id();
    $count = Cart::where('user_id',$user_id)->count();
    $fooddb = food::all()->unique('debartment');
    $food = food::where('debartment',$req)->get();
    $chefs = FoodChef::all();
    return view('debartment',compact('fooddb','count','chefs','food')); 
}
    public function debartment()
    {
       
        return view('debartment');
    }
    public function orderconfirm(Request $request)
    {
        foreach($request->foodname as $key =>$foodname)
        {
            $data = new order;
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name[$key];
            $data->address = $request->address;
            $data->phone = $request->phone;
            $data->save();
        
        }
        return redirect()->back();
    }
    

    public function showcart(Request $request , $id)
    {
        $req=$request->user_selected;
        $food = food::where('debartment',$req)->get();
        $user_id = Auth::id();
        $fooddb = food::all()->unique('debartment');
        $offer = food::where('offer','yes')->get();
        $chefs = FoodChef::all();
        $count = Cart::where('user_id',$id)->count();
        $data = Cart::where('user_id',$id)->join('food' , 'carts.food_id' , '=' , 'food.id')->get();
        $datauser = Cart::where('user_id',$id)->join('users' , 'carts.user_id' , '=' , 'users.id')->get();
        return view('showcart' , compact('count' , 'data' , 'datauser','fooddb','chefs','offer','food'));
    }
    public function userdeletcart($id)
    {
        $cart = Cart::where('food_id',$id);
        $cart->delete();
        return redirect()->back();
    }
    public function Addcart(Request $request , $id)
    {
       if(Auth::id())
       {
        $cart =  new Cart();
        $user_id = Auth::id();
        $cart->user_id = $user_id;
        $cart->food_id = $id;
        $cart->quantity = $request->quantity;
        $cart->save();
           return redirect()->back();
       }
       else
       {
           return redirect("/login");
       }
    }
    
    public function redirects()
    {
        $usertype = Auth::user()->usertype;
        if($usertype==1)
        {
            return view('admin.adminhome');
        }
        else
        {
            
            
        $fooddb = food::all()->unique('debartment');
        $food = food::all();
        $user_id = Auth::id();
        $chefs = FoodChef::all();
        $count = Cart::where('user_id',$user_id)->count();
        return view('home',compact('food','chefs','count','fooddb'));
        }
    }
}

