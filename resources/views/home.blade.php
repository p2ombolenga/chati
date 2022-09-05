<x-app-layout>
    <x-search-post/>
    <x-navigation/>

    @if(session('status'))
        <div class="p-2 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl text-center text-red-500 text-sm font-semibold my-3">
            {{session('status')}}
        </div>
    @endif
    @if(session('success'))
        <div class="p-2 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl text-center text-green-400 text-sm font-semibold my-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="w-5/6 mx-auto mt-5 rounded-xl border border-gray-200 px-2 pb-2">
        <form action="/home/post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center space-x-2">
                <div class="">
                    <img src="{{ asset(auth()->user()->profile_picture) }}" class="w-20 h-20 object-cover rounded-xl">                
                </div>
                <div class="flex items-center space-x-2 w-4/5">
                    <textarea name="body" id="body" placeholder="Create a new post" cols="30" class="w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100 my-5 mx-auto"></textarea>
                    <div class="flex items-center w-6 h-6"> 
                        <input type="file" name="image" id="image" class="border-none absolute w-6 h-6 opacity-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>  
            </div>
            <div class="w-full flex items-center justify-end space-x-12">
                @error('image')
                    <p class="text-xs text-red-400">{{ $message }}</p>
                @enderror
                <button class="bg-sky-500 text-white px-5 py-3 rounded-lg border border-gray-200 focus:border-none focus:ring focus:ring-sky-200 hover:-translate-y-0.5 transform-gpu transition-all duration-300">Post</button>
            </div>
        </form>
    </div>

    @forelse ($posts as $post)
        <div class="w-5/6 mx-auto px-4 py-2 border border-gray-300 my-5 rounded-xl">
            <div class="flex items-center">
                <div class=""> <img src="{{ asset($post->user->profile_picture) }}" class="w-10 h-10 object-cover rounded-full"> </div>
                <div class="flex-auto flex justify-between items-start">
                    <div class="px-2 text-gray-900">
                        <a href="" class="block text-md font-semibold"> {{$post->user->username}} </a>
                        <span class="block text-xs"> posted {{$post->created_at->diffForHumans()}} </span>
                    </div>
                    <div class="w-20 flex justify-end">
                        <button onclick="toggleMenu({{$post->id}})" class="menu-button flex items-start justify-center rounded-full hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                        </button>
                        <div class="hidden toggle-menu-{{$post->id}} w-20 mt-8 bg-gray-200 absolute">
                            @if(auth()->id() == $post->user->id)
                                <a href="/home/delete/{{$post->id}}" class="flex items-center gap-1 px-2 py-1 text-gray-700 hover:bg-sky-600 hover:text-white text-xs font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </a>
                            @endif
                            <a href="" class="flex items-center gap-1 px-2 py-1 text-gray-700 hover:bg-sky-600 hover:text-white text-xs font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                Report
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @if($post->body)
                <div class="mt-2">
                    <a href="/home/post/{{$post->id}}/comments">
                        <p>
                            {{$post->body}}
                        </p>
                    </a>
                </div>
            @endif
            @if($post->image)
                <div class="mt-1">
                    <a href="/home/post/{{$post->id}}/comments">
                        <img src="{{ asset($post->image) }}" class="w-full h-full object-cover">
                    </a>
                </div>
            @endif
            <div class="flex items-center space-x-5 mt-4 text-gray-500">
                @if(!$post->likedBy(auth()->user()))
                    <form action="/home/{{$post->id}}/like" method="post">
                        @csrf
                        <button type="submit" class="flex items-center space-x-1 px-4 py-1 md:px-8 md:py-1.5 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                            </svg> 
                            <span class="text-xs border-none">
                                @if($post->likes->count())
                                    {{$post->likes->count()}}
                                @endif                       
                            </span>
                        </button>
                    </form>
                @else
                    <form action="/home/{{$post->id}}/like" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center space-x-1 px-4 py-1 md:px-8 md:py-1.5 bg-gray-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                            </svg> 
                            <span class="text-xs border-none">
                                @if($post->likes->count())
                                    {{$post->likes->count()}}
                                @endif
                            </span>
                        </button>
                    </form>
                @endif

                <a href="/home/post/{{$post->id}}/comments" class="flex items-center space-x-1 px-4 py-1 md:px-8 md:py-1.5 bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 @if($post->comment->count() > 0) text-blue-400 font-semibold @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span class="text-xs border-none">{{$post->comment->count()}}</span>
                </a>
                
                <a href="" class="flex items-center space-x-1 px-4 py-1 md:px-8 md:py-1.5 bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                    <span class="text-xs border-none">Share</span>
                </a>
            </div>
        </div>
    @empty
    <div class="m-2 lg:px-8 p-4 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl text-center text-gray-900 text-lg font-semibold mt-12">
        @if(!request('search'))
            No post available
        @else
            <p class="relative">No results for <span class="bg-blue-400 text-blue-50 px-2"> {{ request('search') }} </span></p>
        @endif
    </div>
    @endforelse
</x-app-layout>