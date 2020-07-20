@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="w-6/12 md:mx-auto">
            <div class="flex break-words bg-white mt-5 p-2 rounded ">
                <div class="flex flex-col p-2">
                    <p class="text-5xl pointer text-sfh tracking-wide leading-snug">{{ $article->name  }}</p>
                    <p class="py-2 text-gray-700 tracking-wide leading-relaxed">{{ $article->created_at->diffForHumans() }}</p>
                    <p class="py-2 text-gray-700 tracking-wide leading-relaxed text-2xl">{{ $article->excerpt }}</p>
                    <div class="tracking-wide leading-relaxed text-2xl">
                        {!! $article->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
