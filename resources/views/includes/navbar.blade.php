  <div class="">
    <!-- Nav -->
    <div class="sticky top-0 z-50 flex justify-between py-5 px-4 lg:px-14 bg-white shadow-sm">
      <div class="flex gap-10 w-full">
        <!-- Logo dan Menu -->
        <div class="flex items-center justify-between w-full lg:w-auto">
          <!-- Logo -->
          <a href="{{ route('landing') }}">
            <div class="flex items-center gap-2">
              <img src="{{ asset('assets/img/Logo.png') }}" alt="Logo" class="w-8 lg:w-10">
              <p class="text-lg lg:text-xl font-bold">Newsly</p>
            </div>
          </a>
          <button class="lg:hidden text-primary text-2xl focus:outline-none" id="menu-toggle">
            ☰
          </button>
        </div>

        <!--Responsive Menu -->
        <script>
           document.addEventListener('DOMContentLoaded', function () {
           const toggle = document.getElementById('menu-toggle');
           const menu = document.getElementById('menu');

           toggle.addEventListener('click', function () {
           menu.classList.toggle('hidden');

           toggle.textContent = menu.classList.contains('hidden')
                ? '☰'
                : '✕';
           });
         });
        </script>

        <!-- Menu Navigasi -->
        <div id="menu"
        class="hidden w-full lg:flex lg:w-auto lg:items-center lg:gap-10">
          <ul
          class="flex flex-col items-start gap-4 pt-5 font-medium text-base lg:flex-row lg:items-center lg:gap-10 lg:pt-0 ">
            <li><a href="{{ route('landing') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>

            @foreach (\App\Models\NewsCategory::all() as $category)
               <li>
                   <a href="{{ route('news.category', $category->slug) }}" class="{{ request()->is('category/' . $category->slug) ? 'active' : '' }}">{{ $category->title }}</a>
               </li>
            @endforeach
          </ul>
        </div>
      </div>

      <!-- CSS Navbar -->
       <style>
        #menu ul li a {
        transition: color 0.2s ease;
        }

        #menu ul li a:hover,
        #menu ul li a.active {
        background: linear-gradient(to right, #c4b5fd, #f9a8d4);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        }

        #menu ul li a:hover,
        #menu ul li a.active {
        background: linear-gradient(to right, #c4b5fd, #f9a8d4);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        }
       </style>

      <!-- Search dan Login -->
      <div class="hidden lg:flex items-center gap-2 mt-4 lg:mt-0 w-full lg:w-auto relative">
        <div class="relative w-full lg:w-auto">
             <form action="{{ route('news.index') }}" method="GET" class="relative w-full lg:w-auto">
                 <input
                    type="text"
                    name="search"
                    placeholder="Cari berita..."
                    value="{{ request('search') }}"
                    style="padding-left: 50px;"
                    class="w-full lg:w-64 pl-14 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm lg:text-base">
                 <span class="absolute left-3 pointer-events-none" style="top: 13px;">
                      <img src="{{ asset('assets/img/search.png') }}" alt="" class="w-4 h-4">
                  </span>
              </form>
          </div>
        <a href="{{ route('login') }}"
          class="bg-primary px-8 py-2 rounded-full text-white font-semibold h-fit text-sm lg:text-base" style="background: linear-gradient(to right, #c4b5fd, #f9a8d4);">
          Masuk
        </a>
      </div>
    </div>