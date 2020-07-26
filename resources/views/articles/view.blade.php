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
                    <p class="py-2 text-gray-700 tracking-wide leading-relaxed font-medium text-xl md:text-3xl">{{ $article->excerpt }}</p>
                    <div class="tracking-wide leading-relaxed text-xl md:text-2xl">
                        <div class="fr-view">
                            {!! $article->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <div id="disqus_thread" class="w-full md:w-4/6 mx-auto"></div>

        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/froala_style.min.css') }}">
@endpush

@push('scripts')
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://thearyanahmed-com-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endpush
