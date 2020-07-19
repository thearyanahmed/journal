<nav class="mb-8 py-6">
    <div class="container mx-auto px-6 md:px-0">
        <div class="flex items-center justify-center">
            <div class="mr-6">
                <a href="{{ url('/') }}" class="flex text-lg font-normal text-sfh no-underline pointer">
                    <img src="{{ asset('images/logos/basic.png') }}" class="h-12 w-12">
                    <span class="self-center">
                                {{ config('app.name', "Aryan's den") }}
                            </span>
                </a>
            </div>
            <div class="flex-1 text-right">
                <a href="{{ route('categories.index') }}" class="text-sfh text-sm pr-4 pointer">Categories</a>
                <a href="#" class="text-sfh text-sm pr-4 pointer">thearyanahmed</a>

            @guest
                    <a class="no-underline hover:underline text-sfh text-sm p-3 pointer" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:underline text-sfh text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else

                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline text-sfh text-sm p-3 pointer"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
