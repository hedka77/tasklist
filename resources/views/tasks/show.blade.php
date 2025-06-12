@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link"><- Go back to the task list</a>
    </div>


    <h2>Task Details</h2>

    <p class="mb-4 text-slate-700">{{$task->description}}</p>

    @isset($task->long_description)
        <p class="mb-4 text-slate-700">{{$task->long_description}}</p>
    @endisset

    <p class="mb-4 text-sm text-slate-500">Creado {{$task->created_at->diffForHumans()}} / Actualizado {{$task->updated_at->diffForHumans()}}</p>

    <p class="mb-4">
        @if($task->completed)
            <span class="font-medium text-green-500">Task completed!</span>
        @else
            <span class="font-medium text-red-500">Task is not complete!</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a class="btn" href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>

        <form method="POST" action="{{ route('tasks.toggle-completed', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <button class="btn" type="submit">Mark as {{ $task->completed ? 'Not completed' : 'Completed' }}</button>
        </form>

        <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn" type="submit">Delete</button>

        </form>
    </div>

    <a style="margin-top: 200px" href="{{route('tasks.index')}}">Return</a>
@endsection
