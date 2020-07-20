@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            @foreach($articles as $article)
                <div class="flex break-words bg-white border border-2 mt-5 p-2 rounded shadow-md">
                    <div class=" flex flex-col self-center p-2">
                        <span class="font-semibold text-5xl">{{ $article->created_at->format('d') }}</span>
                        <p>{{ $article->created_at->format('M y')  }}</p>
                    </div>
                    <div class="flex flex-col p-2">
                        <a href="{{ route('articles.show',$article->slug)  }}" class="text-2xl pointer text-sfh">{{ $article->name  }}</a>
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
