@extends('layouts.auth')

@section('content')
<div class="text-center p-6 bg-slate-900 rounded-t">
    <a href="index.html"><img src="assets/images/logos/UNS-LOGO.png" alt="" class="w-14 h-14 mx-auto mb-2"></a>
    <h3 class="font-semibold text-white text-xl mb-1">KPPM FKIP UNS</h3>
    <p class="text-xs text-slate-400">Register to continue to KPPM</p>
</div>

<!-- Show error messages -->
@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded-md">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Alert Success -->
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-md">
        <p>{{ session('success') }}</p>
    </div>
@endif

<form class="p-6" method="POST" action="{{ route('register') }}">
    @csrf

    <x-auth-field
        label="Name"
        name="name"
        type="text"
        placeholder="Enter your name"
        :value="old('name')"
        required
        autofocus
        autocomplete="name"
        title="Name"
    />

    <x-auth-field
        label="Email"
        name="email"
        type="email"
        placeholder="Enter your email"
        :value="old('email')"
        required
        autocomplete="username"
        title="Email"
    />
    <x-auth-field
        label="Your password"
        name="password"
        type="password"
        placeholder="Enter your password"
        required
        autocomplete="new-password"
        title="Password"
    />

    <x-auth-field
        label="Confirm Password"
        name="password_confirmation"
        type="password"
        placeholder="Confirm your password"
        required
        autocomplete="new-password"
        title="Confirm Password"
    />

    <div class="mt-4">
        <button
            class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded-md hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
            Register
        </button>
    </div>
</form>

<p class="mb-5 text-sm font-medium text-center text-slate-500"> Already have an account ?  <a href="{{ route('login') }}"
    class="font-medium text-brand-500 hover:underline">Log in</a>
</p>
@endsection
