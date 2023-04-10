<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @if(Auth::user() && Auth::user()->is_admin == 1)
    <div class="container" style="text-align:center">
        <a style='padding: 0px 10px' href="{{route( 'user.index' )}}">Add User</a>
        <a style='padding: 0px 10px' href="{{route('todos.index')}}">Add Todo</a>
        <a href="{{route('user.Search')}}">Search</a>
    </div>
    @else
    <div class="container" style="text-align:center">
        <a href="{{route('user.Search')}}">Search</a>
        <a style='padding: 0px 10px' href="{{route('todos->tododata')}}">View TodoList</a>
        @endif
    </div>
</x-app-layout>