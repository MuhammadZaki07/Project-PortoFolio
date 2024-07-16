    @extends('page_blog_project.main')
    @section('title', 'Project')
    @section('text-title', 'My Project')
    @section('content-1')
        <!-- Projects Section -->
    @section('img-null')
        @if ($projects->isEmpty())
            <div class="mx-auto">
                <img src="{{ asset('dist/img/svg/Project.svg') }}" alt="Empty Projects" class="svg-image mx-auto mb-4">
                <h1 class="font-bold text-slate-500 text-4xl text-center sm:text-2xl">Tidak ada Project saat ini</h1>
            </div>
        @endif
    @endsection
    @foreach ($projects as $project)
        <div
            class="max-w-sm bg-white border border-gray-200 mx-auto rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ $project->url_project }}" class="group">
                <img src="{{ asset('storage/' . $project->thumnail_project) }}" alt="Project Image"
                    class="w-full h-64 object-cover transform transition duration-500 group-hover:scale-110 hover:shadow-xl hover:rounded-lg">
            </a>
            <div class="p-5">
                <h3 class="text-2xl font-bold mb-2 dark:text-primary">{{ $project->name_project }}</h3>
                <h3 class="text-xs font-semibold text-slate-400 mb-2">Category : {{ $project->category->name_category }}
                </h3>
                <div class="text-gray-700 dark:text-white">{!! Str::words($project->description_project, 10) !!}</div>
                <div class="flex space-x-2 justify-start mt-5">
                    <a href="{{ $project->url_project }}"
                        class="text-dark hover:text-white hover:bg-blue-700 font-semibold bg-blue-400 px-4 py-3 rounded-xl shadow-lg">
                        View
                    </a>
                    @if (Auth::user()?->role == 'admin')
                        <a href="{{ route('project.edit', $project->id) }}"
                            class="text-dark hover:text-white hover:bg-orange-600 bg-orange-400 px-4 py-3 rounded-xl shadow-lg"><i
                                class="fas fa-edit"></i></a>
                        <form id="delete-post" action="{{ route('project.destroy2', $project->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="confirmDelete()" type="button"
                                class="text-dark hover:text-white hover:bg-red-700 bg-red-600 px-4 py-3 rounded-xl shadow-lg"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('pagination')
<div class="flex justify-center mt-14">
    @if ($projects->hasPages())
        <nav>
            <ul class="flex space-x-1">
                <!-- Previous Page Link -->
                @if ($projects->onFirstPage())
                    <li aria-disabled="true" class="hidden">
                        <span class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out" aria-label="Previous">
                            <span class="material-icons text-sm">keyboard_arrow_left</span>
                        </span>
                    </li>
                @else
                    <li>
                        <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300" href="{{ $projects->previousPageUrl() }}" aria-label="Previous">
                            <span class="material-icons text-sm">keyboard_arrow_left</span>
                        </a>
                    </li>
                @endif

                <!-- Pagination Elements -->
                @foreach ($projects->links()->elements as $element)
                    <!-- "Three Dots" Separator -->
                    @if (is_string($element))
                        <li aria-disabled="true">
                            <span class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out">{{ $element }}</span>
                        </li>
                    @endif

                    <!-- Array Of Links -->
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $projects->currentPage())
                                <li aria-current="page">
                                    <span class="mx-1 flex h-9 w-9 items-center justify-center rounded-full bg-red-500 p-0 text-sm text-white dark:text-primary dark:bg-primary shadow-md transition duration-150 ease-in-out">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300" href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                <!-- Next Page Link -->
                @if ($projects->hasMorePages())
                    <li>
                        <a class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out hover:bg-light-300" href="{{ $projects->nextPageUrl() }}" aria-label="Next">
                            <span class="material-icons text-sm">keyboard_arrow_right</span>
                        </a>
                    </li>
                @else
                    <li aria-disabled="true">
                        <span class="mx-1 flex h-9 w-9 items-center justify-center rounded-full border border-blue-gray-100 bg-transparent p-0 text-sm text-blue-gray-500 transition duration-150 ease-in-out" aria-label="Next">
                            <span class="material-icons text-sm">keyboard_arrow_right</span>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @endif
</div>
@endsection
@section('content-2')
    @section('form-title', 'Request Project!!')
    <!-- Contact Section -->
    <form action="{{ route('message.store') }}" method="post" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block font-bold mb-2 dark:text-primary">Your Name</label>
            <input type="text" id="name" name="name"
                class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-primary"
                placeholder="Enter your name">
        </div>
        <div>
            <label for="email" class="block font-bold mb-2 dark:text-primary">Your Email</label>
            <input type="email" id="email" name="email"
                class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-primary"
                placeholder="Enter your email">
        </div>
        <div>
            <label for="message" class="block font-bold mb-2 dark:text-primary">Your Message</label>
            <textarea name="message" id="message" rows="4"
                class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500 dark:focus:border-primary"
                placeholder="Enter your message"></textarea>
        </div>
        <button type="submit"
            class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300 dark:bg-primary">Submit</button>
    </form>
@endsection
