@extends('includes.index')

@section('content')
    @vite(['resources/js/app.js'])
    <div id="app">
        <create-sales-component
            :token="{{ @json_encode(auth()->user()->createToken('tokens')->plainTextToken) }}"
            :logged="{{ auth()->user() }}"
            :products="{{ $products }}"
        >
        </create-sales-component>
    </div>
@endsection
