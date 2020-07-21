@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="xs:w-full md:w-11/12 xl:w-9/12 mx-auto">
            <div class="flex break-words bg-white mt-5 p-2 rounded ">
                <div class="flex flex-col p-2">
                    <p class="text-3xl md:text-5xl pointer text-sfh tracking-wide leading-snug">{{ $article->name  }}</p>
                    <p class="text-xl md:text-2xl py-2 text-gray-700 tracking-wide leading-relaxed">
                        {{ $article->created_at->diffForHumans() }}
                    </p>
                    <p class="py-2 text-gray-700 tracking-wide leading-relaxed text-xl md:text-2xl">{{ $article->excerpt }}</p>
                    <div class="tracking-wide leading-relaxed text-xl md:text-2xl">
                        <div class="fr-view">
                            {!! $article->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/froala_style.min.css') }}">
@endpush
