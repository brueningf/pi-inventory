@if($errors->count())
    <div class="my-8 text-red-500">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
