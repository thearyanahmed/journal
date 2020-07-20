@extends('layouts.dashboard')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @include('partials.flash-notification')

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="flex justify-between font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    <div>
                        /Articles
                    </div>
                    <div>
                        <a href="{{ route('articles.create') }}">
                            Write a new one
                        </a>
                    </div>
                </div>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        You are logged in!
                    </p>
                </div>
            </div>

            @foreach($articles as $article)
                <div class="flex break-words bg-white border border-2 mt-5 p-2 rounded shadow-md">
                    <div class=" flex flex-col self-center p-2">
                        <span class="font-semibold text-5xl">{{ $article->created_at->format('d') }}</span>
                        <p>{{ $article->created_at->format('M y')  }}</p>
                    </div>
                    <div class="flex flex-col p-2">
                        <a href="{{ route('articles.read',$article->slug)  }}" class="text-2xl pointer text-sfh">{{ $article->name  }}</a>
                        <p class="py-2 text-gray-700">{{ $article->excerpt  }}</p>
                    </div>
                </div>
            @endforeach

            @if(count($articles) > 0)
                <div class="mt-5">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
