@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">Add a car</h1>
        </div>
    </div>
    <div class="flex justify-center pt-20">
        <form action="/cars" method="POST">
            @csrf
            <div class="block">
                <input type="text" class="bg-blue-900 block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="name" placeholder="Car Brand Name">
                <input type="text" class="bg-blue-900 block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="founded" placeholder="Year Founded">
                <input type="text" class="bg-blue-900 block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="description" placeholder="Car Description">
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">Submit</button>
            </div>
        </form>
    </div>
@endsection