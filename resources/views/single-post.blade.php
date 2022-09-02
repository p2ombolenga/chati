<x-app-layout>
 
    <div class="w-5/6 mx-auto px-4 py-2 my-5">
        <a href="/home" class="flex items-center justify-center gap-2 bg-sky-500 text-white px-5 py-3 rounded-lg border border-gray-200 focus:border-none focus:ring focus:ring-sky-200 hover:-translate-y-0.5 transform-gpu transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
              </svg>
              Back To Home
        </a>
    </div>

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
                <p>
                    {{$post->body}}
                </p>
            </div>
        @endif
        @if($post->image)
            <div class="mt-1">
                <img src="{{ asset($post->image) }}" class="w-full h-full object-cover">
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

            <a href="#" class="flex items-center space-x-1 px-4 py-1 md:px-8 md:py-1.5 bg-gray-200 rounded-full">
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
        <div class="mt-2">
            <form action="/home/post/comment/{{$post->id}}" method="post" class="group relative flex items-center">
                @csrf
              <img src="{{ asset(auth()->user()->profile_picture)}}" alt="" class="w-10 h-10 rounded-full object-cover absolute top-1/2 left-1 -mt-5 text-slate-400 pointer-events-none group-focus-within:text-blue-500" aria-hidden="true">
              <input type="text" name="body" id="body"  class="border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-full py-2.5 pl-12" aria-label="Leave a comment" placeholder="Leave a comment...">
                <button type="submit" class="flex items-center justify-center bg-sky-500 text-white px-2 py-2 mx-0.5 rounded-full border border-gray-200 focus:border-none focus:ring focus:ring-sky-200 hover:-translate-y-0.5 transform-gpu transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                      </svg>
                </button>
             </form>
        </div>
            @foreach ($post->comment as $comment)
                <div class="mt-2 flex w-full rounded-xl bg-gray-100 border border-gray-200 p-1">
                    <div class="w-0.5/12 md:w-1/12">
                        <img src="{{asset($comment->user->profile_picture)}}" class="w-10 h-10 object-cover rounded-full">
                    </div>
                    <div class="px-2 w-11/12">
                        <p class="text-gray-900 font-semibold"> {{$comment->user->username}} </p>
                        <p class="text-gray-600 font-semibold text-xs"> {{$comment->created_at->diffForHumans()}} </p>
                        <p class="text-sm"> {{$comment->body}} </p>
                        <div class="text-xs text-blue-400 font-semibold mt-2 space-x-4 px-2">
                            @if ($comment->user->id == auth()->id() || $post->user->id == auth()->id()) 
                                <a href="/home/post/comment/delete/{{$comment->id}}">Delete</a>
                            @endif
                            <button onclick="toggleReplyInput({{$comment->id}})" class="border-none text-xs text-blue-400 font-semibold px-2">Reply</button>
                            @if($comment->replies->count() > 0)
                            <button onclick="toggleReply({{$comment->id}})" class="border-none text-xs text-gray-500 font-semibold px-2">{{$comment->replies->count()}} {{ Str::plural('Reply',$comment->replies->count()) }}</button>
                            @endif
                            
                        </div>
                        <div class="hidden replyInput-{{$comment->id}} mt-2">
                            <form action="/home/comment/{{$comment->id}}/reply" method="post" class="group relative flex items-center">
                                @csrf
                              <img src="{{ asset(auth()->user()->profile_picture)}}" alt="" class="w-10 h-10 rounded-full object-cover absolute top-1/2 left-1 -mt-5 text-slate-400 pointer-events-none group-focus-within:text-blue-500" aria-hidden="true">
                              <input type="text" name="body" id="body"  class="border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-full py-2.5 pl-12" aria-label="Reply Here" placeholder="Reply Here...">
                                <button type="submit" class="flex items-center justify-center bg-sky-500 text-white px-2 py-2 mx-0.5 rounded-full border border-gray-200 focus:border-none focus:ring focus:ring-sky-200 hover:-translate-y-0.5 transform-gpu transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                      </svg>
                                </button>
                             </form>
                        </div>
                    </div>
                </div>
                <div class="hidden replies-{{$comment->id}}">
                    @if (!empty($comment->replies))
                        @foreach ($comment->replies as $reply)
                            <div class="mt-2 flex w-5/6 ml-auto rounded-xl bg-slate-100 border border-blue-200 p-1">
                                <div class="w-0.5/12 md:w-1.5/12">
                                    <img src="{{asset($reply->user->profile_picture)}}" class="w-10 h-10 object-cover rounded-full">
                                </div>
                                <div class="px-2 w-11/12">
                                    <p class="text-gray-900 font-semibold"> {{$reply->user->username}} </p>
                                    <p class="text-gray-600 font-semibold text-xs"> {{$reply->created_at->diffForHumans()}} </p>
                                    <p class="text-sm"> {{$reply->body}} </p>
                                    <div class="text-xs text-blue-400 font-semibold mt-2 space-x-4 px-2">
                                        @if ($reply->user->id == auth()->id() || $post->user->id == auth()->id()) 
                                            <a href="/home/comment/reply/{{$reply->id}}/delete">Delete</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
    </div>

</x-app-layout>