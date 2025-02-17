<?php

// namespace App\Http\Controllers;

// use App\Models\Task;
// use Illuminate\Http\Request;

// class TaskController extends Controller
// {
//     public function index()
//     {
//         $tasks = Task::all();
//         return view('tasks.index', compact('tasks'));
//     }

//     public function create()
//     {
//         return view('tasks.create');
//     }

  
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'title' => 'required|max:255',
//             'description' => 'nullable',
//         ]);
    
//         // If 'completed' is not present, set it to 'off'
//         $validatedData['completed'] = $request->has('completed') ? 'on' : 'off';
    
//         Task::create($validatedData);
    
//         return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
//     } 

//     public function show(Task $task)
//     {
//         return view('tasks.show', compact('task'));
//     }

//     public function edit(Task $task)
//     {
//         return view('tasks.edit', compact('task'));
//     }
//     public function update(Request $request, Task $task)
//     {
//         $validatedData = $request->validate([
//             'title' => 'required|max:255',
//             'description' => 'nullable',
//         ]);
    
//         // If 'completed' is not present, set it to 'off'
//         $validatedData['completed'] = $request->has('completed') ? 'on' : 'off';
    
//         $task->update($validatedData);
    
//         return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
//     }
    



//     public function destroy(Task $task)
//     {
//         $task->delete();
//         return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
//     }
// }
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Web Routes

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
    
        $validatedData['completed'] = $request->has('completed') ? 'on' : 'off';
    
        Task::create($validatedData);
    
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    } 

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
    
        $validatedData['completed'] = $request->has('completed') ? 'on' : 'off';
    
        $task->update($validatedData);
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    // API Methods

    // Get all tasks (API)
    public function apiIndex()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    // Get a specific task by ID (API)
    public function apiShow(Task $task)
    {
        return response()->json($task);
    }

    // Create a new task (API)
    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
    
        $validatedData['completed'] = $request->has('completed') ? 'on' : 'off';
    
        $task = Task::create($validatedData);
    
        return response()->json($task, 201);  // 201 Created
    }

    // Update a specific task by ID (API)
    public function apiUpdate(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
           
        ]);
    
        $validatedData['completed'] = $request->has('completed') ? 'on' : 'off';
    
        $task->update($validatedData);
    
        return response()->json($task);
    }

    // Delete a task by ID (API)
    public function apiDestroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);  // 204 No Content (successfully deleted)
    }
}

// namespace App\Http\Controllers;

// use App\Models\Task;
// use Illuminate\Http\Request;

// class TaskController extends Controller
// {
//     // Web Routes

//     public function index()
//     {
//         $tasks = Task::all();
//         return view('tasks.index', compact('tasks'));
//     }

//     public function create()
//     {
//         return view('tasks.create');
//     }

//     public function store(Request $request)
//     {
//         $validatedData = $this->validateTaskData($request);
//         Task::create($validatedData);
//         return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
//     } 

//     public function show(Task $task)
//     {
//         return view('tasks.show', compact('task'));
//     }

//     public function edit(Task $task)
//     {
//         return view('tasks.edit', compact('task'));
//     }

//     public function update(Request $request, Task $task)
//     {
//         $validatedData = $this->validateTaskData($request);
//         $task->update($validatedData);
//         return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
//     }

//     public function destroy(Task $task)
//     {
//         $task->delete();
//         return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
//     }

//     // API Methods

//     // Get all tasks (API)
//     public function apiIndex()
//     {
//         $tasks = Task::all();
//         return response()->json($tasks);
//     }

//     // Get a specific task by ID (API)
//     public function apiShow(Task $task)
//     {
//         return response()->json($task);
//     }

//     // Create a new task (API)
//     public function apiStore(Request $request)
//     {
//         $validatedData = $this->validateTaskData($request);
//         $task = Task::create($validatedData);
//         return response()->json($task, 201);  // 201 Created
//     }

//     // Update a specific task by ID (API)
//     public function apiUpdate(Request $request, Task $task)
//     {
//         $validatedData = $this->validateTaskData($request);
//         $task->update($validatedData);
//         return response()->json($task);
//     }

//     // Delete a task by ID (API)
//     public function apiDestroy(Task $task)
//     {
//         $task->delete();
//         return response()->json(null, 204);  // 204 No Content (successfully deleted)
//     }

//     private function validateTaskData(Request $request)
//     {
//         $validatedData = $request->validate([
//             'title' => 'required|max:255',
//             'description' => 'nullable',
//         ]);
//         $validatedData['completed'] = $request->has('completed') ? 'on' : 'off';
//         return $validatedData;
//     }
// }