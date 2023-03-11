<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center">CRUD App</h1>
        @if(session()->get('success'))
            <div class="alert alert-success">
                <span>{{session()->get('success')}}</span>
            </div>
        @elseif(session()->get('error'))
        <div class="alert alert-danger">
            <span>{{session()->get('error')}}</span>
        </div>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
