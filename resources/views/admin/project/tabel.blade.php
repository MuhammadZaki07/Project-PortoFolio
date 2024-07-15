@extends('layouts.maintable')
@section('child-content')
<div class="mb-4 flex justify-between items-center">
    <form method="GET" action="{{ route('search.project') }}" class="flex">
        @csrf
        <input type="text" id="search" name="search" placeholder="Search..." class="px-4 py-2 border rounded-lg">
    </form>
</div>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Data Project</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-center">No</th>
                            <th class="py-3 text-center">Nama Project</th>
                            <th class="px-4 py-2 text-center">Url</th>
                            <th class="px-4 py-2 text-center">Thumnail</th>
                            <th class="px-4 py-2 text-center">Category</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="project-results">
                        @include('admin.project.partials.index',["projects"=> $projects])
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('asset.js.SwitchAlerts.switchAlerts')
    <script src="{{ asset('js/ajax file script/ajax.js') }}"></script>
@endsection
