@extends('layouts.main')
@section('title', 'forgot password')
@section('content')
    <div class="bg-slate-100 items-center flex justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-md w-full max-w-sm py-10 px-12 h-['80px']">
            <form action="{{ route('Password.email') }}" method="post">
                @csrf
                <h1 class="font-bold text-2xl text-center">Masukan Email Aktif</h1>
                <p class="text-xs text-dark font-sans text-center mt-3">Masukan email anda yang aktif,dan masukan email yang tertaut pada akun anda, kami akan mengirimkan pesan melalui gmail jika anda klik button di bawah berarti anda mensetujui <b>kebijkan</b> kami,terimakasih. <b>pesan yang kami kirim akan kadaluarsa dalam 60 menit</b></p>
                <input type="email" name="email" required class="bg-white py-2 px-4 border mx-auto text-black focus:outline-none focus:border-red-500 rounded-md block mt-4" placeholder="masukan email...">
                <button type="submit" class="bg-red-500 text-white py-2 px-2 mx-auto block mt-3 text-sm rounded-md shadow-sm">Konfirmasi</button>
            </form>
            <div class="border border-solid border-slate-300 mt-5"></div>
            <span class="block text-slate-600 font-bold text-xs text-center mt-3">-devcode.id</span>
            @session('email')
                {{ $value }}
            @endsession
            @if ($errors->all())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
        </div>
    </div>
@endsection
