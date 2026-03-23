<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function process(Request $request)
    {
        $mode = $request->input('mode');
        $role = $request->input('role');

        if ($mode === 'login') {
            return $this->handleLogin($request, $role);
        } else {
            return $this->handleRegister($request, $role);
        }
    }

    protected function handleLogin(Request $request, $role)
    {
        $credentials = [];

        if ($role === 'admin') {
            $request->validate([
                'email' => 'required', // The frontend reuses the email input for username
                'password' => 'required'
            ]);
            $credentials = [
                'username' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => 'admin'
            ];
        } else {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $credentials = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => $role
            ];
        }

        if (auth()->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = auth()->user();

            if ($role === 'admin') return redirect()->route('admin.dashboard');
            if ($role === 'penyelenggara') {
                if ($user->status !== 'approved') {
                    // Log them out or let CheckStatus handle it?
                    // Better to redirect and let middleware block them or redirect them to a pending page
                    return redirect()->route('penyelenggara.dashboard'); 
                }
                return redirect()->route('penyelenggara.dashboard');
            }
            return redirect()->route('peserta.dashboard');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    protected function handleRegister(Request $request, $role)
    {
        if ($role === 'admin') {
            abort(403, 'Admin cannot register.');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $status = ($role === 'penyelenggara') ? 'pending' : 'approved';

        $user = \App\Models\User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => $role,
            'status' => $status,
        ]);

        auth()->login($user);

        if ($role === 'penyelenggara') {
            return redirect()->route('penyelenggara.dashboard');
        }

        return redirect()->route('peserta.dashboard');
    }
}
