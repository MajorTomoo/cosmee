<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
class User extends Model implements Authenticatable, \Illuminate\Contracts\Auth\CanResetPassword
{
    use \Illuminate\Auth\Authenticatable;
    use Notifiable;
    use CanResetPassword;
    public function roles(){
        
       return $this->belongsToMany('Laravel\Role','user_role','user_id','role_id');
        
    }
    public function address(){
        return $this->hasMany('Laravel\Address');

    }
    public function orders(){

        return $this->hasMany('Laravel\Order');

    }
    public function hasAnyRole($roles){
        
       if(is_array($roles)){
          foreach($roles as $role){
              
           if($this->hasRole($role)){
               
               return true;
           }   
              
          }         
       } 
        else{
          if($this->hasRole($roles)){
              
              return true;
          }  
            
        }
        return false;
    }
  public function hasRole($role){
      
     if($this->roles->where('name',$role)->first()){
         
         return true;
     }
     return false;
  }  
    
}
