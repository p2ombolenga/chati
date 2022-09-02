<x-app-layout>
    <x-search-user/>
   <x-navigation/>
   
   <div class="min-h-screen m-4 py-2">
       

       @foreach ($users as $user)
       @if($user->id != auth()->id())
            <a href="/messages/{{$user->username}}">
                <div class="flex items-start mx-4 text-small my-2 bg-slate-100 border border-slate-300 p-2 rounded-xl">
                    <div class="">
                        @if($user->profile_picture != NULL)
                            <img src="{{$user->profile_picture}}" class="w-10 h-10 rounded-full object-cover">
                        @else   
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @endif
                    </div>
                    <div class="w-full p-2">
                        <div class="flex items-center justify-between text-gray-900 font-semibold text-xs mb-2">
                            <span>{{$user->username}}</span>
                            <span class="py-1 px-2 bg-green-500 text-white text-xs rounded-full">{{ $user->messages_count }}</span>
                        </div>
                            @foreach ($user->messages as $message)
                                @if($loop->last)
                                    <div class="w-full">
                                        {{$message->message}}
                                        <div class="flex items-center text-gray-400 gap-2">
                                            @if($message->image) 
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Message contains image
                                            @endif
                                        </div>  
                                    </div>
                                    <div class="text-xs font-semibold text-gray-500 text-right">{{ $message->created_at->diffForHumans() }}</div>
                                @endif
                            @endforeach
                    </div>
                </div>
            </a>
        @endif
        @endforeach

   </div>

    </x-app-layout>