<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<!-- Simple Register Form Without Laravel Blade Components -->
<div style="max-width: 400px; margin: 40px auto; padding: 24px; border: 1px solid #ddd; border-radius: 8px; background: #fff;">
    <h2 style="text-align:center; margin-bottom: 24px;">Register</h2>
    <form method="POST" action="/register">
        <!-- Name -->
        <div style="margin-bottom: 16px;">
            <label for="name" style="display:block; margin-bottom: 6px; font-weight: 500;">Name</label>
            <input id="name" name="name" type="text" required autofocus autocomplete="name"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <!-- Email Address -->
        <div style="margin-bottom: 16px;">
            <label for="email" style="display:block; margin-bottom: 6px; font-weight: 500;">Email</label>
            <input id="email" name="email" type="email" required autocomplete="username"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <!-- Password -->
        <div style="margin-bottom: 16px;">
            <label for="password" style="display:block; margin-bottom: 6px; font-weight: 500;">Password</label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 16px;">
            <label for="password_confirmation" style="display:block; margin-bottom: 6px; font-weight: 500;">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="/login" style="font-size: 14px; color: #4F46E5; text-decoration: underline;">Already registered?</a>
            <button type="submit" style="background: #4F46E5; color: #fff; padding: 8px 20px; border: none; border-radius: 4px; font-weight: 600; cursor: pointer;">
                Register
            </button>
        </div>
    </form>
</div>
