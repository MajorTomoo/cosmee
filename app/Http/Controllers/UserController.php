<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller {
    
    public function getDashboard(){
        
        return view('dashboard');
    }
   public function postSignup(Request $request){
       $this->validate($request,[
           'email'=>'email|unique:users',
           'password'=>'required|min:6',
           'verifypassword'=>'required',
           'name'=>'required'
       ]);
       $email=$request['email'];
       $password=bcrypt($request['password']);
       $name=$request['name'];
       $user=new User();
       $user->email=$email;
       $user->password=$password;
       $user->name=$name;
       $user->save();
       
       return redirect()->route('dashboard');
   } 
   public function postSignin(Request $request){
       $this->validate($request,[
           'email'=>'required',
           'password'=>'required',
           
       ]);   
       if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
           
           return redirect()->route('home');
           
       }
      return redirect()->back()->with('message','Your email or password is not correct');
       
   }    
    public function getLogOut(){
        
       Auth::logout();
       return redirect()->route('home');
        
    }
    
}
