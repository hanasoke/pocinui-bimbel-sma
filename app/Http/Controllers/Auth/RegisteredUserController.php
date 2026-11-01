<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,teacher,student'],
            'phone' => ['required', 'string', 'max:20'],
            'birthdate' => ['required', 'date'],
            'birthdate_location' => ['required', 'string', 'max:255'],
            'school_grade' => ['nullable', 'string', 'max:50', 'required_if:role,student'], // Wajib jika role = student
        ]);

        // 2. Simpan Data ke Database SQL Server
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'birthdate_location' => $request->birthdate_location,
            'school_grade' => $request->role === 'student' ? $request->school_grade : null,
        ]);

        // Jika role guru, otomatis buatkan profil di tabel teachers
        if ($request->role === 'teacher') {
            \App\Models\Teacher::create([
                'user_id' => $user->id,
                'worker_experience' => null, // Bisa diisi nanti lewat halaman profil
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        // 3. Redirect berdasarkan Role (Sama seperti sistem login)
        if ($user->role === 'admin') {
            return redirect(route('admin.dashboard', absolute: false));
        } elseif ($user->role === 'teacher') {
            return redirect(route('teacher.dashboard', absolute: false));
        } elseif ($user->role === 'student') {
            return redirect(route('student.dashboard', absolute: false));
        }

        return redirect(route('dashboard', absolute: false));
    }
}
