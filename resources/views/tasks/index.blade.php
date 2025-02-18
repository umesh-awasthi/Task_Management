@extends('layouts.app')

@section('content')
<div>
    @if (session('success'))
        <div id="success-message" class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

        {{-- <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 2000); // 2 seconds
        </script> --}}

</div>
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Task Manager</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Task</a>
    <table class="w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Completed</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td class="border px-4 py-2">{{ $task->title }}</td>
                <td class="border px-4 py-2">{{ $task->description }}</td>
                <td class="border px-4 py-2">{{ $task->completed === 'on' ? 'Yes' : 'No' }}</td>
              

                <td class="border px-4 py-2">
                    <a href="{{ route('tasks.show', $task) }}" class="text-blue-500">View</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="text-green-500 ml-2">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('storage/js/myjs.js') }}"></script>

@endsection