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

    <a style="margin-top: 200px" href="{{route('tasks.index')}}">Return</a>
@endsection
