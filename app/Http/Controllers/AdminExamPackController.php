<?php

namespace App\Http\Controllers;

use App\Models\ExamPack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminExamPackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $search = request('search');

        if ($search) {
            $exampacks = ExamPack::where('nama', 'like', '%' . $search . '%')->latest()->paginate(10);
        } else {
            $exampacks = ExamPack::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manage Exam Packs',
            'exampacks' => $exampacks,
            'content' => 'admin/exampacks/index'
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
        $data = [
            'title'   => 'Manage Exam Packs',
            'content' => 'admin/exampacks/add'
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
            'name'              => 'required|min:3',
            'times'              => 'required',
            'question_amout'    => 'required'
        ]);
        $data['user_id']    = auth()->user()->id;
        ExamPack::create($data);
        Alert::success('Success', 'Exam pack added');
        return redirect('/admin/exam/exampacks');
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
            'title'   => 'Manage Exam Packs',
            'exampacks' => ExamPack::find($id),
            'content' => 'admin/exampacks/detail'
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
        $data = [
            'title'   => 'Manage Exam Packs',
            'exampacks' => ExamPack::find($id),
            'content' => 'admin/exampacks/add'
        ];
        return view('admin/layouts/wrapper', $data);
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
        $exampacks = ExamPack::find($id);
        $data = $request->validate([
            'name'              => 'required|min:3',
            'times'              => 'required',
            'question_amount'    => 'required'
        ]);
        $exampacks->update($data);
        Alert::success('Sukses', 'Edited');
        return redirect('/admin/exam/exampacks/'.$id);
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
        DB::table('exam_packs')->delete($id);
        Alert::success('success', 'Deleted');
        return redirect('/admin/exam/exampacks');
    }
}
