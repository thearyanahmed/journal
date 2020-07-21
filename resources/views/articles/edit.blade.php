@extends('layouts.app')

@section('content')
    <main class="w-full inline-block transition duration-500 ease-in-out overflow-y-scroll">
        <div class="mx-2 my-2">
            <div class="w-4/6 mx-auto">
                <h2 class="my-4 text-4xl dark:text-gray-400">
                    /Write
                </h2>
                <form action="{{ route('articles.update',$article->id) }}" method="POST" class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PATCh')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Name
                        </label>
                        <input name="name" value="{{ $article->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="name of your article">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">
                            Slug
                        </label>
                        <input name="slug" value="{{ $article->slug }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="slug" type="text" placeholder="the url portion">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="excerpt">
                            Excerpt
                        </label>
                        <textarea name="excerpt" id="excerpt" rows="2" maxlength="255" placeholder="A short description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $article->excerpt }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="editor">
                            Content
                        </label>
                        <textarea id="editor"  name="body">{{ $article->body }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="editor">
                            Status
                        </label>
                        <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="{{ App\Article::PUBLISHED }}" {{ $article->status === App\Article::PUBLISHED ? 'selected' : '' }} >Publish</option>
                            <option value="{{ App\Article::DRAFT }}" {{ $article->status === App\Article::DRAFT ? 'selected' : '' }} >Draft</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <lable class="block text-gray-700 text-sm font-bold mb-2">Category</lable>
                        @foreach($categories as $category)
                            <input type="checkbox" id="category_{{ $category->id }}" {{ array_search($category->id,$cats,true) !== false ? 'checked' : '' }} name="categories[{{ $category->id }}]">
                            <label for="categories" for="category_{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        @endforeach
                    </div>

                    @include('partials.form.errors')

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <link href="{{ asset('css/froala.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/froala.min.js') }}"></script>
    <script src="{{ asset('js/init.editor.js') }}"></script>
@endpush
