<x-app-layout>
  
    <div class="m-2 lg:px-8 p-4 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl mt-12">
            <a href="/login" class="flex items-center justify-center gap-2 bg-sky-500 text-white mt-5 px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-none focus:ring focus:ring-sky-200 hover:-translate-y-0.5 transform-gpu transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
              </svg>
                Back To Login
          </a>
    </div>

    <div class="m-2 lg:px-8 p-4 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl text-center text-gray-900 text-lg font-semibold mt-12">
          Set up a new account
    </div>
    <div class="m-2 lg:px-8 p-4 w-full  sm:w-2/3 mx-auto border border-gray-200 rounded-xl mt-2">
        <form action="" method="post">
            @csrf
            <label for="name">Names</label>
            <input type="text" name="name" id="name" placeholder="Enter your Names" value="{{ old('name') }}" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('name')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your Username" value="{{ old('username') }}" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('username')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter your Email" value="{{ old('email') }}" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('email')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone Number" value="{{ old('phone') }}" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('phone')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="gender">Gender</label>
            <select name="gender" id="" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
            @error('gender')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" value="{{ old('dob') }}" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('dob')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Enter your Address" value="{{ old('address') }}" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('address')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your Password" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            @error('password')
                <p class="text-red-400 text-xs"> {{$message}} </p>
            @enderror
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Your Password" class="px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100">
            <button class="flex items-center justify-center gap-2 bg-sky-500 text-white mt-5 px-4 py-2 w-full rounded-lg border border-gray-200 focus:border-none focus:ring focus:ring-sky-200 hover:-translate-y-0.5 transform-gpu transition-all duration-300">
                Create an account
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                  </svg>
            </button>
        </form>
    </div>

</x-app-layout>