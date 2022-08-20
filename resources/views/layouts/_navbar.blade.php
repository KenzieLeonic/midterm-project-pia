<nav class="font-mono bg-[#006C67] border-gray-200 px-2 sm:px-4 py-2.5">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="{{ url('/') }}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap font-mono text-white">ระบบรับร้องเรียนในมหาวิทยาลัย</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0 text-white">
                @auth
                    <li>
                        {{ Auth::user()->name }}
                    </li>
                    <li>
                        <a href="{{ route('posts.index') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'posts.index') current-page @endif" >
                            Posts
                        </a>
                    </li>
                    @can('create', \App\Models\Post::class)
                        <li>
                            <a href="{{ route('posts.create') }}"
                               class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'posts.create') current-page @endif">
                                แจ้งปัญหา
                            </a>
                        </li>
                    @endcan
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link class="text-white block py-2 pr-4 pl-3 rounded md:p-0.5 hover:bg-[#B3BA1E]" :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ออกจากระบบ') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'login') current-page @endif" >
                            เข้าสู่ระบบ
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                           class="block py-2 pr-4 pl-3 rounded md:p-0 hover:underline @if(Route::currentRouteName() === 'register') current-page @endif" >
                            ลงทะเบียน
                        </a>
                    </li> 
                @endauth
            </ul>
        </div>
    </div>
</nav>

