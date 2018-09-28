<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator(
            $data = $this->getFormattedData($request->all())
        )->validate();

        event(new Registered($this->createUser($data)));

        return redirect()->route('login');
    }

    protected function getFormattedData(array $data)
    {
        $data['phone'] = preg_replace('/\D/', '', $data['phone']);
        $data['cpf_cnpj'] = preg_replace('/\D/', '', $data['cpf_cnpj']);
        $data['birth_date'] = (string) Carbon::createFromFormat('d/m/Y', $data['birth_date']);

        return $data;
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
            'name' => 'required',
            'company_name' => 'sometimes|required',
            'email' => 'required|email|unique:users',
            'cpf_cnpj' => 'required|cpf_cnpj|unique:users',
            'phone' => 'required|string|min:10|max:11',
            'birth_date' => 'required|date',
            'gender' => 'required|in:M,F',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'company_name' => $data['company_name'] ?? null,
            'email' => $data['email'],
            'cpf_cnpj' => $data['cpf_cnpj'],
            'birth_date' => $data['birth_date'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'password' => $data['password'],
        ]);
    }
}
