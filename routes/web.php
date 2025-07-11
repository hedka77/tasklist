<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;


/*class MyTask
{
    public function __construct(public int     $id,
                                public string  $title,
                                public string  $description,
                                public ?string $long_description,
                                public bool    $completed,
                                public string  $created_at,
                                public string  $updated_at) {}
}

$tasks = [ new MyTask(1,
                    'Buy groceries',
                    'Task 1 description',
                    'Task 1 long description',
                    false,
                    '2023-03-01 12:00:00',
                    '2023-03-01 12:00:00'),
           new MyTask(2, 'Sell old stuff', 'Task 2 description', null, false, '2023-03-02 12:00:00', '2023-03-02 12:00:00'),
           new MyTask(3,
                    'Learn programming',
                    'Task 3 description',
                    'Task 3 long description',
                    true,
                    '2023-03-03 12:00:00',
                    '2023-03-03 12:00:00'),
           new MyTask(4, 'Take dogs for a walk', 'Task 4 description', null, false, '2023-03-04 12:00:00', '2023-03-04 12:00:00'), ];*/

Route::get('/', static function()
{
    return redirect()->route('tasks.index');
});

/*Route::get('/', function() {
    return view('index', [
    'name' => 'Edgar S. Ochoa'
    ]);
});*/

Route::get('/tasks', function()
{
    //Route::get('/tasks', function() use ($tasks) {
    //return view('tasks.index', [ 'tasks' => Task::all() ]);
    //return view('tasks.index', [ 'tasks' => Task::latest()->where('completed', true)->get() ]); //query builder

    return view('tasks.index', [ //'tasks' => $tasks
                                 'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

/*Route::get('/tasks/{id}', static function($id) {
    //$task = collect($tasks)->firstWhere('id', $id);

    //if (!$task) {
    //    abort(Response::HTTP_NOT_FOUND);
    //}

    return view('tasks.show', [ 'task' => Task::findOrFail($id) ]);

})->name('tasks.show');*/

Route::get('/tasks/{task}',
    static function(Task $task) // This is implicit route model binding, as the variable $user match the model App\Models\Task. Laravel inject the model instance that has the matching ID, otherwise generate a 404 HTTP response
    {

        return view('tasks.show', [ 'task' => $task ]);

    })->name('tasks.show');

//Route::get('/tasks/{task}', [ TaskController::class, 'show' ])->name('tasks.show'); // This is ALSO implicit binding using controller methods

/*Route::get('/tasks/edit/{id}', static function($id) {
    return view('tasks.edit', [ 'task' => Task::findOrFail($id) ]);

})->name('tasks.edit');*/

Route::get('/tasks/{task}/edit', static function(Task $task)
{
    return view('tasks.edit', [ 'task' => $task ]);

})->name('tasks.edit');

Route::post('/tasks', static function(TaskRequest $request)
{
    /*$data = $request->validate([
                                   'title'            => 'required|max:255',
                                   'description'      => 'required',
                                   'long_description' => 'required',
                               ]);*/

    /*$data                   = $request->validated();
    $task                   = new Task();
    $task->title            = $data['title'];
    $task->description      = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();*/

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', [ 'task' => $task ])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', static function(Task $task, TaskRequest $request)
{

    /*$data = $request->validate([ 'title'            => 'required|max:255',
                                 'description'      => 'required',
                                 'long_description' => 'required', ]);*/

    //$task                   = Task::findOrFail($id);
    /*$data = $request->validated();
    $task->title            = $data['title'];
    $task->description      = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();*/

    $task->update($request->validated());

    return redirect()->route('tasks.show', [ 'task' => $task ])->with('success', 'Task updated successfully!');

})->name('tasks.update');

Route::put('tasks/toggle-completed/{task}', static function(Task $task)
{
    $task->toggleCompleted();

    return redirect()->route('tasks.show', [ 'task' => $task ])->with('success', 'Task updated successfully!');
})->name('tasks.toggle-completed');

Route::delete('/tasks/{task}', static function(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');


Route::get('/hello', function()
{
    return 'Hola tonotos!';
})->name('hello');

Route::get('/hello/{name}', function($name)
{
    return 'You are not supposed to be here, ' . $name;
});

/*Route::get('/hello/{msg}', function($name) {
    return "You spell that wrong, it's \"hello\", not hellou, " . $name;
})->name('hello');*/

Route::get('/hellou', function()
{
    return redirect()->route('hello');
});

Route::fallback(function()
{
    return 'Missing someting?';
});
