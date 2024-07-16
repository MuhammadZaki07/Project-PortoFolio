@extends('layouts.maintable')
@section('child-content')
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Data Category</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-center dark:text-primary">No</th>
                            <th class="px-4 py-2 text-center dark:text-primary">Category</th>
                            <th class="px-4 py-2 text-center dark:text-primary">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $categori)
                            <tr>
                                <td class="text-xs  px-2 py-1 text-center">{{ $loop->iteration }}</td>
                                <td class="text-xs  px-2 py-1 text-center">{{ $categori->name_category }}</td>
                                <td class="text-xs  px-2 py-1 text-center">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('category.edit',$categori->id_category) }}"
                                            class="text-dark hover:text-white hover:bg-orange-700 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                class="fas fa-edit"></i></a>
                                        <form id="delete-post" action="{{ route('category.destroy', $categori->id_category) }}"
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
@endsection
@section('script')
@include('asset.js.SwitchAlerts.switchAlerts')
<script src="{{ asset('js/modal file script/modal.js') }}"></script>
@endsection
