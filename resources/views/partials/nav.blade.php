<nav class="mx-auto w-12/12 md:w-10/12 mb-8 py-6">
    <div class="container mx-auto px-6 md:px-0">
        <div class="flex items-center justify-between">
            <div class="mr-6">
                <a href="{{ url('/') }}" class="flex text-lg font-normal text-sfh no-underline pointer">
                    <img src="{{ asset('images/logos/basic.png') }}" class="h-12 w-12">
                    <span class="self-center">
                        {{ config('app.name', "Aryan's den") }}
                     </span>
                </a>
            </div>
            <div id="nav-right" class="text-right">
                <a href="{{ route('archives') }}" class="text-sfh text-sm pr-4 pointer">archives</a>
                <!-- <a href="#" class="text-sfh text-sm pr-4 pointer">whoami</a> -->

                @auth
                    <a href="{{ route('articles.index') }}" class="text-sfh text-sm pr-4 pointer">articles</a>

                    <a href="{{ route('logout') }}"
                       class="no-underline hover:underline text-sfh text-sm p-3 pointer"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

@push('scripts')
<script type="text/javascript">
    const el = document.querySelector('#nav-right')

    try{

        if (window.screen.width > 768) {
            if(el.classList.contains("flex flex-col")) {
                el.classList.remove("flex flex-col")
            }
            el.classList.add("flex justify-start")
        } else {
            if(el.classList.contains("flex justify-start")) {
                el.classList.remove("flex justify-start")
            }
            el.classList.add("flex flex-col")
        }
    } catch(err) {
        // hehe
    }
</script>
@endpush
