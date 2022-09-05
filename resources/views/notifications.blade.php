<x-app-layout>
    <x-navigation/>

    @forelse($notifications as $notification)
    @if(($notification->post->user->id != auth()->id()) && ($notification->post->user->id == $notification->user_id))
        <div class="flex items-start mx-4 text-small my-2 bg-slate-100 border border-slate-300 p-2 rounded-xl">
            <div class="w-full p-2">
                <div class="w-full">
                            <a href="" class="text-gray-900">{{$notification->user->username}}</a> {{$notification->notification}} <a href="home/post/{{$notification->post->id}}/comments" class="text-blue-400 text-underline">view</a>
                </div>
                <div class="text-xs font-semibold text-gray-500 text-right">
                    {{$notification->created_at->diffForHumans()}}
                </div>
            </div>
        </div>
        @endif
    @empty
        <div class="text-center text-gray-900 mt-5">No Notifications available</div>
    @endforelse
</x-app-layout>