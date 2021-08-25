<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('mescours.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = time() . '_' . $request->support->getClientOriginalName();
        $filePath = $request->file('support')->storeAs('support_lesson', $fileName, 'public');
        $lesson = new Lesson();
        $lesson->support_pth = '/storage/' . $filePath;
        $lesson->title = $request->title;
        $lesson->note = $request->note;
        $lesson->unite_id = $request->unite_id;
        $lesson->save();
        return redirect(route('lessons.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lessons = Lesson::where('unite_id', $id)->get();
        return view('teacher.lessons.index', compact('lessons', 'id'));
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
        echo $id;
        $lesson = Lesson::where('id', $id)->first() ?? abort(404);

        $lesson->delete();

        return redirect(route('lessons.index'));
    }
}
