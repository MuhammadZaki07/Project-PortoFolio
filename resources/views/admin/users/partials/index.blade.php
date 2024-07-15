@if ($users->isNotEmpty())
@foreach ($users as $user)
    <tr>
        <td class="text-xs px-2 py-1 text-center">{{ $loop->iteration }}</td>
        <td class="text-xs px-2 py-1 text-center">
            <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('dist/img/iconsUsers.jpg') }}"
                alt="Avatar" class="rounded-full h-10 w-10 border border-red-500 mr-2">
        </td>
        <td class="text-xs px-2 py-1">{{ $user->name }}
            @if ($user->isAdmin())
                <i class="bi bi-patch-check-fill text-sm text-blue-500"></i>
            @endif
        </td>
        <td class="text-xs px-2 py-1">{{ $user->email }}</td>
        <td class="text-xs px-2 py-1">{{ $user->school }}</td>
        <td class="text-xs px-2 py-1 text-center">
            @if ($user->role == 'admin')
                <span class="w-10 h-5 bg-green-500 px-2 py-1 shadow-lg text-sm text-white rounded-lg">
                    {{ $user->role }}
                </span>
            @else
                <span class="w-10 h-5 bg-red-500 px-2 py-1 shadow-lg text-sm text-white rounded-lg">
                    {{ $user->role }}
                </span>
            @endif
        </td>
        <td class="text-xs px-2 py-1 text-center">
            <div class="flex space-x-2">
                @if ($user->role == 'admin')
                    <a href="#" data-user-id="{{ $user->id }}"
                        class="viewUserBtn text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
                            class="fas fa-eye"></i></a>
                    <a href="{{ route('Users.edit', $user->id) }}"
                        class="text-dark hover:text-white bg-orange-400 hover:bg-orange-700 px-4 py-3 rounded-xl shadow-lg"><i
                            class="fas fa-edit"></i></a>
                @else
                    <a href="#" data-user-id="{{ $user->id }}"
                        class="viewUserBtn text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
                            class="fas fa-eye"></i></a>
                    <a href="{{ route('Users.edit', $user->id) }}"
                        class="text-dark hover:text-white bg-orange-400 hover:bg-orange-700 px-4 py-3 rounded-xl shadow-lg"><i
                            class="fas fa-edit"></i></a>
                    <form id="delete-post" action="{{ route('Users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="confirmDelete()" type="button"
                            class="text-dark hover:text-white bg-red-600 px-4 hover:bg-red-700 py-3 rounded-xl shadow-lg"><i
                                class="fas fa-trash"></i></button>
                    </form>
                @endif
            </div>
        </td>
    </tr>
@endforeach
@else
<tr>
    <td colspan="7" class="text-center py-4">
        <img src="{{ asset('dist/img/svg/postNull.svg') }}"  class="mx-auto" alt="....">
        <span class="font-bold text-2xl">No Users found</span>
    </td>
</tr>
@endif
