<?php

namespace App\Http\Controllers;
use App\Http\Resources\user_info\UserInfo as UserInfoResource;
use App\Http\Resources\user_info\UserInfoCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\UserInfo;
use App\User;

class UserInfoController extends Controller
{
    public function index()
    {
       return new UserInfoCollection(UserInfo::all());
    
    }
   
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[        
           "user_type" => "required",  
           "user_phone" => "required",  
           "user_wechat" => "required",  
           "user_viber"  => "required",  
           "user_website"  => "required",  
           "user_id" => "required",  
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'data'=>'user infos data is required']);
        }

        else{ 

            $user_id=$request->user_id;
            $user=User::find($user_id);
            if(isset($user) && $user->id==$user_id)
            {
                $userinfo=UserInfo::create([
                    'user_type'=> request('user_type'),     
                    'user_phone'=> request('user_phone'),           
                    'user_wechat'=> request('user_wechat'),           
                    'user_viber'=> request('user_viber'),           
                    'user_website'=> request('user_website'),      
                    'user_id'=> $user_id,           
                    ]);
                    return response()->json(['success'=>true,'data'=>new UserInfoResource($userinfo)]);
            }
            else{
                return response()->json(['success'=>false,'data'=>'user not found  to store']);
            }
          
        }         

    }
    public function show($id)
    {
         $userinfo=UserInfo::find($id);
         if($userinfo!=null){
            return response()->json(['success'=>true,'data'=>new UserInfoResource($userinfo)]);
         }
         else{
             return response()->json(['success'=>true,'data'=>'user info not found to show']);
         }       

    }
    public function update(Request $request, $id)
    {   
        $userinfo=UserInfo::find($id);
        if(isset($userinfo)){
            if(isset($request->user_type)){
                $userinfo->user_type=request('user_type');

            }     
            if(isset($request->user_phone)){
                $userinfo->user_phone=request('user_phone');

            }     
            if(isset($request->user_wechat)){
                $userinfo->user_wechat=request('user_wechat');

            }     
            if(isset($request->user_viber)){
                $userinfo->user_viber=request('user_viber');

            }         
            if(isset($request->user_website)){
                $userinfo->user_website=request('user_website');

            }     
            if(isset($request->user_id)){
                $userinfo->user_id=request('user_id');
            }     

            $userinfo->update();
            return response()->json(['success'=>true, 'data'=>'User info Updated Successfully']);
        }
        else{
            return response()->json(['success'=> false, 'data'=>'User Info  not found  to update']);
        }
    }
    
    public function destroy($id)
    {
        $userinfo=UserInfo::find($id);
        if($userinfo!=null){
            $userinfo->delete();
            return response()->json(['success'=>true,'data'=>'User Info deleted successfully']);
        }
        else{
            return response()->json(['success'=>false,'data'=>'User Info cannot delete']);
        }
    }
}
