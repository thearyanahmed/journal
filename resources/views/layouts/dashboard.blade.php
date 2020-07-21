@extends('layouts.base')

@section('body')
    <!-- component -->
    <div class="h-full w-full flex overflow-hidden overflow-y-scroll">
        <nav class="flex flex-col h-screen bg-gray-200 dark:bg-gray-900 w-64 px-12 pt-4 pb-6">
            <!-- SideNavBar -->
            <div class="mt-8">
                <!-- User info -->
                <span class="mt-4 text-xl dark:text-gray-300 font-normal capitalize">
                    {{ auth()->user()->name }}
                </span>
            </div>

            <ul class="mt-2 text-gray-600">
                <!-- Links -->
                <li class="mt-8">
                    <a href="{{ route('articles.index') }}" class="flex">
                        <span class="ml-2 capitalize font-medium text-black
						dark:text-gray-300">
						articles
					</span>
                    </a>
                </li>
            </ul>

            <div class="mt-auto flex items-center">
                <!-- important action -->
                <a href="#logout" class="flex items-center">
                    <svg class="fill-current h-5 w-5" viewBox="0 0 24 24">
                        <path
                            d="M16 17v-3H9v-4h7V7l5 5-5 5M14 2a2 2 0 012
						2v2h-2V4H5v16h9v-2h2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V4a2 2
						0 012-2h9z"></path>
                    </svg>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                       class="ml-2 capitalize font-normal">log out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </a>
            </div>
        </nav>

        <div class="px-10 w-full">
            @yield('content')
        </div>
    </div>
@endsection
