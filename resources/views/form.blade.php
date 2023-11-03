@extends('layouts.app')

@section('title', isset($task)? 'Edit Task' : 'Add Task')

@section('content')

<form method="POST" action="{{ isset($task)? Route('tasks.update', ['task' => $task->id]) : Route('tasks.store') }}"> 
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div>
        <label for="title">title </label>
        <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"/>
        @error('title')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea  name="description" id="description" rows="5"> {{ $task->description ?? old('description') }}</textarea>
        @error('description')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">Long Description</label>
        <textarea  name="long_description" id="long_description" rows="10">  {{ $task->description ?? old('long_description') }}</textarea>
        @error('long_description')
            <p class="error_message"> {{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit">
            @isset($task)
            Update Task
            @else
            Add Task
            @endisset
        </button>
    </div>
</form>
@endsection