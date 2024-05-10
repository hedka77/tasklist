@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')
    <style>
        .error-message {
            color     : #FF2D20;
            font-size : 0.8rem;
        }
    </style>

@endsection

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5">
                {{ $task->description ?? old('description') }}
            </textarea>
            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long description</label>
            <textarea id="long_description" name="long_description" rows="10">
                {{ $task->long_description ?? old('long_description') }}
            </textarea>
            @error('long_description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">
                @isset($task)
                    Update Task
                @else
                    Add task
                @endisset
            </button>
        </div>

    </form>
@endsection
