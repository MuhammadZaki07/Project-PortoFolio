@extends('layouts.maintable')

@section('child-content')
<div class="mb-4 flex justify-between items-center">
    <form id="search-form" method="GET" action="{{ route('posts.search') }}" class="flex">
        @csrf
        <input type="text" id="search" name="search" placeholder="Search..." class="px-4 py-2 border rounded-lg">
    </form>
</div>
<div class="container mx-auto p-4">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Data Post</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-center dark:text-primary">No</th>
                        <th class="px-4 py-2 text-center dark:text-primary">Title</th>
                        <th class="px-4 py-2 text-center dark:text-primary">Image</th>
                        <th class="px-4 py-2 text-center dark:text-primary">Categories</th>
                        <th class="px-4 py-2 text-center dark:text-primary">Action</th>
                    </tr>
                </thead>
                <tbody id="post-results">
                    @include('admin.post.partials.posts', ['posts' => $posts])
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
