@extends('layouts.app')

@section('content')
    <style>
        #aboutCarousel {
            background-image: url('{{ asset('img/photo4.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 150px;
            position: relative;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
    <div class="container mx-auto">
        <div class="container my-5">
            <div id="aboutCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h1 class="text-center text-white">Quotes</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header bg-gray-800 text-white text-xl font-semibold py-3 px-4">Contact Us</div>

                    <div class="card-body p-6">
                        @if (Session::has('message'))
                            <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded-lg mb-4">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-md font-medium text-gray-700">Nama</label>
                                <input type="text" name="name"
                                    class="form-input mt-1 block w-full border border-gray-300 rounded-md @error('name') border-red-500 @enderror">
                                @error('name')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-md font-medium text-gray-700">Email</label>
                                <input type="email" name="email"
                                    class="form-input mt-1 block w-full border border-gray-300 rounded-md @error('email') border-red-500 @enderror">
                                @error('email')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="msg" class="block text-md font-medium text-gray-700">Message</label>
                                <textarea name="msg"
                                    class="form-textarea mt-1 block w-full border border-gray-300 rounded-md @error('msg') border-red-500 @enderror"></textarea>
                                @error('msg')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex justify-start">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    type="submit">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
