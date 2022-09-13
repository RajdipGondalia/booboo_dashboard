<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientMaster;
use App\Models\ClientCategoryMaster;
use App\Models\User;

class ClientController extends Controller
{

    public function create_client(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        $clients = ClientMaster::where('isDelete', '=', 0)->orderBy('id',"DESC")->get();
        $users = User::where('isDelete', '=', 0)->get();
        $client_categories = ClientCategoryMaster::where('isDelete', '=', 0)->get();
        return view('pages.Client.CreateClient')->with(['mode'=>"add",'current_user'=>$current_user,'clients'=>$clients,'client_categories'=>$client_categories,'users'=>$users]);
    }
    public function edit_client($id){

        $client = ClientMaster::find($id);
        $current_user = Auth::user()->name;

        $users = User::where('isDelete', '=', 0)->get();
        $client_categories = ClientCategoryMaster::where('isDelete', '=', 0)->get();
        return view('pages.Client.CreateClient')->with(['mode'=>"edit",'client'=>$client,'current_user'=>$current_user,'client_categories'=>$client_categories,'users'=>$users]);
    }
    
    public function store_client_data(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'client_category_id' => 'required',
        ]);
        if($request->mode === 'add')
        {
            $client_master = new ClientMaster;
            $client_master->company_name = $request->company_name;
            $client_master->first_name = $request->first_name;
            $client_master->last_name = $request->last_name;
            $client_master->email = $request->email;
            $client_master->address = $request->address;
            $client_master->client_category_id = $request->client_category_id;
            $client_master->user_id = auth()->user()->id;

            //Remaining attributes
            $client_master->save();

            if($client_master){
                return redirect()->route('view_all_clients');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            $client_id = $request->client_id;
            $client_master = ClientMaster::find($client_id);

            $client_master->company_name = $request->company_name;
            $client_master->first_name = $request->first_name;
            $client_master->last_name = $request->last_name;
            $client_master->email = $request->email;
            $client_master->address = $request->address;
            $client_master->client_category_id = $request->client_category_id;

            $client_master->save();

            if($client_master){
                return redirect()->route('view_all_clients');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
    public function delete_client($id){
        $ClientMaster = ClientMaster::find($id);

        $ClientMaster->isDelete = 1;

        $ClientMaster->save();
        if($ClientMaster){
            // return response()->json('success',200);
            return redirect()->route('view_all_clients');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    
}
