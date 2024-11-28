@extends('layouts.app')

@section('content')

    <style>
        #aboutCarousel {
            background-image: url('{{ asset('img/photo4.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            position: relative;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1055;
            /* Bootstrap modal z-index */
            display: none;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Dimmed background */
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: 1.75rem auto;
            /* Default Bootstrap margin for modal */
            max-width: 500px;
            /* You can adjust this width */
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            color: #212529;
            background-color: #fff;
            border-radius: 0.3rem;
            /* Default Bootstrap border-radius */
            border: 1px solid rgba(0, 0, 0, 0.125);
            /* Default Bootstrap border */
            outline: 0;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
            background-color: #f7f7f9;
            border-top-left-radius: calc(0.3rem - 1px);
            border-top-right-radius: calc(0.3rem - 1px);
        }

        .modal-body {
            padding: 1rem;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            padding: 1rem;
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        .modal-close-button {
            border: none;
            background: transparent;
            font-size: 1.25rem;
            color: #000;
        }

        .modal-close-button:hover {
            color: #5a6268;
        }
    </style>


    <div class="container mx-auto px-4 my-5">
        <!-- Carousel -->
        <div id="aboutCarousel" class="carousel slide relative" style="height: 400px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h1 class="text-center text-white text-3xl font-bold">Quotes</h1>
                </div>
            </div>
        </div>

        <div class="mt-10 text-center">
            <h1 class="text-2xl font-semibold underline">Pilih Paket</h1>
        </div>

        <!-- Add Paket Button for Role 1 -->
        @if (Auth::check() && Auth::user()->role == 1)
            <div class="mt-10 text-center">
                <a href="{{ route('services.create') }}"
                    class="bg-green-500 text-white px-4 py-1 rounded-md hover:bg-green-600 transition no-underline btn btn-sm">
                    Add New Paket
                </a>
            </div>
        @endif

        <div class="mt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Filters -->
                <div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                        <h4 class="font-semibold mb-4">Filter Produk</h4>
                        <div class="mb-4">
                            <label for="categoryFilter" class="block text-sm font-medium">Kategori</label>
                            <select class="form-select mt-1 block w-full" id="categoryFilter">
                                <option selected>Semua Kategori</option>
                                <option value="1">Kategori 1</option>
                                <option value="2">Kategori 2</option>
                                <option value="3">Kategori 3</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="priceFilter" class="block text-sm font-medium">Harga</label>
                            <input type="range" class="w-full mt-1" id="priceFilter" min="0" max="1000"
                                step="10">
                            <p class="mt-2">Harga: <span id="priceValue">500</span></p>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Product Cards -->
                <div class="col-span-2">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @if (count($services) > 0)
                            @foreach ($services as $key => $d)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <div class="p-6">
                                        <h5 class="text-lg font-semibold">{{ $d->name }}</h5>
                                        <p class="text-gray-600 mb-4">{{ Str::limit($d->description, 30) }}</p>
                                        <p class="text-sm text-gray-500">Price:
                                            Rp{{ number_format($d->price, 2, ',', '.') }}</p>

                                        @if (Auth::check() && Auth::user()->role == 1)
                                            <button type="button" class="btn btn-sm btn-primary mt-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $d->id }}">Read More</button>
                                            <a href="{{ route('services.edit', $d->id) }}"
                                                class="btn btn-sm btn-warning mt-2 no-underline">Edit</a>
                                            <form action="{{ route('services.destroy', $d->id) }}" method="POST"
                                                class="inline mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-sm btn-primary mt-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $d->id }}">Read More</button>
                                        @endif
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal  fade" id="exampleModal{{ $d->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel{{ $d->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel{{ $d->id }}">
                                                        {{ $d->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $d->description }}</p>
                                                    <p class="text-muted">Price:
                                                        Rp{{ number_format($d->price, 2, ',', '.') }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
