{{--                        <div class="flex justify-between col mt-4 break-words border border-2 text-sfh text-xs rounded shadow-md font-semibold bg-gray-200 text-gray-700">--}}
{{--                            <span class="w-1/12 py-3 px-6 mb-0">#id</span>--}}
{{--                            <span class="w-3/12 py-3 px-6 mb-0">name</span>--}}
{{--                            <span class="w-3/12 py-3 px-6 mb-0">slug</span>--}}
{{--                            <span class="w-2/12 flex justify-end py-3 px-6 mb-0">status</span>--}}
{{--                            <span class="w-2/12 flex justify-center py-3 px-6 mb-0">wrote</span>--}}
{{--                            <span class="w-1/12 flex justify-end py-3 px-6 mb-0">action</span>--}}
{{--                        </div>--}}

@foreach($articles as $article)
    {{--                            <div class="flex justify-between font-normal col mt-2 py-4 break-words {{ $article->id % 2 === 0 ? 'bg-gray-200' : 'bg-white' }} border border-2 rounded shadow-md text-gray-700">--}}
    {{--                                <span class="w-1/12 py-3 px-6 mb-0">{{ '#' . $article->id }}</span>--}}
    {{--                                <span class="w-3/12 2-py-3 px-6 mb-0">--}}
    {{--                                    <a href="{{ route('articles.show',$article->slug) }}">--}}
    {{--                                        {{ $article->name }}--}}
    {{--                                    </a>--}}
    {{--                                </span>--}}
    {{--                                <span class="w-3/12 py-3 px-6 mb-0">{{ $article->slug }}</span>--}}
    {{--                                <span class="w-2/12 flex justify-end py-3 px-6 mb-0">{{ \App\Article::statusText($article->status) }}</span>--}}
    {{--                                <span class="w-2/12 flex justify-end py-3 px-6 mb-0">{{ $article->created_at->toDateString() }}</span>--}}
    {{--                                <span class="w-1/12 flex justify-end py-3 px-6 mb-0">action</span>--}}
    {{--                            </div>--}}
@endforeach
