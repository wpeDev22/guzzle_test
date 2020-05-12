<?php

namespace App\Http\Controllers;
use App\Http\Resources\customer\Customer as CustomerResource;
use App\Http\Resources\customer\CustomerCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Customer;
use App\User;

class CustomerController extends Controller
{
   
    public function index()
    {
         return new CustomerCollection(Customer::all());

    }

    public function store(Request $request)
    {    
         
        $validator=Validator::make($request->all(),[
            "customer_address" => "required",
            "customer_phone" => "required",
            "customer_info" => "required", 
            "user_id" => "required",                
        ]);

        if($validator->fails()){
            return response()->json(['success'=>false,'data'=>'Customer  data  is required']);
        }
        else{

         
            $user_id=$request->user_id;
            $user=User::find($user_id);
            if(isset($user) && $user->id==$user_id)
                {
                    $customer=new Customer;
                    $customer->customer_address=request('customer_address');
                    $customer->customer_phone=request('customer_phone');
                    $customer->customer_info=request('customer_info');                  
                    $customer->user_id=$user_id;                              
                    $customer->save();                  
                    return response()->json(['success'=>true,'data'=>'Customer data is stored successfully']);
                }
            else{
                return response()->json(['success'=>true,'data'=>'Customer   not found to create item']);
            }
        }
    }

  
    public function show($id)
    {
        $customer=Customer::find($id);
        if($customer!=null){
            return response()->json(['success'=>true,'data' => new CustomerResource ($customer)]);
        }
        else{
            return response()->json(['success' => false, 'data' => 'Customer not found to show']);
        }
    }

    public function update(Request $request, $id)
    {   
          // dd($request->id);
        $customer=Customer::find($id);
     
        if(isset($customer)){
            if(isset($request->customer_address)){
                $customer->customer_address=request('customer_address');

            }   
            if(isset($request->customer_phone)){
                $customer->customer_phone=request('customer_phone');

            }   
            if(isset($request->customer_info)){
                $customer->customer_info=request('customer_info');

            }   
            if(isset($request->user_id)){
                $customer->user_id=request('user_id');

            }             
            $customer->update();
            return response()->json(['success'=>true, 'data'=>'Customer Updated Successfully']);
        }
        else{
            return response()->json(['success'=> false, 'data'=>'Customer   not found  to update']);
        }
    }


    public function destroy($id)
    {
        $customer=Customer::find($id);
        if(isset($customer)){           
            $customer->delete();            
            return response()->json(['success'=>true, 'data'=>'Customer Deleted Successfully']);
        }
        else{
            return response()->json(['success'=>false, 'data'=>'Not found Customer   to delete']);
        }
    }
 
}
