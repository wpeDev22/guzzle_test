<?php

namespace App\Http\Controllers;
use App\Http\Resources\city\City as CityResource;
use App\Http\Resources\city\CityCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\Auth;
class CityController extends Controller
{
  

    
    public function index()
    {
       return new CityCollection(City::all());
    
    }
   
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
           "city_name"=>"required",           
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'data'=>'city name is required']);
        }

        else{ 
            $city=City::create([
            'city_name'=> request('city_name'),                   
            ]);
            return response()->json(['success'=>true,'data'=>new CityResource($city)]);
        }         

    }
  
    public function show($id)
    {
         $city=City::find($id);
         if($city!=null){
            return response()->json(['success'=>true,'data'=>new CityResource($city)]);
         }
         else{
             return response()->json(['success'=>false,'data'=>'city not found to show']);
         }
         

    }

    public function update(Request $request, $id)
    {   
        
        $validator = Validator::make($request->all(),[
             "city_name"=>"required",     
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'data'=>'city name not found to update']);
        }

        else{      
            $city=City::find($id); 
            if($city!=null){
                $city->city_name=request('city_name'); 
                    
                $city->save();        
                return response()->json(['success'=>true,'data'=>new CityResource($city)]);
            }
            else{
                return response()->json(['success'=>false,'data'=>'city name not found to update']);
            }              
        }
    }
    
    public function destroy($id)
    {
        $city=City::find($id);
        if($city!=null){
            $city->delete();
            return response()->json(['success'=>true,'data'=>'city deleted successfully!']);
        }
        else{
            return response()->json(['success'=>false,'data'=> 'city not found to delete']);
        }
    }
}
