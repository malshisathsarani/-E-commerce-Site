<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<!-- Simple Login Form Without Laravel Blade Components -->
<div style="max-width: 400px; margin: 40px auto; padding: 24px; border: 1px solid #ddd; border-radius: 8px; background: #fff;">
    <h2 style="text-align:center; margin-bottom: 24px;">Login</h2>
    <!-- Display session status or error messages here if needed -->
    <form method="POST" action="/login">
        <!-- Email Address -->
        <div style="margin-bottom: 16px;">
            <label for="email" style="display:block; margin-bottom: 6px; font-weight: 500;">Email</label>
            <input id="email" name="email" type="email" required autofocus autocomplete="username"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <!-- Password -->
        <div style="margin-bottom: 16px;">
            <label for="password" style="display:block; margin-bottom: 6px; font-weight: 500;">Password</label>
            <input id="password" name="password" type="password" required autocomplete="current-password"
                   style="width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;">
        </div>

        <!-- Remember Me -->
        <div style="margin-bottom: 16px;">
            <label style="display: flex; align-items: center;">
                <input id="remember" name="remember" type="checkbox" style="margin-right: 8px;">
                <span style="font-size: 14px; color: #555;">Remember me</span>
            </label>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <a href="/forgot-password" style="font-size: 14px; color: #4F46E5; text-decoration: underline;">Forgot your password?</a>
            <button type="submit" style="background: #4F46E5; color: #fff; padding: 8px 20px; border: none; border-radius: 4px; font-weight: 600; cursor: pointer;">
                Log in
            </button>
        </div>
    </form>
</div>
