<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ImportantNote;

class ImportantNoteController extends Controller
{

    public function create_important_note(){
        $current_user = Auth::user()->name;
        $login_user_id = auth()->user()->id;
        $login_user_type = auth()->user()->type;

        return view('pages.ImportnatNote.CreateImportantNote')->with(['mode'=>"add",'current_user'=>$current_user]);
    }
    public function edit_important_note($id){

        $important_note = ImportantNote::find($id);
        $current_user = Auth::user()->name;

        return view('pages.ImportnatNote.CreateImportantNote')->with(['mode'=>"edit",'current_user'=>$current_user,'important_note'=>$important_note]);
    }
    public function delete_important_note($id){
        $important_note = ImportantNote::find($id);

        $important_note->isDelete = 1;

        $important_note->save();
        if($important_note){
            // return response()->json('success',200);
            return redirect()->route('dashboard');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function active_important_note($id){
        $important_note = ImportantNote::find($id);

        $important_note->isActive = 1;

        $important_note->save();
        if($important_note){
            // return response()->json('success',200);
            return redirect()->route('dashboard');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }
    public function deactive_important_note($id){
        $important_note = ImportantNote::find($id);

        $important_note->isActive = 0;

        $important_note->save();
        if($important_note){
            // return response()->json('success',200);
            return redirect()->route('dashboard');
        }else{
            $message = 'Data not Deleted';
            Session('message',$message);
        }  
    }

    public function store_important_note_data(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'note' => 'required',
        ]);
        if($request->mode === 'add')
        {
            $important_note = new ImportantNote;
            $important_note->note = $request->note;
            $important_note->user_id = auth()->user()->id;

            //Remaining attributes
            $important_note->save();

            if($important_note){
                return redirect()->route('dashboard');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
        else if($request->mode === 'edit')
    	{
            $important_note_id = $request->important_note_id;
            $important_note = ImportantNote::find($important_note_id);

            $important_note->note = $request->note;

            $important_note->save();

            if($important_note){
                return redirect()->route('dashboard');
            }else{
                $message = 'Data not Saved';
                Session('message',$message);
            }
        }
    }
    
}
