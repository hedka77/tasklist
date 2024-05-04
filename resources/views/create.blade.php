@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
            @error('title')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5"></textarea>
        </div>

        <div>
            <label for="long_description">Long description</label>
            <textarea id="long_description" name="long_description" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Add task</button>
        </div>

    </form>
@endsection
