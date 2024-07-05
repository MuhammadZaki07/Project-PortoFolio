@extends('layouts.maintable')
@section('child-content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Data Certificate</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-center">No</th>
                            <th class="px-4 py-2 text-center">Nama Sertifikat</th>
                            <th class="px-4 py-2 text-center">Judul</th>
                            <th class="px-4 py-2 text-center">Preview</th>
                            <th class="px-4 py-2 text-center">Deskripsi</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sertifikats as $sertifikat)
                            <tr>
                                <td class="text-xs  px-2 py-1 text-center">{{ $loop->iteration }}</td>
                                <td class="text-xs  px-2 py-1 text-center">{{ Str::words($sertifikat->name_certificate,10) }}</td>
                                <td class="text-xs  px-2 py-1 text-center">{{ Str::words($sertifikat->title) }}</td>
                                <td class="text-xs  px-2 py-1 text-center">
                                    <img src="{{ asset('storage/' . $sertifikat->image) }}"
                                        class="w-20 h-15 mx-auto mt-2 rounded-lg shadow-dark">
                                </td>
                                <td class="text-xs  px-2 py-1 text-center">{!! Str::words( $sertifikat->description,1) !!}</td>
                                <td class="text-xs  px-2 py-1 text-center">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="" id="buttondetails" data-certificate-id="{{ $sertifikat->id }}"
                                            class="text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="{{ route('sertifikat.edit',$sertifikat->id) }}"
                                            class="text-dark hover:text-white hover:bg-orange-700 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                class="fas fa-edit"></i></a>
                                        <form id="delete-post" action="{{ route('sertifikat.destroy', $sertifikat->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="confirmDelete()" type="button"
                                                class="text-dark hover:text-white hover:bg-red-700 bg-red-600 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="hidden" id="modal">
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h3 class="text-xl font-semibold">Detail Sertifikat</h3>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="flex flex-col items-center">
                    <img id="certificateImage" src="" alt="Certificate Image"
                        class="w-full object-cover h-auto rounded-lg mb-4 shadow-md">
                    <h4 id="certificateName" class="text-lg font-bold mb-1"></h4>
                </div>
            </div>
        </div>
    </div>

@include('asset.js.assetAdmin.AssetJS')
@endsection
