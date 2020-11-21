<?php

namespace App\Http\Controllers;

use App\News;
use App\User;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function index()
    {

        $result = News::orderBy('id','desc')->get();
        return view('user.home')->with('data',$result);
    }

    function contact_page()
    {
        return view('user.contact');
    }

    function user_profilepage()
    {
        $id = Auth()->user()->id;
        $user_data = User::FindOrfail($id);
        return view('user.user_profile')->with('data',$user_data);
    }

    //create new
    function insert_new(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'photo' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user_profilepage')
                        ->withErrors($validator)
                        ->withInput();
        }
 
    $file= $request->file('photo');
    
    $fileName= uniqid().'_'.$file->getClientOriginalName();
    $file->move(public_path().'/photos/',$fileName);
    $data = [
        'user_id'=>$request->user_id,
        'title'=>$request->title,
        'photo'=>$fileName,
        'content'=>$request->content
    ];

    News::create($data);
    return back()->with('success','insert success');
    }

    //insert contact
    function insert_contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('contact_page')
                        ->withErrors($validator)
                        ->withInput();
        }



      $data = [
          'name'=>$request->name,
          'email'=>$request->email,
          'message'=>$request->message
      ];

      Contact::create($data);
      return back()->with('success','Success Message');
    }

    //look new info

    function look_newInfo($id)

    {
        // $result= News::FindOrfail($id);

        $result = DB::table('news')
        ->join('users','users.id','=','news.user_id')
        ->where('news.id','=',$id)
        ->select('users.*','news.*','users.id as user_ID','news.id as new_ID')
        ->get();
    // dd($result->toArray());
        return view('user.look_newInfo')->with('data',$result);
    }
    //delete new
    function delete_new($id)
    {
        News::FindOrfail($id)->delete();
        return redirect()->route('home_page')->with('delete','Delete Success');
    }

    function update_new(Request $request)
    {
        $id= $request->new_id;

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'photo' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('look_newInfo/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }


        
        $file= $request->file('photo');
        $fileName=uniqid()."_".$file->getClientOriginalName();
        $file->move(public_path().'/photos/',$fileName);

        $data = [
            'title'=>$request->title,
            'photo'=>$fileName,
            'content'=>$request->content
        ];
       
        News::FindOrfail($id)->update($data);
        return back()->with('update','Update Success');
    }
    //update account
    function update_account(Request $request)
    {
        $id=$request->user_id;
        $data = [
            'id'=>$request->user_id,
            'name'=>$request->name,
            'email'=>$request->email
        ];
        
    User::FindOrfail($id)->update($data);
    return back()->with('update_success','Success Account');
    }

    function user_change_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_pwd' => 'required',
            'new_pwd' => 'required',
            'con_pwd' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $id = Auth()->user()->id;
       $old_pwd = $request->old_pwd;
       $new_pwd = $request->new_pwd;
       $con_pwd = $request->con_pwd;

      
       $data = User::FindOrfail($id);
       if(!Hash::Check($old_pwd,$data->password))
       {
           return back()->with('password','Password Do Not Match!');
       }
       else if(!(strlen($new_pwd)>= 6 && strlen($con_pwd)>=6))
       {
           return back()->with('password','Password Must be at least 6 charater!');
       }
       else if(!($new_pwd == $con_pwd))

      {
         return back()->with('password','Retype Again!,Password Not Same');
      }
      else{
          $Hash_new_pwd = Hash::make($new_pwd);
        $item = [
            'password'=>$Hash_new_pwd
        ];
        User::FindOrFail($id)->update($item);
        return back()->with('password_success','Change Password Success');
      }
      

    }
}
