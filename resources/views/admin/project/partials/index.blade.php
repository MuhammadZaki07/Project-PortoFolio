@if ($projects->isNotEmpty())
@foreach ($projects as $project)
    <tr>
        <td class="text-xs  px-2 py-1 text-center">{{ $loop->iteration }}</td>
        <td class="text-xs  px-2 py-1 text-center">{{ Str::words($project->name_project, 10) }}</td>
        <td class="text-xs  px-2 py-1 text-center truncate-text">
            <a href="{{ $project->url_project }}" target="_blank" class="text-blue-500 underline block cursor-pointer">
                {{ Str::limit($project->url_project, 8, '...') }}
            </a>
        </td>
        <td class="text-xs  px-2 py-1 text-center">
            <img src="{{ asset('storage/' . $project->thumnail_project) }}"
                class="w-15 h-10 mx-auto rounded-lg shadow-lg">
        </td>
        <td class="text-xs  px-2 py-1 text-center">
            {{ $project->category->name_category }}
        </td>
        <td class="text-xs  px-2 py-1 text-center">

            <div class="flex space-x-2 justify-center">
                <a href="{{ $project->url_project }}" target="_blank"
                    class="text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
                        class="fas fa-eye"></i></a>
                <a href="{{ route('project.edit', $project->id) }}"
                    class="text-dark hover:text-white hover:bg-orange-600 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i
                        class="fas fa-edit"></i></a>
                <form id="delete-post" action="{{ route('project.destroy', $project->id) }}" method="post">
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
@else
<tr>
    <td colspan="7" class="text-center py-4">
        <img src="{{ asset('dist/img/svg/postNull.svg') }}"  class="mx-auto" alt="....">
        <span class="font-bold text-2xl">No certificate found</span>
    </td>
</tr>
@endif
