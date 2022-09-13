<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('role_id', '!=', 3)->get();
        return view('admin.doctor.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        // calling the validateStore function 
        $this->validateStore($request);

        $data = $request->all();
        // $image = $request->file('image');
        // $name = $image->hashName();
        // $destination = public_path('/images');
        // $image->move($destination, $name);

        $name = (new User)->userAvatar($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->back()->with('message', 'Doctor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // dd($id);
        $user = User::find($id);
        return view('admin.doctor.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.doctor.edit', compact('user'));
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
        //
        $this->validateUpdate($request, $id);
        $data = $request->all();

        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;

        if ($request->hasFile('image')) {

            // $image = $request->file('image');
            // $imageName = $image->hashName();
            // $destination = public_path('/images');
            // $image->move($destination, $imageName);

            $imageName = (new User)->userAvatar($request);
            unlink(public_path('images/' . $user->image)); //removes the previous images upon UPDATE..hereby saving space
        }

        $data['image'] = $imageName;

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }

        $user->update($data);

        return redirect()->route('doctor.index')->with('message', 'Profile updated successfully');
        // return redirect()->back()->with('message', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //checking to make sure that the current logged in user cant delete himself
        if (auth()->user()->id == $id) {
            abort(401);
        }

        $user = User::find($id);
        $userDelete = $user->delete();

        if ($userDelete) {
            unlink(public_path('images/' . $user->image));
        }

        return redirect()->route('doctor.index')->with('message', 'User deleted successfully');
    }


    public function validateStore($request)
    {

        // the whole idea is to make the function and call it in its original store method which in itself is getting way too long

        return $this->validate($request, [

            'name' => 'required',
            'email' => 'required | unique:users',
            'password' => 'required | min:6 | max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department_id' => 'required',
            'phone_number' => 'required | numeric',
            'image' => ' mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required',
        ]);
    }


    public function validateUpdate($request, $id)
    {

        // the whole idea is to make the function and call it in its original store method which in itself is getting way too long

        return $this->validate($request, [

            'name' => 'required',
            // 'email' => 'required | unique:users,email' . $id,  //updating same email which it throwing error since its unique in the database. Passing the 'ID' sorts the problem. yaah!
            // 'password' => 'required | min:6 | max:25',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'department_id' => 'required',
            'phone_number' => 'required | numeric',
            'image' => 'mimes:jpeg,jpg,png',
            'role_id' => 'required',
            'description' => 'required',
        ]);
    }
}
