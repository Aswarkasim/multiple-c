<?php

namespace App\Http\Controllers;

use App\Models\ExamPack;
use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *adkaah
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exam_pack_id = request('exampack_id');
        $search = request('search');

        if ($search) {
            $question = Question::where('exam_pack_id', $exam_pack_id)->where('name', 'like', '%' . $search . '%')->latest()->paginate(10);
        } else {
            $question = Question::where('exam_pack_id', $exam_pack_id)->latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manage Exam Packs',
            'exam_pack_id' => $exam_pack_id,
            'question' => $question,
            'content' => 'admin/question/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        $data = [
            'title'   => 'Create Question',
            'exampack' => ExamPack::find(request('exampack_id')),
            'content' => 'admin/question/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'number'              => 'required',
            'question'              => 'required',
            'exam_pack_id'          => 'required'
        ]);
        $quest = Question::create($data);
        Alert::success('Success', 'Question Added added');
        return redirect('/admin/exam/question/' . $quest->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = [
            'title'   => 'Complete the Question',
            // 'question' => Question::find($id),
            'content' => 'admin/question/detail'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
