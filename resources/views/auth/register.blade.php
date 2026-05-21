@extends('layouts.marketing')

@section('title', 'Sign Up')

@section('content')
<div class="max-w-md mx-auto my-8 md:my-16">
    <div class="bg-white rounded-3xl p-8 md:p-12 border border-[#e4e4e7] shadow-sm relative z-10">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-[#18181b] tracking-tight">Create Account</h2>
            <p class="text-xs text-black/50 font-semibold mt-2">Join AgroGeo and collaborate on national agricultural assessments</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-2xl text-xs text-red-700">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-5">
            @csrf
            
            <!-- Full Name -->
            <div class="flex flex-col gap-2">
                <label for="name" class="text-[10px] font-bold text-black/60 uppercase tracking-wider">Full Name</label>
                <input type="text" id="name" name="name" class="w-full bg-[#f8f8f6] border border-[#e4e4e7] rounded-full px-5 py-3 text-sm focus:outline-none focus:border-[#18181b] transition font-medium" value="{{ old('name') }}" required autofocus>
            </div>

            <!-- Email -->
            <div class="flex flex-col gap-2">
                <label for="email" class="text-[10px] font-bold text-black/60 uppercase tracking-wider">Email Address</label>
                <input type="email" id="email" name="email" class="w-full bg-[#f8f8f6] border border-[#e4e4e7] rounded-full px-5 py-3 text-sm focus:outline-none focus:border-[#18181b] transition font-medium" value="{{ old('email') }}" required>
            </div>
            
            <!-- Password -->
            <div class="flex flex-col gap-2">
                <label for="password" class="text-[10px] font-bold text-black/60 uppercase tracking-wider">Password</label>
                <input type="password" id="password" name="password" class="w-full bg-[#f8f8f6] border border-[#e4e4e7] rounded-full px-5 py-3 text-sm focus:outline-none focus:border-[#18181b] transition font-medium" required minlength="8">
            </div>

            <!-- Confirm Password -->
            <div class="flex flex-col gap-2">
                <label for="password_confirmation" class="text-[10px] font-bold text-black/60 uppercase tracking-wider">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full bg-[#f8f8f6] border border-[#e4e4e7] rounded-full px-5 py-3 text-sm focus:outline-none focus:border-[#18181b] transition font-medium" required minlength="8">
            </div>

            <!-- Submit -->
            <div class="mt-4">
                <button type="submit" class="w-full bg-[#18181b] hover:bg-black text-white py-3 rounded-full text-xs font-bold uppercase tracking-wider shadow hover:shadow-md transition">
                    Register
                </button>
            </div>
        </form>
        
        <!-- Toggle Auth -->
        <div class="mt-8 text-center pt-6 border-t border-[#e4e4e7]/60">
            <p class="text-xs text-black/50 font-medium">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-[#18181b] font-bold hover:underline transition">Sign in here</a>
            </p>
        </div>
    </div>
</div>
@endsection
