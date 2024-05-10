@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <h2>Task Details</h2>

    <p>{{$task->description}}</p>

    @isset($task->long_description)
        <p>{{$task->long_description}}</p>
    @endisset

    <p>{{$task->created_at}}</p>
    <p>{{$task->updated_at}}</p>

    <p>
        @if($task->completed)
            Task completed!
        @else
            Task is not complete!
        @endif
    </p>

    <div>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>
    </div>

    <div>
        <form method="POST" action="{{ route('tasks.toggle-completed', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <button type="submit">Mark as {{ $task->completed ? 'Not completed' : 'Completed' }}</button>
        </form>
    </div>

    <div>
        <form action="{{route('tasks.destroy', ['task' => $task->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>

        </form>
    </div>

    <a style="margin-top: 200px" href="{{route('tasks.index')}}">Return</a>
@endsection
