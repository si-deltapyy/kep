@extends('layouts.auth')
@section('content')
            <div class="text-center p-6 bg-slate-900 rounded-t">
                <a href="index.html"><img src="assets/images/logos/UNS-LOGO.png" alt="" class="w-14 h-14 mx-auto mb-2"></a>
                <h3 class="font-semibold text-white text-xl mb-1">Reset Password</h3>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form class="p-6" method="POST" action="{{ route('password.email') }}">
                @csrf
                <x-auth-field
                    label="Email"
                    name="email"
                    type="email"
                    placeholder="Enter your email"
                    :value="old('email')"
                    required
                    autofocus
                    id="email"
                    title="Email"
                />
                <div class="mt-4">
                    <button
                        class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded-md hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                        Send Email
                    </button>
                </div>
            </form>

@endsection
