<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;
use App\Models\Todos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditToDoController extends Controller
{
    public function index($id = null)
    {

        return view('toDo.toDo', [
            'todo' => Todos::where('id', $id)
                ->get()->first()
        ]);
    }

    public function edit(Request $request, $id = null)
    {

        $valid = $request->validate([
            'date' => 'date',
            'email' => 'email:rfc',
            'subject' => 'max:20|string',
            'resume' => 'max:100|nullable|string',
            'full_text' => 'nullable|string'
        ]);

        $valid['user'] = Auth::id();
        $valid['date'] = date('Y-m-d', strtotime($valid['date']));

        $todo = Todos::updateOrCreate(
            ['id' => $id],
            $valid
        );

        $todo = $todo->with('users')->find($todo->id);

        if ($request->get('notification') == 'true'){
            SendMail::dispatch($todo);
        }

        return redirect(route('home'));

    }

    public function trash(Request $request)
    {

        $valid = $request->validate([
            'trash' => 'required|exists:todos,id'
        ]);

        Todos::find($valid['trash'])->delete();

        return redirect(route('home'));
    }
}
