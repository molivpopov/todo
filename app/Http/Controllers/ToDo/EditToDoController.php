<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
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

    public function edit($id = null, Request $request)
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

        Todos::updateOrCreate(
            ['id' => $id],
            $valid
        );

        if ($request->get('notification') == 'true'){
            dd('send mail');
            // todo: send email to $valid['email']
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
