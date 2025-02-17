@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">{{ $task->title }}</h1>
    <p class="text-gray-700">{{ $task->description }}</p>
 
    @if ($task->completed == "on")
        <p class="mt-4 text-green-500 mb-3">Status: Task Completed</p>
    @else
        <p class="mt-4 text-red-500 mb-3">Status: Not Completed</p>
    @endif

    <a href="{{ route('tasks.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-6">Back to List</a>
</div>
@endsection
