<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use Illuminate\Http\Request;

class AdminChoiceController extends Controller
{
    //
    function create(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'content'       => 'required',
            'anotation'     => 'required',
            'question_id'   => 'required'
        ]);
        Choice::create($data);
        return redirect('/admin/exam/question/' . $data['question_id']);
    }
}
