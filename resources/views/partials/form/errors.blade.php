@if ($errors->any())
    <div class="text-sm border rounded p-2 text-black bg-red-200">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
