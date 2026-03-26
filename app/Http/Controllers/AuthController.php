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
                'email'    => 'required',
                'password' => 'required',
            ]);
            $input = $request->input('email');
            // Try username first, then email
            $field = filter_var($input, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $credentials = [
                $field     => $input,
                'password' => $request->input('password'),
                'role'     => 'admin',
            ];
        } else {
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required',
            ]);
            $credentials = [
                'email'    => $request->input('email'),
                'password' => $request->input('password'),
                'role'     => $role,
            ];
        }

        if (auth()->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $user = auth()->user();

            if ($role === 'admin') return redirect()->route('admin.dashboard');
            if ($role === 'penyelenggara') {
                if ($user->status !== 'approved') {
                    auth()->logout();
                    return redirect()->route('login')->with('error', 'Akun penyelenggara Anda sedang menunggu persetujuan admin. Harap tunggu verifikasi dalam 1x24 jam.');
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

        // Create initial profile with institution if organizer
        $user->profile()->create([
            'institution' => ($role === 'penyelenggara') ? $request->nama : null,
            'organization_website' => ($role === 'penyelenggara') ? $request->organization_website : null,
        ]);

        auth()->login($user);

        if ($role === 'penyelenggara') {
            auth()->logout();
            return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Akun Anda sedang diverifikasi. Tim LombaPeta akan segera menghubungi Anda melalui email untuk langkah selanjutnya. Harap tunggu verifikasi dalam 1x24 jam.');
        }

        return redirect()->route('peserta.dashboard');
    }
}
