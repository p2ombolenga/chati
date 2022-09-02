<x-app-layout>
    <x-navigation/>
    @foreach($users as $user)
        @if($user->id != auth()->id())
                <div class="relative mx-auto max-w-2xl min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-40 mr-8">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full flex justify-center">
                                <div class="relative">
                                    <img src="{{$user->profile_picture}}" class="w-40 h-40 shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]"/>
                                </div>
                            </div>
                            <div class="w-full text-center mt-20">
                                <div class="flex justify-center lg:pt-4 pt-8 pb-0">
                                    <div class="p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">3,360</span>
                                        <span class="text-sm text-slate-400">Posts</span>
                                    </div>
                                    <div class="p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">2,454</span>
                                        <span class="text-sm text-slate-400">Followers</span>
                                    </div>

                                    <div class="p-3 text-center">
                                        <span class="text-xl font-bold block uppercase tracking-wide text-slate-700">564</span>
                                        <span class="text-sm text-slate-400">Following</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{$user->username}}</h3>
                            <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{$user->address}}
                            </div>
                        </div>
                        <div class="mt-6 py-6 border-t border-slate-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full px-4">
                                    <a href="javascript:;" class="font-normal text-slate-700 hover:text-slate-400">Follow Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
    @endforeach

</x-app-layout>