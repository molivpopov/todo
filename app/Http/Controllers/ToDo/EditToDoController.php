<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditToDoController extends Controller
{
    public function index()
    {
        return view('toDo.toDo');
    }

    public function edit($id=null, Request $request)
    {
        $request->validate([
            'date' =>'date',
            'not_email' => 'email:rfc',
            'subject' => 'max:100|nullable|string',
            'text' => 'nullable|string'
        ]);

        dd($request->all());
    }
}
