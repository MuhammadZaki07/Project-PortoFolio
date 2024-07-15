@extends('layouts.dashboard')
@section('title', 'Form Categories')
@section('content')
<div class="w-3/2 bg-white rounded-lg p-10 shadow-lg">
    <div class="w-1/8">
    <div class="text-2xl font-bold mb-6">Form Categories</div>
    <form action="{{ route('category.store') }}" method="POST" id="postForm" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Nama Category</label>
            <input type="text" autofocus required name="category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-red-500">
        </div>
        <button type="submit" class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:bg-red-600">Tambah</button>
    </form>
</div>
</div>
@endsection
@section('script')
@include('asset.js.SwitchAlerts.switchAlerts')
<script src="{{ asset('js/crud file script/scriptCrud.js') }}"></script>
@endsection
