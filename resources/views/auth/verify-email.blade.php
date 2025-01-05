@extends('layouts.auth')
@section('content')
<div class="text-center p-6 bg-slate-900 rounded-t">
    <a href="index.html"><img src="assets/images/logos/UNS-LOGO.png" alt="" class="w-14 h-14 mx-auto mb-2"></a>
    <h3 class="font-semibold text-white text-xl mb-1">KPPM FKIP UNS</h3>
    <p class="text-xs text-slate-400">Email Verification</p>
</div>
    <div class=" text-slate-800 p-4 rounded-md">
        <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        {{-- <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div> --}}
        <div class="bg-green-100 text-green-700 p-4 rounded-md">
            <p>
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </p>
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form class="p-6" method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="mt-4">
                <button
                    class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded-md hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form class="p-6" method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="mt-4">
                <button
                    class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-red-500 border-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-brand-600">
                    {{ __('Log Out') }}
                </button>
            </div>
        </form>
    </div>
@endsection