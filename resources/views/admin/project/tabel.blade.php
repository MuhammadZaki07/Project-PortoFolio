@extends('layouts.maintable')
@section('child-content')
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
                            <th class="px-4 py-2 text-center">Deskripsi</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($projects as $project)
                            <tr>
                                <td class="text-xs  px-2 py-1 text-center">{{ $loop->iteration }}</td>
                                <td class="text-xs  px-2 py-1 text-center">{{ Str::words($project->name_project,10) }}</td>
                                <td class="text-xs  px-2 py-1 text-center truncate-text">
                                    <a href="{{ $project->link_project }}" target="_blank" class="text-blue-500 underline block cursor-pointer">
                                        {{ Str::limit($project->link_project, 7,'...') }}
                                    </a>
                                </td>
                                <td class="text-xs  px-2 py-1 text-center">
                                    <img src="{{ asset('storage/' . $project->thumnail_project) }}"
                                        class="w-15 h-10 mx-auto rounded-lg shadow-lg">
                                </td>
                                <td class="text-xs  px-2 py-1 text-center">
                                    {!! Str::words( $project->description_project,1) !!}
                                </td>
                                <td class="text-xs  px-2 py-1 text-center">

                                        <div class="flex space-x-2 justify-center">
                                            <a href="{{ $project->link_project }}" target="_blank"
                                                class="text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('project.edit', $project->id) }}"
                                                class="text-dark hover:text-white hover:bg-orange-600 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i
                                                    class="fas fa-edit"></i></a>
                                            <form id="delete-post" action="{{ route('project.destroy', $project->id) }}"
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
    @include('asset.js.assetAdmin.AssetJS')
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-post').submit();
                }
            });
        }
    </script>
@endsection
