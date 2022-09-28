<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{

    public function create_user(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;
        $users = User::where('isDelete', '=', 0)->orderBy('name',"ASC")->get();
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
            // For Generate User code start
            $curr_year = Carbon::now()->format('y');
            $curr_month = Carbon::now()->format('m');
            
            $data = User::latest('id')->first();
            $pre_user_id = $data->id;
            $curr_user_id = $pre_user_id+1;

            $user_str = str_pad($curr_user_id, 3, '0', STR_PAD_LEFT);
            $user_code = $curr_year.$curr_month.$user_str;
            // For Generate User code end

            $validated = $request->validate([
                'type' => ['required'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = new User;
            $user->user_code = $user_code;
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
        else if($request->mode === 'change_user_photo')
    	{
            // dd($request);
            $validated = $request->validate([
                    'image_path' => ['required'],
                ],
                [ 'image_path.required' => 'Please Choose Image first..!!']
            );

            $user_id = $request->user_id;
            $user = User::find($user_id);
            
           
            if($request->image_path!=null && $request->image_path!="null")
            {
                $imageName = $request->name.'_'.time().'.'.$request->image_path->extension();
                // move Public Folder
                $request->image_path->move(public_path('images/user'), $imageName);
                // dd($imageName);

                $user->image_path = $imageName;
            }
            else
            {
                $user->image_path = "";
            }

            $user->save();
            if($user){
                return redirect()->route('view_user_profile');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'remove_user_photo')
    	{
            // dd($request);

            $user_id = $request->user_id;
            $user = User::find($user_id);
            
            $user->image_path = "";

            $user->save();
            if($user){
                return redirect()->route('view_user_profile');
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
    public function change_password_from_user_profile(Request $request){
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
                return redirect()->route('view_user_profile');
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
