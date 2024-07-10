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
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{ $project->url_project }}" class="group">
                    <img src="{{ asset('storage/' . $project->thumnail_project) }}" alt="Project Image"
                        class="w-full h-64 object-cover transform transition duration-500 group-hover:scale-110"">
                </a>
                <div class="p-5">
                    <h3 class="text-2xl font-bold mb-2">{{ $project->name_project }}</h3>
                    <div class="text-gray-700">{!! Str::words($project->description_project, 10) !!}</div>
                    <div class="flex space-x-2 justify-start mt-5">
                        <a href="{{ $project->url_project }}"
                            class="text-dark hover:text-white hover:bg-blue-700 font-semibold bg-blue-400 px-4 py-3 rounded-xl shadow-lg">
                            View
                        </a>
                        @if (Auth::user()->role == 'admin')
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
        <!-- Repeat for other projects -->
    @endsection
    @section('content-2')
    @section('form-title', 'Request Project!!')
    <!-- Contact Section -->
    <form action="{{ route('message.store') }}" method="post" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block font-bold mb-2">Your Name</label>
            <input type="text" id="name" name="name"
                class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"
                placeholder="Enter your name">
        </div>
        <div>
            <label for="email" class="block font-bold mb-2">Your Email</label>
            <input type="email" id="email" name="email"
                class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"
                placeholder="Enter your email">
        </div>
        <div>
            <label for="message" class="block font-bold mb-2">Your Message</label>
            <textarea name="message" id="message" rows="4"
                class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500"
                placeholder="Enter your message"></textarea>
        </div>
        <button type="submit"
            class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Submit</button>
    </form>
@endsection
