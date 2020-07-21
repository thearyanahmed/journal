@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <!-- xs,sm,md,lg,xl -->
        <div class="md:w-11/12 xl:w-1/2 md:mx-auto h-auto">
            @foreach($articles as $article)
                <div class="flex break-words bg-white mt-5 p-2 rounded">
                    <div class=" flex flex-col self-center p-2">
                        <span class="font-semibold text-5xl">
                            {{ $article->created_at->format('d') }}
                        </span>
                        <p>{{ $article->created_at->format('M y')  }}</p>
                    </div>
                    <div class="flex flex-col p-2">
                        <a href="{{ route('articles.show',$article->slug)  }}" class="text-2xl pointer text-sfh">
                            {{ $article->name  }}
                        </a>
                        <p class="py-2 text-gray-700">
                            {{ $article->excerpt  }}
                        </p>
                    </div>
                </div>
            @endforeach

            @if(count($articles) > 0)
                <div class="mt-5">
                    {{ $articles->links() }}
                </div>
            @else
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Hello there,
                </div>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        Aryan haven't written any articles yet.
                    </p>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
