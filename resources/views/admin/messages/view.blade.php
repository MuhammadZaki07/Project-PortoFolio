@extends('layouts.dashboard')
@section('content')
    <div class="max-w-2xl mx-auto bg-white relative rounded-xl shadow-lg p-8 mb-6">
        <div class="border-4 border-double border-dark p-5">
            <h1 class="text-center font-bold text-4xl text-dark mb-5">Messages</h1>
            <span class="text-xs text-slate-300">Waktu : {{ $message->created_at }}</span>
            <div class="border border-dashed mt-3 mb-5 border-dark"></div>
            <h5 class="font-semibold text-start text-sm mb-2 text-dark">Email : {{ $message->email }}</h5>
            <div>
                <span class="text-base font-semibold block">Name : {{ $message->name }}</span>
                <h4 class="font-semibold mb-2">Message : </h4>
                <div class="py-3">
                    {{ $message->message }}
                </div>
            </div>
            <div class="text-center mt-4">
                <div class="border border-solid mt-3 mb-5 border-dark"></div>
                <p class="font-bold text-base">DEVCODE.ID</p>
                <p class="text-xs font-semibold text-slate-400">MLG-JawaTimur-Indonesia</p>
            </div>
        </div>
    </div>
@endsection
