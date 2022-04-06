<?php

namespace App\Http\Controllers;
use App\Http\Controllers\quot;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UpdatedUserMail;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->password=$request->password;
        $user->save();
        return "Stored";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(User::find($id))
        {
             $user=User::find($id);
            return new UserResource($user);
        }
        else{
            return "There is no user with this id";
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(User::find($id))
        {
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        // $user->password=$request->password;
        
        $user->save();
        Mail::to($request->email)->send(new UpdatedUserMail());
        return "Updated";
        }
        else
        return "There is no user with this id";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)){
            $user = User::find($id)->email;
            User::destroy($id);
            return "destroyed";
        }
        else
        return "There is no user with this id";
       
    }
}
