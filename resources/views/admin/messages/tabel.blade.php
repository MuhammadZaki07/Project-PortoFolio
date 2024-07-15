@extends('layouts.maintable')
@section('child-content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Data Messages</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-center">No</th>
                            <th class="px-4 py-2 text-center">From</th>
                            <th class="px-4 py-2 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                            <tr>
                                <td class="text-xs  px-2 py-1 text-center">{{ $loop->iteration }}</td>
                                <td class="text-xs  px-2 py-1 text-center">{{ $message->email }}</td>
                                <td class="text-xs  px-2 py-1 text-center">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('message.view',$message->id) }}"
                                            class="text-dark hover:text-white hover:bg-orange-700 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                class="fas fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
@include('asset.js.SwitchAlerts.switchAlerts')
<script src="{{ asset('js/modal file script/modal.js') }}"></script>
@endsection
