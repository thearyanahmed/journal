@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">
                <div class="font-semibold bg-red-200 text-gray-700 py-3 px-6 mb-0">
                    Sorry!
                </div>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        Could not find what you are looking for. Check the <a href="{{ route('archives') }}" class="font-bold">archives?</a> 
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
