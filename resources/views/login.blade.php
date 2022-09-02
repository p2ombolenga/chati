<x-app-layout>
    @if(session('status'))
        <div class="m-2 lg:px-8 p-4 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl text-center text-red-500 text-lg font-semibold mt-32">
            <p class=" px-5"> {{ session('status') }} </p>
        </div>
    @endif

    <div class="m-2 lg:px-8 p-4 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl @if(session('status')) mt-5 @endif mt-32">
        <form action="" method="post">
            @csrf
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your Username" value="{{ old('username')}}" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('username')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your Password" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('password')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <button class="flex items-center justify-center gap-2 bg-sky-500 text-white mt-5 px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-none focus:ring focus:ring-sky-200 hover:-translate-y-0.5 transform-gpu transition-all duration-300">
                Login
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                  </svg>
            </button>
        </form>
    </div>
    <div class="m-2 lg:px-8 p-4 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl mt-2">
        <a href="/register" class="flex items-center justify-center gap-2 bg-sky-500 text-white mt-5 px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-none focus:ring focus:ring-sky-200 hover:-translate-y-0.5 transform-gpu transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
          Create an account
      </a>
    </div>

</x-app-layout>