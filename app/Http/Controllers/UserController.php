<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create_user(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;
        $users = User::where('isDelete', '=', 0)->get();
        return view('pages.User.CreateUser')->with(['mode'=>"add",'current_user'=>$current_user,'users'=>$users]);
    }
    public function edit_user($id){

        $user = User::find($id);
        $current_user = Auth::user()->name;
        return view('pages.User.CreateUser')->with(['mode'=>"edit",'user'=>$user,'current_user'=>$current_user]);
    }
    

    public function store_user_data(Request $request)
    {
        // dd($request);
        
        if($request->mode === 'add')
        {
            $validated = $request->validate([
                'type' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = new User;
            $user->type = $request->type;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            if($request->image_path!=null && $request->image_path!="null")
            {
                $imageName = $request->name.'_'.time().'.'.$request->image_path->extension();
                // move Public Folder
                $request->image_path->move(public_path('images/user'), $imageName);
                $user->image_path = $imageName;
            }

            //Remaining attributes
            $user->save();

            if($user){
                return redirect()->route('view_all_users');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            $validated = $request->validate([
                'type' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user_id = $request->user_id;
            $user = User::find($user_id);
            
            //$user->password = Hash::make($request->password);
            $user->type = $request->type;
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->image_path!=null && $request->image_path!="null")
            {
                $imageName = $request->name.'_'.time().'.'.$request->image_path->extension();
                // move Public Folder
                $request->image_path->move(public_path('images/user'), $imageName);
                $user->image_path = $imageName;
            }

            $user->save();
            if($user){
                return redirect()->route('view_all_users');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
    public function delete_user($id){
        $user = User::find($id);

        $user->isDelete = 1;

        $user->save();
        if($user){
            // return response()->json('success',200);
            return redirect()->route('view_all_users');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }

    public function change_password_user_data(Request $request){
        // dd($request->all());
        // dd($request->image_path);
        $user_id = $request->user_id;

        $validated = $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);


        if($validated){
            $user = User::find($user_id);

            $user->password = Hash::make($request->password);
    
            //Remaining attributes
            $user->save();
            if($user){
                return redirect()->route('view_all_users');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }   
        }
        else{
            $errors = $validated->errors();
            Session('message',$errors);
        }   
    }
    
}
