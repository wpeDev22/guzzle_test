<?php

namespace App\Http\Controllers;
use App\Http\Resources\township\Township as TownshipResource;
use App\Http\Resources\township\TownshipCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Township;

class TownshipController extends Controller
{
    public function index()
    {
       return new TownshipCollection(Township::all());
    
    }
   
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
           "township_name"=>"required",    
           "cities_id" => "required",       
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'data'=>'township name
            and cities_id is required ']);
        }

        else{ 
            $township=Township::create([
            'township_name'=> request('township_name'),     
            'cities_id'=> request('cities_id'),                 
            ]);
            return response()->json(['success'=>true,'data'=>new TownshipResource($township)]);
        }         

    }

  
    public function show($id)
    {
         $township=Township::find($id);
         if($township!=null){
            return response()->json(['success'=>true,'data'=>new TownshipResource($township)]);
         }
         else{
             return response()->json(['success'=>true,'data'=>'Township not found to show']);
         }
         

    }

    public function update(Request $request, $id)
    {   
        
        // $validator = Validator::make($request->all(),[
        //      "township_name"=>"required",     
        // ]);
        
        // if ($validator->fails()) {
        //     return response()->json(['success'=>false,'data'=>'township name is required']);
        // }

        // else{      
        //     $township=Township::find($id); 
        //     if($township!=null){
        //         $township->township_name=request('township_name'); 
        //         $township->save();        
        //         return response()->json(['success'=>true,'data'=>'township updated successfully']);
        //     }
        //     else{
        //         return response()->json(['success'=>false,'data'=>'township not found to update']);
        //     }  
            
        // }
        $township=Township::find($id);
     
        if(isset($township)){
            if(isset($request->township_name)){
                $township->township_name=request('township_name');

            }   
            if(isset($request->cities_id)){
                $township->cities_id=request('cities_id');

            }   
            
            $township->update();
            return response()->json(['success'=>true, 'data'=>'Township Updated Successfully']);
        }
        else{
            return response()->json(['success'=> false, 'data'=>'Township  not found  to update']);
        }

    }
    
    public function destroy($id)
    {
        $township=Township::find($id);
        if($township!=null){
            $township->delete();
            return response()->json(['success'=>true,'data'=>'township deleted successfully']);
        }
        else{
            return response()->json(['success'=>false,'data'=>'township not found to delete']);
        }
    }
    public function getTownshipByCityId($id)
    {
        $townships=Township::where('cities_id',$id)->get();
        return new TownshipCollection($townships);
    }
}
