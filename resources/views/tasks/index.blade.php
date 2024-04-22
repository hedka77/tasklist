@extends('layouts.app')

@section('title', 'Tasks List')

@section('content')
    {{--@if(count($tasks)>0)--}}
    <ul>
        @forelse($tasks as $t)
            <li><a href="{{route('tasks.show', $t->id)}}">{{$t->title}}</a></li>
        @empty
            <li>There are no tasks</li>
        @endforelse
    </ul>
    {{--@else
        <p>There are no tasks</p>
    @endif--}}
@endsection
