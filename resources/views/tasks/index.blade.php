@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')

    <div>
        <a href="{{ route('tasks.create') }}">Create task</a>
    </div>

    {{--@if(count($tasks)>0)--}}
    <ul>
        @forelse($tasks as $t)
            <li><a href="{{route('tasks.show', $t->id)}}">{{$t->title}}</a></li>
        @empty
            <li>There are no tasks</li>
        @endforelse
    </ul>

    @if($tasks->count())
        <nav>
            {{$tasks->links('pagination::bootstrap-5')}}
        </nav>
    @endif

    {{--@else
        <p>There are no tasks</p>
    @endif--}}
@endsection
