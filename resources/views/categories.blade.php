@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @foreach($cats as $cat)
                    <div class="flex flex-col break-word border border-2 mt-5 rounded shadow-md">
                        <div class="font-semibold bg-sfh py-3 px-6 mb-0">
                            {{ $cat->name  }}
                        </div>

                        <div class="w-full p-6">

                            @if(count($cat->articles) === 0)
                                <p class="text-sfh">
                                    No articles yet in this category.
                                </p>
                            @endif

                            <div class="flex flex-col">

                                @foreach($cat->articles as $article)

                                    <span class="py-2">
                                        <span class="text-gray-500 text-xs">
                                            {{ $article->created_at->toDateString() }}
                                        </span>
                                        <a href="{{ route('articles.read',$article->slug) }}" class="text-sfh">
                                             {{ $article->name  }}
                                        </a>
                                    </span>

                                @endforeach
                            </div>
                        </div>
                    </div>
            @endforeach

        </div>
    </div>
@endsection
