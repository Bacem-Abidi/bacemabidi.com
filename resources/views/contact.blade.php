@extends('layouts.app')

@section('title', 'Contact Page')

@section('content')
    <section class="container mx-auto py-16">
        <h2 class="text-4xl font-bold text-center mb-12">Contact Me</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <form class="space-y-6">
                    <div>
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700">Message</label>
                        <textarea id="message" class="w-full px-4 py-2 border rounded-lg" rows="5"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700">Send Message</button>
                </form>
            </div>
            <div>
                <div class="bg-gray-200 h-64 rounded-lg mb-6">
                    <!-- Embed a map here -->
                </div>
                <div class="text-center">
                    <p class="text-gray-700">Follow me on:</p>
                    <div class="flex justify-center space-x-4 mt-4">
                        <a href="#" class="text-blue-600 hover:text-blue-700">GitHub</a>
                        <a href="#" class="text-purple-600 hover:text-purple-700">LinkedIn</a>
                        <a href="#" class="text-orange-400 hover:text-orange-500">ArtStation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
