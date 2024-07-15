@if ($sertifikats->isNotEmpty())
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
            <a href="" data-certificate-id="{{ $sertifikat->id }}"
                class="buttondetails text-dark hover:text-white hover:bg-blue-700 bg-blue-400 px-4 py-3 rounded-xl shadow-lg"><i
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
@else
<tr>
    <td colspan="7" class="text-center py-4">
        <img src="{{ asset('dist/img/svg/postNull.svg') }}"  class="mx-auto" alt="....">
        <span class="font-bold text-2xl">No Certificate found</span>
    </td>
</tr>
@endif
