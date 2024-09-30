@extends('layouts.auth')
@section('content')
<div class="text-center p-6 bg-slate-900 rounded-t">
    <a href="index.html"><img src="assets/images/logo-sm.png" alt="" class="w-14 h-14 mx-auto mb-2"></a>
    <h3 class="font-semibold text-white text-xl mb-1">Let's Get Started Robotech</h3>
    <p class="text-xs text-slate-400">Sign in to continue to Robotech.</p>
</div>

<form class="p-6" method="POST" action="{{ route('login') }}">
    @csrf
    <x-auth-field
        label="Email"
        name="email"
        type="email"
        placeholder="Your Email"
        :value="old('email')"
        required
        autofocus
        autocomplete="username"
        title="Email"
    />
    <x-auth-field
        label="Your password"
        name="password"
        type="password"
        placeholder="Password"
        required
        autocomplete="current-password"
        title="Password"
    />
    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-xs font-medium text-brand-500 underline">Forget Password?</a>
    @endif
    <div class="mt-4">
        <button
            class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
            Login
        </button>
    </div>
</form>

<p class="mb-5 text-sm font-medium text-center text-slate-500"> Don't have an account? <a href="{{ route('register') }}"
    class="font-medium text-brand-500 hover:underline">Sign up</a>
</p>
@endsection
