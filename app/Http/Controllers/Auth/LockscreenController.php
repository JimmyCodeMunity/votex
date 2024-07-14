<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LockscreenController extends Controller
{
    //
    public function showLockscreen(){
        return view('auth.lockscreen');
    }

    // public function unlock(Request $request){
    //     $request->validate([
    //         'password'=>'required'
    //     ]);

    //     $user = Auth::user();
    //     if(Hash::check($request->password,$user->password)){
    //         session(['lastActivityTime'=>time()]);
    //         return redirect()->intended('/');
    //     }

    //     return redirect()->route('lockscreen')->with('error','incorrect password');
    // }


    public function unlock(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->password, $user->password)) {
            session(['lastActivityTime' => time()]);

            // Restore the preserved session data
            session(['voter_id' => session('preserve_data')]);
            // session()->forget('preserve_data');

            return redirect()->intended('/');
        }

        return redirect()->route('lockscreen')->withErrors(['password' => 'Password is incorrect']);
    }
}
