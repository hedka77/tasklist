@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">Create task</a>
    </nav>

    {{--@if(count($tasks)>0)--}}
    <ul>
        @forelse($tasks as $t)
            <li><a href="{{route('tasks.show', $t->id)}}" @class(['font-bold', 'line-through' => $t->completed])>{{$t->title}}</a></li>
        @empty
            <li>There are no tasks</li>
        @endforelse
    </ul>

    @if($tasks->count())
        <nav class="mt-4">
            {{$tasks->links('pagination::bootstrap-5')}}
        </nav>
    @endif

    {{--@else
        <p>There are no tasks</p>
    @endif--}}
@endsection
