<?php

class UsersController extends BaseController {

	/**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1) {
        
            $users = User::where('role_id', '!=', 3)->orderBy('id', 'DESC')->paginate(15);
        
        } else {

            $users = User::where('padre_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->paginate(15);
        
        } 

        //$users = User::orderBy('id', 'DESC')->paginate(15);
        return View::make('users.index', compact('users'));

        
    }

    /**
     * Show the form for creating a new post
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::lists('nombre', 'id');
        return View::make('users.create')->with('roles', $roles);
    }

    /**
     * Store a newly created post in storage.
     *
     * @return Response
     */
    public function store()
    {
        
        $validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
			$user = new User;
			$user->nombre = Input::get('nombre');
			$user->email = Input::get('email');
			$pass = substr(md5(rand()),0,8);
			$user->password = Hash::make($pass);
			$user->role_id = Input::get('role_id');

            if (Auth::user()->role_id == 1) {
                $user->padre_id = 1;
            } elseif (Auth::user()->role_id == 2) {
                $user->padre_id = Auth::user()->id;
            } else {
                $user->padre_id = 0;
            }

			$user->save();

			// // Email Activeta
			// $email = Mail::send('emails.activate', array('name' => Input::get('nombre'), 'email' => Input::get('email'), 'password' => $pass), function($message) use ($user) {
			// 	$message->to($user->email, $user->name)->subject('Bingo Integral - Datos de Acceso');
			// });

			return Redirect::to('admin/users/create')->with('success', 'Usuario registrado con éxito!');
		
		} else {
		
			return Redirect::to('admin/users/create')->withErrors($validator)->withInput();
		
		}
          
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return View::make('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
        if (Auth::user()->role_id == 3 and Auth::user()->id != $id){
            
            $user = User::find(Auth::user()->id);
            $roles = Role::lists('nombre', 'id');
            return View::make('users.edit', compact('user'))->with('roles', $roles);
        
        } else {
            
            $user = User::find($id);
            $roles = Role::lists('nombre', 'id');          
            return View::make('users.edit', compact('user'))->with('roles', $roles);   
        
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::find($id);

        if ($user==NULL)
        {
            return Redirect::back()->with('user', $user);
        }

        if (Auth::user()->role_id == 3) {
           
           $rules = array( 
                'nombre' => 'required',
                'email' => 'required|email',
            );
            $role = Auth::user()->role_id;
        
        } else {
            
            $rules = array(
                'role_id' => 'required', 
                'nombre' => 'required',
                'email' => 'required|email',
            );
            $role = Input::get('role_id');

        }        

        $validator = Validator::make($data = Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $password = Input::get('password');

        // Modify the user.
        $user->role_id        = $role;
        $user->nombre         = Input::get('nombre');
        $user->email          = Input::get('email');

        if ($password != '') {
        	$user->password = Hash::make($password);
        }        
        
        // Save
        $user->save();

        if (Auth::user()->role_id == 3) {
            return Redirect::to('admin/dashboard')->with('success', 'Usuario modificado exitosamente!');
        } else {
            return Redirect::to('admin/users')->with('success', 'Usuario modificado exitosamente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        User::where('padre_id', '=', $id)->delete();

        Venta::where('user_id', '=', $id)->delete();

        Rango::where('user_id', '=', $id)->delete();

        return Redirect::to('admin/users')->with('success', 'Usuario borrado exitosamente!');
    }

}