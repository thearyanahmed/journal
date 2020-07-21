@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="w-full px-2 md:w-1/2 md:mx-auto">

            @foreach($cats as $cat)
                <div class="flex flex-col break-word">
                    <div onclick="trigger({{ $cat->id }})" class="trigger font-semibold rounded-md bg-gray-200 cursor-pointer bg-sfh p-3 mt-2 px-6 m-0">
                        <span class="text-2xl">{{ $cat->name }}</span>
                        <span class="text-sm text-gray-700">{{ count($cat->articles) }} article/s.</span>
                    </div>

                    <div id="articles_of_archive_{{ $cat->id }}" class="hidden w-full p-6">
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
                                    <a href="{{ route('articles.show',$article->slug) }}" class="text-sfh px-2">
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

@push('scripts')
<script type="text/javascript">

    function trigger(id) {
        let dom = document.querySelector('#articles_of_archive_' + id)
        if (! dom) {
            return
        }

        if(dom.classList.contains('hidden')) {
            dom.classList.remove('hidden')
            dom.classList.add('block')
        } else {
            dom.classList.remove('block')
            dom.classList.add('hidden')
        }
    }

</script>
@endpush
