<?php

namespace App\Http\Controllers;
use App\User;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.index');
    }

    function profile()
    {
     $id = Auth()->user()->id;
     $data = User::FindOrFail($id);
    return view('admin.profile')->with('data',$data);

    }
    //update profile
    function update_admin_profile(Request $request)
    {
        $id= $request->user_id;

        $result = [
            'name'=>$request->name,
            'email'=>$request->email
        ];
        User::FindOrFail($id)->update($result);
        return back()->with('result','Update Success');
    }
    //change password
    function admin_change_password(Request $request)
    {
        $id = Auth()->user()->id;
        $old_pwd = $request->old_pwd;
        $new_pwd = $request->new_pwd;
        $con_pwd = $request->con_pwd;

            $data = User::FindOrFail($id);
        if(!Hash::Check($old_pwd,$data->password))
        {
            return back()->with('password','Old password and new pwd is not same');
        }
        else if(!(strlen($new_pwd)>=6 && strlen($con_pwd)>=6))
        {
            return back()->with('password','Password must be at least 6 Charater');
        }
        else if(!($new_pwd == $con_pwd))
        {
            return back()->with('password','password is not same');
        }
        else
        {
            $passwordata=[
                'password'=> Hash::Make($new_pwd)
            ];

            User::FindOrFail($id)->update($passwordata);
            return back()->with('password','Password Change Successfully');
        }
        
    }

    

    function contact_list()
    {
        $data = Contact::orderBy('id','desc')->get();
        return view('admin.contact_list')->with('data',$data);
    }
    //delete contact
    function delete_contact($id)
    {
        Contact::FindOrFail($id)->delete();
        return back()->with('delete','Deleted');
    }
    function update_contact($id)
    {
       $data = Contact::FindOrFail($id);
      return view('admin.update_contact')->with('data',$data);
    }
    function contact_update(Request $request)
    {
        $id = $request->contact_id;
        $result = [
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ];
        
        Contact::FindOrFail($id)->update($result);
        return redirect()->route('contact_list')->with('update','Updated');

    }
    

    
    function manage_premium()
    {
        $data = User::orderBy('id','desc')->get();
        return view('admin.manage_premium')->with('data',$data);
    }
    //delete premium
    function delete_premium($id)
    {
        User::FindOrFail($id)->delete();
        return back()->with('delete','Deleted');
    }
    //user_update page
    function user_update($id)
    {
        $result = User::FindOrFail($id);
        return view('admin.user_update')->with('result',$result);
    }

    //update_user
    function update_user(Request $request)
    {
      $id = $request->user_id;
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'isAdmin' => 'required',
        'isPremium' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }

      $data = [
          'name'=>$request->name,
          'email'=>$request->email,
          'isAdmin'=>$request->isAdmin,
          'isPremium'=>$request->isPremium
      ];
      $isAdmin = $request->isAdmin;
      $isPremium= $request->isPremium;
      if(($isAdmin == 0 || $isAdmin==1)&& ($isPremium == 0 || $isPremium == 1))
      {
        User::FindOrFail($id)->update($data);
        return back()->with('update','Updated');
      }
      else{
          return back()->with('validation_error','You Must type 1 or 0 isAdmin and isPremium');
      }

      

    }
}
