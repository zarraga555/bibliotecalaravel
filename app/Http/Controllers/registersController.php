<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use App\User;
use App\Bibliotecario;
use App\Persona;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class registersController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('create','store');
        $this->middleware('role');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'rol' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(User $user)
    {
        $bibliotecario = Bibliotecario::all();
        $persona = Persona::all();
        return view('auth.registers',['user' => new User], compact('bibliotecario','persona'));
    }
    public function store(){
        $registro = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'rol' => request('rol'),
            'idBibliotecario' => request('idBibliotecario'),
            'idPersona' => request('idPersona')
        ]);
        return redirect()->route('registers.create');   
    }
}