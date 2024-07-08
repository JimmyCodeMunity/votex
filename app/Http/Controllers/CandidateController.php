<?php

namespace App\Http\Controllers;

use App\Models\CandidateModel;
use App\Models\ElectionModel;
use App\Models\User;
use App\Models\VotesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    //
    public function candidatelist(){
        $data['getRecord'] = CandidateModel::getCandidates();
        
        
        
        return view('admin.candidate.list',$data);
    }

    

    public function addcandidateroute(){
        $data['getElections'] = ElectionModel::getElections();
        return view('admin/candidate/add',$data);
    }



    public function candidateedit($id){
        $data['getRecord'] = CandidateModel::getSingle($id);
        $data['getElections'] = ElectionModel::getElections();
        return view('admin.candidate.edit',$data);
    }
    public function candidatevotes($id){
        $data['getRecord'] = VotesModel::getMyVotes($id);
        return view('admin.candidate.votes',$data);
    }
    
    public function addcandidate(Request $request)
    {
        // dd($request->all());

        $user = new CandidateModel();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        
        if(!empty($request->profile_pic)){
            $imageName = time().'.'.$request->profile_pic->extension();
            $request->profile_pic->move(public_path('images'), $imageName);
            // $user->profile_pic = trim($request->profile_pic);
            $user->profile_pic = 'images/'.$imageName;
        }
        $user->contact = trim($request->contact);
        $user->election = trim($request->election);
        
        // $user->user_type = 3;
        $user->save();
        // event(new Registered($user));

        // // Send email to admin
        // Mail::to('admin@nexus.com')->send(new NewUserNotification($user));


        return redirect('admin/candidate/list')->with('success', 'new candidate added successfully');
    }


    public function updatecandidate($id, Request $request){
        $request()->validate([
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $existingCandidate = CandidateModel::where('name', $request->name)
                        ->where('email', $request->email)
                        ->where('election', $request->election)
                        ->first();

        if($existingCandidate){
            return redirect()->back()->with('error', 'Candidate already in these election.');
        }
        

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
        
        // $user->user_type = 3;
        $user->save();

        if(Auth::user()->user_type == 1){
            return redirect('admin/dashboard')->with('success','admin Updated successfully');
        }else{
            return redirect('user/dashboard')->with('success','user Updated successfully');
        }
        
    }


    public function deletecandidate($id){
        $user = CandidateModel::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success','candidate Deleted successfully');

    }
}
