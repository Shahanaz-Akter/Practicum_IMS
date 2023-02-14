<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function loginPost(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;
        $user = \App\User::where(['email' => $email, 'password' => $pass])->first();

        if ($user != null) {
            //  session is saved  using put() till logging out
            session()->put('user', $user);
            if ($user->user_type == 'superadmin') {
                return redirect('/superadmin/dashboard');

            } else if ($user->user_type == 'admin') {
                return redirect('/admin/dashboard');

            } else if ($user->user_type == 'kitchener') {
                return redirect('/kitchener/dashboard');

            } else {
            }
        } else {

            return redirect()->back();
        }
    }
    
    public function createUser()
    {

        return view('superadmin.adduser');
    }

   
    public function postUser(Request $request)
    {

        $request->validate([
            'phone' => 'size:11',
            'email' => 'unique:users',
            
        ]);

        if ($request->image != null) {
            
            //for getting original image name used file()
            $imageName = $request->file('image')->getClientOriginalName();
          
            //To move image into public folder
            $request->image->move(public_path('images/users'), $imageName); 
            $img_url = '/images/users/' . $imageName;
           
        }
        \App\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'user_type' => $request->position,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'date_of_join' => $request->doj,
            'image' => $img_url,
       
        ]);

        return redirect('/userlist');
    }

    public function userList()
    {
        $users = \App\User::all();
        return view('superadmin.userlist')->with(['users' => $users]);
    }

    public function superAdminProfile()
    {
        // Recently logged in user is saved on the $request->session()
        $loggedinuser = session()->get('user');
        return view('superadmin.profile')->with('user', $loggedinuser);
    }
    public function saveSuperAdminProfile(Request $request)
    {
     

        if ($request->image != null) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/users'), $imageName);
            $img_url = '/images/users/' . $imageName;

            \App\User::where('id', $request->id)->update([
                'name' => $request->name,
                'image' => $img_url,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'date_of_join' => $request->doj,
                'gender' => $request->gender,
                'user_type' => $request->position,
            ]);
        } 
        
        else {
            \App\User::where('id', $request->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'date_of_join' => $request->doj,
                'gender' => $request->gender,
                'user_type' => $request->position,
            ]);
        }
        $new = \App\User::where('id', $request->id)->first();
        session()->put('user', $new);
        return redirect('/superadmin/profile');
    }



    public function adminProfile()
    {
        $loggedinuser = session()->get('user');
        return view('admin.profile')->with('user', $loggedinuser);
    }
    public function saveAdminProfile(Request $request)
    {
         

        if ($request->image != null) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/users'), $imageName);
            $img_url = '/images/users/' . $imageName;
            \App\User::where('id', $request->id)->update([
                'name' => $request->name,
                'image' => $img_url,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'date_of_join' => $request->doj,
                'gender' => $request->gender,
                'user_type' => $request->position,
            ]);
        } else {
            \App\User::where('id', $request->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'date_of_join' => $request->doj,
                'gender' => $request->gender,
                'user_type' => $request->position,
            ]);
        }
        $new = \App\User::where('id', $request->id)->first();
        session()->put('user', $new);
        return redirect('/admin/profile');
    }




    public function kitchenerProfile()
    {
        $loggedinuser = session()->get('user');
        return view('kitchen_staff.profile')->with('user', $loggedinuser);
    }
    public function saveKitchenerProfile(Request $request)
    {
        // dd($request);

        if ($request->image != null) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/users'), $imageName);
            $img_url = '/images/users/' . $imageName;
            \App\User::where('id', $request->id)->update([
                'name' => $request->name,
                'image' => $img_url,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'date_of_join' => $request->doj,
                'gender' => $request->gender,
                'user_type' => $request->position,
            ]);
        } else {
            \App\User::where('id', $request->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'date_of_join' => $request->doj,
                'gender' => $request->gender,
                'user_type' => $request->position,
            ]);
        }
        $new = \App\User::where('id', $request->id)->first();
        session()->put('user', $new);
        return redirect('/kitchener/profile');
    }



    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }
    public function editUser($id)
    {
        $user = \App\User::where('id', $id)->first();
        return view('superadmin.edituser')->with(['user' => $user]);
    }
    public function editUserPost(Request $request)
    {

        if ($request->image != null) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/users'), $imageName);
            $img_url = '/images/users/' . $imageName;
            \App\User::where('id', $request->id)->update([
                'name' => $request->name,
                'image' => $img_url,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'date_of_join' => $request->doj,
                'gender' => $request->gender,
                'user_type' => $request->position,
            ]);
        } else {
            \App\User::where('id', $request->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $request->password,
                'date_of_join' => $request->doj,
                'gender' => $request->gender,
                'user_type' => $request->position,
            ]);
        }
        return redirect('/userlist');
    }
}
