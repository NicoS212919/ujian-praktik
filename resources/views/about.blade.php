@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-10">
        <!-- Main Heading -->
        <h1 class="text-center text-3xl font-bold mb-8">Maxindo</h1>

        <div class="mb-10">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">About Maxindo</h2>
                <p class="text-gray-700">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam accumsan ligula nec tortor auctor, at
                    consequat odio pharetra. Curabitur ac est felis. Morbi ac magna ut libero tincidunt bibendum vel ac dui.
                    Etiam nec suscipit nulla, a ultricies sapien. Integer venenatis turpis id nisl sollicitudin, vel
                    hendrerit
                    urna facilisis.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Visi -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Visi</h3>
                <p class="text-gray-700">
                    Vivamus vulputate, felis non suscipit mollis, metus purus tincidunt tortor, in auctor ligula est id
                    ipsum.
                    Cras ut lectus nunc. Curabitur ac erat quis urna elementum eleifend.
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Misi</h3>
                <p class="text-gray-700">
                    Pellentesque imperdiet, felis et malesuada venenatis, lectus orci condimentum libero, vitae lacinia arcu
                    risus vel arcu. Integer vestibulum arcu sit amet risus lacinia, in feugiat risus nulla vehicula.
                </p>
            </div>
        </div>
    </div>
@endsection
