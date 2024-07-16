@extends('layouts.maintable')
@section('child-content')
    <div class="mb-4 flex justify-between items-center">
        <form method="GET" action="{{ route('sertifikat.search') }}" class="flex">
            @csrf
            <input type="text" id="search" name="search" placeholder="Search..." class="px-4 py-2 border rounded-lg">
        </form>
    </div>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Data Certificate</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-center dark:text-primary">No</th>
                            <th class="px-4 py-2 text-center dark:text-primary">Nama Sertifikat</th>
                            <th class="px-4 py-2 text-center dark:text-primary">Judul</th>
                            <th class="px-4 py-2 text-center dark:text-primary">Preview</th>
                            <th class="px-4 py-2 text-center dark:text-primary">Deskripsi</th>
                            <th class="px-4 py-2 text-center dark:text-primary">Action</th>
                        </tr>
                    </thead>
                    <tbody id="certificate-results">
                        @include('admin.sertifikat.partials.index', ['sertifikats' => $sertifikats])
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
@endsection

@section('script')
    <script src="{{ asset('js/modal file script/modal.js') }}"></script>
    <script src="{{ asset('js/ajax file script/ajax.js') }}"></script>
    @include('asset.js.SwitchAlerts.switchAlerts')
@endsection
