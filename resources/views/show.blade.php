@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p> {{ $task->description }}</p>

@if ($task->long_description)
    <p> {{ $task->long_description }}</p>
@endif

<p> {{ $task->created_at }}</p>
<p> {{ $task->updated_at }}</p>
<div class="mb4">
    @if ($task->completed)
        Completed
        @else
        Not completed
    @endif
</div>
<div class="mb-4 mt-4">
    <a class="btn" href="{{route('tasks.edit', ['task'=> $task]) }}">Edit</a>
</div>
<div class="mb-4">
    <form action="{{ route('tasks.toggle', ['task' =>$task]) }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">Mark as {{ $task->completed ? 'not completed' : 'completed' }} </button>
    </form>
</div class="mb-4">
<form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn">Delete</button>
</form>
@endsection