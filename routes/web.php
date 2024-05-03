<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


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

Route::get('/', function() {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function() {
    //return view('tasks.index', [ 'tasks' => Task::all() ]);
    //return view('tasks.index', [ 'tasks' => Task::latest()->where('completed', true)->get() ]); //query builder
    return view('tasks.index', [ 'tasks' => Task::latest()->get() ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function($id) {
    /*$task = collect($tasks)->firstWhere('id', $id);

    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }*/

    return view('tasks.show', [ 'task' => Task::findOrFail($id) ]);

})->name('tasks.show');

Route::post('/tasks', function() {
    dd('We have reach the store route');
})->name('tasks.store');


/*Route::get('/', function() {
    return view('index', [//'name' => 'Edgar S. Ochoa'
    ]);
});*/

/*Route::get('/hello', function() {
    return 'Hola tonotos!';
})->name('hello');*/

/*Route::get('/hello/{name}', function($name) {
    return 'You are not supposed to be here, ' . $name;
});*/

/*Route::get('/hello/{msg}', function($name) {
    return "You spell that wrong, it's \"hello\", not hellou, " . $name;
})->name('hello');

Route::get('/hellou', function() {
    return redirect()->route('hello', 'tonotos');
});*/

Route::fallback(function() {
    return 'Missing someting?';
});
