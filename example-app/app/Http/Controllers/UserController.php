<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\user_info;
use App\Models\users_login;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Register(Request $req){

        $Email = $req->input('Email');
        $Phone = $req->input('Phone');
        $password = $req->input('password');

       


       $check = users_login::where(['email'=>$Email ])->count();
      

     

        if($check==0){
            $result =  users_login::insert([

                'email' => $Email,
                'phone' => $Phone,
                'password' => $password,
                
              
            ]);

           
 return json_encode(array('isLogin'=>true,'user_email'=>$Email));

    
        }else{
            return json_encode(array('isLogin'=>false,'check'=> $check));

        }

        
    }

    public function LogIn(Request $req){

        $Email = $req->input('Email');
        $password = $req->input('password');
    

        $check = users_login::where(['email'=>$Email,'password'=>$password ])->count();

        if($check==1){
            return json_encode(array('isLogin'=>true,'user_email'=> $Email));
        }else{
            return json_encode(array('isLogin'=>false)); 
        }



    }

    public function UploadData(Request $req){

        $UserEmail = $req->input('UserEmail');
        $firstName = $req->input('firstName');
        $lastName = $req->input('lastName');
        $address = $req->input('address');
        $haveImage = $req->input('haveImage');
       
     $CheckEm =    users_login::where(['email'=>$UserEmail])->get('id');
    
    
  if($CheckEm[0]['id']){
    if($haveImage==1){
   $img_url =    user_info::where(['loging_id'=>$CheckEm[0]['id']])->get('img_url');

    $ImgDel = explode('/',$img_url[0]['img_url'])[4];

    Storage::delete('images/'.$ImgDel);

   
        $image = $req->file('image')->store('images');
        $ImgPath = explode('/',$image)[1];
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://" . $_SERVER['HTTP_HOST'];
        $ImgUrl =  $link.'/storage/'.$ImgPath;
        
  
    $result =  user_info::where(['loging_id'=>$CheckEm[0]['id']])->update([
      
        'fname' => $firstName,
        'lname' => $lastName,
        'address' => $address,
        'img_url' => $ImgUrl,
        
      
    ]);

    if($result){
        return json_encode(array('isInsert'=>true)); 
    }else{
        return json_encode(array('isInsert'=>false));
    }
    }else{
        $result =  user_info::where(['loging_id'=>$CheckEm[0]['id']])->update([
      
            'fname' => $firstName,
            'lname' => $lastName,
            'address' => $address,           
          
        ]);
        if($result){
            return json_encode(array('isInsert'=>true)); 
        }else{
            return json_encode(array('isInsert'=>false));
        }
    }

  


  }else{
    if($haveImage==1){
        $image = $req->file('image')->store('images');
        $ImgPath = explode('/',$image)[1];
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://" . $_SERVER['HTTP_HOST'];
        $ImgUrl =  $link.'/storage/'.$ImgPath;
        
    }
       $result =  user_info::insert([

            'loging_id' => $CheckEm[0]['id'],
            'fname' => $firstName,
            'lname' => $lastName,
            'address' => $address,
            'img_url' => $ImgUrl,
            
          
        ]);

        if($result){
            return json_encode(array('isInsert'=>true)); 
        }else{
            return json_encode(array('isInsert'=>false));
        }

  }
       

      

    }


    public function getData(Request $req){

        $email =  $req->input('email');

        $result = DB::table('users_login')
        ->join('user_info', 'users_login.id', '=', 'user_info.loging_id')
        ->select('users_login.*', 'user_info.fname', 'user_info.lname','user_info.address','user_info.img_url')
        ->where('users_login.email','=',$email)
        ->get();
       
        return $result;

    }
}
