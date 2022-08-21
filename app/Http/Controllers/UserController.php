<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller {

    // Register action
    public function register(Request $request) {
        $formFields = $request->validate([
            'username' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields["password"]);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', "Registration Complete.");
    }

    // Show registration form
    public function registration() {
        return view('user.registration');
    }

    public function loginpage() {
        return view('user.loginpage');
    }

    public function login(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Login complete.');
        }

        return back()->withErrors(['email' => 'Invalid login information. Please try again.'])->onlyInput('email');
    }


    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', "Logout complete.");
    }
}
