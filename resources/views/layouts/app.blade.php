<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'kabiri') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen w-full sm:w-2/3 md:w-1/2 bg-white mx-auto my-5 rounded-xl border border-gray-200">
           
            <header class="bg-gray-100 border border-gray-200 rounded-t-xl px-4 flex items-center space-x-6 text-sky-500 text-xl font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                  </svg>
                  Chati
            </header>
            <!-- Page Content -->
            <main class="mx-auto">
                {{ $slot }}                         
            </main>
        </div>
        <script defer>
            function toggleMenu(id){
                let menu = document.querySelector('.toggle-menu-'+id);
                menu.classList.toggle("hidden");
            }

            function toggleReplyInput(comment){
                let input = document.querySelector('.replyInput-'+comment);
                input.classList.toggle("hidden");
            }
            function toggleReply(comment){
                let replies = document.querySelector('.replies-'+comment);
                replies.classList.toggle("hidden");
            }
            function triggerProfile(){
                let button = document.querySelector('.profile-trigger');
                let menu = document.querySelector('.profile-trigger-view');
                menu.classList.toggle("hidden");
            }
        </script>
    </body>
</html>
