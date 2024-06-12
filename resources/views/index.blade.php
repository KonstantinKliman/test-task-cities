@extends('layouts.app')

@section('main')
    <h3 class="text-center mb-4">
        <strong>Город:</strong>
    </h3>

    <div class="row w-auto">
        @foreach($cities as $city)
            <div class="col-auto mb-4">
                <button class="text-decoration-none text-dark" href="/{{ $city->slug }}">
                    @if(session('currentCity') === $city->slug)
                        <strong>{{ $city->name }}</strong>
                    @else
                        {{ $city->name }}
                    @endif
                </button>
            </div>
        @endforeach
    </div>
@endsection
