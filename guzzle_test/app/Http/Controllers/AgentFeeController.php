<?php

namespace App\Http\Controllers;
use App\Http\Resources\agent_fee\AgentFee as AgentFeeResource;
use App\Http\Resources\agent_fee\AgentFeeCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\AgentFee;
class AgentFeeController  extends Controller
{
    
    public function index()
    {
       return new AgentFeeCollection(AgentFee::all());
    
    }
   
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(),[
           "fees"=>"required",    
           "type" => "required",     
           "user_id" =>"required"
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success'=>false,'data'=>' data is required']);
        }

        else{ 
            $agent_fee=AgentFee::create([
            'fees'=> request('fees'),     
            'type'=> request('type'),   
            'user_id' => request('user_id'),              
            ]);
            return response()->json(['success'=>true,'data'=>new AgentFeeResource($agent_fee)]);
        }         

    }

  
    public function show($id)
    {
         $agent_fee=AgentFee::find($id);
         if($agent_fee!=null){
            return response()->json(['success'=>true,'data'=>new AgentFeeResource($agent_fee)]);
         }
         else{
             return response()->json(['success'=>true,'data'=>'Agent Fee not found to show']);
         }
         

    }

    public function update(Request $request, $id)
    {   
        
      
        $agent_fee=AgentFee::find($id);
     
        if(isset($agent_fee)){
            if(isset($request->fees)){
                $agent_fee->fees=request('fees');

            }   
            if(isset($request->type)){
                $agent_fee->type=request('type');

            }   
            if(isset($request->user_id)){
                $agent_fee->user_id=request('user_id');

            }   
            
            $agent_fee->update();
            return response()->json(['success'=>true, 'data'=>'Agent Fee Updated Successfully']);
        }
        else{
            return response()->json(['success'=> false, 'data'=>'Agent Fee  not found  to update']);
        }

    }
    
    public function destroy($id)
    {
        $agent_fee=AgentFee::find($id);
        if($agent_fee!=null){
            $agent_fee->delete();
            return response()->json(['success'=>true,'data'=>'Agent Fee deleted successfully']);
        }
        else{
            return response()->json(['success'=>false,'data'=>'Agent Fee not found to delete']);
        }
    }
   
}
