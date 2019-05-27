<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //
         // get all the nerds
        //  $users = User::all()->paginate(15);
        $users = DB::table('users')->simplePaginate(15);

         // load the view and pass the nerds
        
         return view('index')->with('users', $users);

         
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
     
           // store
            $user = new User;
            $user->name       = $name;
            $user->email      = $email;
            $user->address = $address;
            $user->save();

            // redirect
            return redirect()->to('routetest')->with('submit','Your data has been submitted succesfully');
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);

        // show the view and pass the nerd to it
        return view('show')->with('user', $user);
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
        // get the user
        $user = User::find($id);

        // show the edit form and pass the nerd
        return view('edit')->with('user', $user);
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
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
     
           // store
            $user = User::find($id);
            $user->name       = $name;
            $user->email      = $email;
            $user->address = $address;
            $user->save();

            // redirect
            return redirect()->to('routetest')->with('submit','Your data has been submitted succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::find($id);
        $user->delete();

        $rem = User::all();
        return view('index')->with('users', $rem);
    }
}
