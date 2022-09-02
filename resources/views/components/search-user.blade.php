<div class="w-5/6 mx-auto  px-6 my-5 rounded-xl">
    <form action="#" method="GET" class="group relative">
        @csrf
      <svg width="20" height="20" fill="currentColor" class="absolute left-3 top-1/2 -mt-2.5 text-slate-400 pointer-events-none group-focus-within:text-blue-500" aria-hidden="true">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
      </svg>
      <input type="text" name="search" id="search" value="{{request('search')}}"  class="border border-gray-200 focus:border-gray-200 focus:ring focus:ring-sky-100 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm" aria-label="Search User" placeholder="Search User...">
    </form>
</div>