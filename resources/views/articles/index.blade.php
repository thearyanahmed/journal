@extends('layouts.dashboard')

@section('content')
    <main class="w-auto inline-block flex flex-1  flex-col transition duration-500 ease-in-out overflow-y-scroll">
        <div class="mx-2 my-2">
            <h2 class="my-4 text-4xl dark:text-gray-400">
                /Articles
            </h2>
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                <div class="flex justify-between font-semibold bg-gray-200 text-gray-700">
                    <div class="py-3 px-6 mb-0">
                        Stats
                    </div>
                    <div class="py-3 px-6 mb-0">
                        <a href="{{ route('articles.create') }}">Write a new article</a>
                    </div>
                </div>

                <div class="w-auto p-6">
                    <p class="text-gray-700">
                        You have {{ $stats['published'] }} published articles and {{ $stats['drafts'] }} drafts.
                    </p>
                </div>
            </div>

            @if(count($articles) > 0)
                <div class="articles-list">
                    <div class="bg-white mt-4 pb-4 rounded w-full shadow-md">
                        @include('articles.table.head')
                        <div class="overflow-x-auto mt-6 rounded">
                            <table class="table-auto border-collapse w-full">
                                @include('articles.table.header')
                                <tbody class="text-sm font-normal text-gray-700">
                                    @foreach($articles as $article)
                                        <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                                            <td class="p-4">{{ $article->id }}</td>
                                            <td class="p-4">
                                                <a href="{{ route('articles.show',$article->slug) }}">{{ $article->name }}</a>
                                            </td>
                                            <td class="p-4">{{ $article->slug }}</td>
                                            <td class="p-4 text-center">
                                                    @if($article->status === App\Article::PUBLISHED)
                                                        <span class="flex rounded-full uppercase px-2 flex justify-center text-white py-1 text-xs font-bold bg-green-300">published</span>
                                                    @else
                                                        <span class="flex rounded-full uppercase px-2 flex justify-center text-white py-1 text-xs font-bold bg-gray-500">
                                                            draft
                                                        </span>
                                                    @endif
                                            </td>
                                            <td class="p-4">
                                                @if($article->status === App\Article::PUBLISHED)
                                                    {{ $article->created_at->toFormattedDateString() }}
                                                @else
                                                    Not published.
                                                @endif
                                            </td>
                                            <td class="p-4">{{ $article->created_at->toFormattedDateString() }}</td>
                                            <td class="p-4">
                                                <a class="pl-2" href="{{ route('articles.show',$article->slug) }}"><i class="fas fa-eye"></i></a>
                                                <a class="pl-2" href="{{ route('articles.edit',$article->id) }}"><i class="fas fa-pen"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @if(count($articles) > 0)
                        <div class="mt-5">
                            {{ $articles->links() }}
                        </div>
                    @endif
                </div>
            @else
                <div class="flex flex-col mt-4 break-words bg-white border border-2 rounded shadow-md">
                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        Sorry
                    </div>

                    <div class="w-full p-6">
                        <p class="text-gray-700">
                            You haven't published any articles yet.
                        </p>
                    </div>
                </div>
            @endif

        </div>
    </main>
@endsection
