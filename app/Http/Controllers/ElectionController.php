<?php

namespace App\Http\Controllers;

use App\Models\CandidateModel;
use App\Models\ElectionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectionController extends Controller
{
    //
    public function electionlist(){
        $data['getRecord'] = ElectionModel::getElections();
        return view('admin.elections.list',$data);
    }

    

    public function addelectionroute(){
        return view('admin/elections/add');
    }



    public function electionedit($id){
        $data['getRecord'] = ElectionModel::getSingle($id);
        return view('admin.elections.edit',$data);
    }
    
    public function addelection(Request $request)
    {
        // dd($request->all());

        $election = new ElectionModel();
        $election->name = trim($request->name);
        $election->description = trim($request->description);
        
        $election->start_date = trim($request->start_date);
        $election->end_date = trim($request->end_date);
        
        // $user->user_type = 3;
        $election->save();
        // event(new Registered($user));

        // // Send email to admin
        // Mail::to('admin@nexus.com')->send(new NewUserNotification($user));


        return redirect('admin/elections/list')->with('success', 'new user added successfully');
    }


    public function updateelection($id, Request $request){
        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = CandidateModel::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        
        if(!empty($request->profile_pic)){
            $imageName = time().'.'.$request->profile_pic->extension();
            $request->profile_pic->move(public_path('images'), $imageName);
            // $user->profile_pic = trim($request->profile_pic);
            $user->profile_pic = 'images/'.$imageName;
        }
        $user->contact = trim($request->contact);

        $user->save();

        
        return redirect('admin/candidate/list')->with('success','admin Updated successfully');
        
    }


    public function deletecandidate($id){
        $user = ElectionModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/candidate/list')->with('success','admin Deleted successfully');

    }
}
