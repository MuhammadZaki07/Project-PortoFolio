@if($posts->isNotEmpty())
    @foreach($posts as $post)
        <tr>
            <td class="text-xs  px-2 py-1 text-center">{{ $loop->iteration }}</td>
            <td class="text-xs px-2 py-1 text-center">{{ Str::words($post->title,10) }}</td>
            <td class="px-2 py-1 text-center">
                <img src="{{ asset('storage/' . $post->image) }}" class="w-20 h-15 mx-auto mt-2 rounded-lg shadow-dark">
            </td>
            <td class="text-xs px-2 py-1 text-center">{{ $post->category->name_category }}</td>
            <td class="text-xs px-2 py-1 text-center">
                <div class="flex space-x-2 justify-center">
                    <a href="{{ route('post.show', $post->slug) }}" class="text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('post.edit',$post->id) }}" class="text-dark hover:text-white hover:bg-orange-700 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i class="fas fa-edit"></i></a>
                    <form id="delete-post" action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="confirmDelete()" type="button" class="text-dark hover:text-white hover:bg-red-700 bg-red-600 px-4 py-3 rounded-xl shadow-lg"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
@else
<tr>
    <td colspan="7" class="text-center py-4">
        <img src="{{ asset('dist/img/svg/postNull.svg') }}"  class="mx-auto" alt="....">
        <span class="font-bold text-2xl">No Post found</span>
    </td>
</tr>
@endif
