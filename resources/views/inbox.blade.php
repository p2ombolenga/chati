<x-app-layout>

<div class="min-h-screen bg-slate-100 border-slate-200 m-4 py-2 rounded-xl">
    @foreach( \App\Models\Message::all() as $message)
        @if(($message->sender_id == auth()->id() || $message->receiver_id == auth()->id()) && ($message->sender_id == $users->id || $message->receiver_id == $users->id))
            <div class="flex items-start mx-4 text-small mt-2 mb-8">
                <div class="">
                    <img src="{{$message->user->profile_picture}}" class="w-10 h-10 rounded-full object-coverphp ">
                </div>
                <div class="w-fit  bg-slate-300 border border-slate-200 rounded-2xl rounded-tl-none p-2">
                    <div class="text-gray-900 font-semibold text-xs"> {{$message->user->username}} </div>
                    <div>
                        {{$message->message}}
                    </div>
                @if($message->image)
                        <div class="border border-slate-300 p-1 ml-auto">
                            <img src="{{$message->image}}" class="w-40 h-40 object-cover rounded-lg">
                        </div>
                    @endif
                    <div class="text-xs font-semibold text-gray-500 text-right"> {{ $message->created_at->diffForHumans() }} </div>
                </div>
            </div>
        @endif
    @endforeach
     <div class="mt-2">
            <form action="" method="post" class="group relative flex items-center px-4 w-11/12 ml-auto">
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
</div>
</x-app-layout>