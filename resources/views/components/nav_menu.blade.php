<nav class="w-screen bg-teal-500 text-teal-50 font-bold">
    <div class="hidden md:flex  justify-around p-4">
        <div class="flex items-center space-x-4 ">
            <div class="">
                <a href="/" class="px-4 py-2  hover:bg-teal-700  rounded @if (Request::path() == '/') bg-teal-700 @endif">Home</a>
            </div>
            <div class="">
                <a href="" class="px-4 py-2 hover:bg-teal-700  rounded :active()->routeIs('') ">Category</a>
            </div>
            <div class="">
                <a href="" class="px-4 py-2 hover:bg-teal-700  rounded @if (Request::path() == '') bg-teal-700 @endif">Link 3</a>
            </div>
        </div>
        <div class="flex items-center space-x-3">
            @guest
            <div class="">
                
                <a href="/signin" class="px-4 py-2 hover:bg-teal-700  rounded @if (Request::path() == '/signin') bg-teal-700 @endif">Login</a>
            </div>
            <div class="">
                <a href="/signup" class="px-4 py-2 bg-teal-300 text-teal-50 hover:bg-teal-700 rounded">Register</a>
            </div>
            @else
            
            <div class="">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="px-4 py-2 text-teal-50 hover:bg-teal-700 rounded">Logout</button>
                </form>
            </div>
            @endguest
        </div>

    </div>  
    <div class="md:hidden flex justify-end p-2">
         <button class="mobile-menu-btn bg-teal-800 text-teal-50 px-4 py-2 rounded hover:bg-teal-900 transition:easy-in-out ">Menu</button>
    </div>
    </nav>
    <div class="mobile-menu hidden w-fit bg-teal-300 text-teal-50 px-2 py-5 rounded space-y-5 md:hidden">
        <div class="space-y-3">
            <div class="@if (Request::path() == '/') px-4 py-2 bg-teal-700  rounded @endif"><a href="/" class="w-full px-4 py-2 hover:bg-teal-700  rounded">Home</a></div>
            <div class="@if (Request::path() == '') px-4 py-2 bg-teal-700  rounded @endif"><a href="" class="w-full px-4 py-2 hover:bg-teal-700  rounded">Link 2</a></div>
            div
            <div class="@if (Request::path() == '') px-4 py-2 bg-teal-700  rounded @endif"><a href="" class="w-full px-4 py-2 hover:bg-teal-700  rounded">Link 3</a></div>
        </div>
        @guest
        <div class="">
            <div class="@if (Request::path() == '/signin') px-4 py-2 bg-teal-700  rounded @endif"><a href="/signin" class="px-4 py-2 hover:bg-teal-700  rounded">Login</a></div>
        </div>
        <div class="">
            <div><a href="/signup" class="px-4 py-2 border border-teal-600 hover:bg-teal-700  rounded">Register</a></div>
        </div>
        @else
        <div class="">
            <div><a href="/logout" class="px-4 py-2 border border-teal-600 hover:bg-teal-700  rounded">Logout</a></div>
        </div>
        @endguest


    </div>
    <script>
        const btn = document.querySelector('.mobile-menu-btn');
        const menu = document.querySelector('.mobile-menu');
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
