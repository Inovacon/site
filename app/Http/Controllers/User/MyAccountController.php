<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Util\Sanitizer;

class MyAccountController extends Controller
{
    public function index()
    {
    	return view('user.my-account.index');
    }

    public function edit()
    {
        $user = auth()->user();
    	$user->birth_date = strftime("%d/%m/%Y", strtotime($user->birth_date));

    	return view('user.my-account.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $this->getSanitizedData($request->only(
            'trade', 'email', 'phone', 'gender', 'old_password', 'password', 'password_confirmation'
        ));

        $this->validator($data, $user = auth()->user())->validate();

        $user->update(array_except($data, ['old_password', 'password_confirmation']));

        return back()->with('flash', 'Dados alterados com sucesso.');
    }

    protected function getSanitizedData(array $data)
    {
        $data['phone'] = Sanitizer::stripNonDigits($data['phone']);

        if ('' === trim($data['old_password'])) {
            unset($data['old_password']);
        }

        return $data;
    }

    protected function validator(array $data, $user)
    {
        return Validator::make($data, [
            'trade' => 'sometimes|required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => 'required|string|min:10|max:11',
            'gender' => 'required|in:M,F',
            'old_password' => $this->oldPasswordRule($user),
            'password' => 'nullable|required_with:old_password|string|min:6|confirmed'
        ]);
    }

    protected function oldPasswordRule($user)
    {
        return function ($attribute, $value, $fail) use ($user) {
            if (! Hash::check($value, $user->password)) {
                $fail('A senha antiga está incorreta.');
            }
        };
    }
}
