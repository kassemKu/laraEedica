<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Course;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {
        $lesson = Lesson::whereCourseId($course_id)->with('course')->first();
        $course = Course::whereId($course_id)->first();
        return view('manage.lessons.create')->withLesson($lesson)->withCourse($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lesson = new Lesson();

        $lesson->title = $request->title;
        $lesson->course_id = $request->course_id;
        $lesson->slug = $request->slug;
        $lesson->description = $request->description;
        $lesson->lesson_content = $request->lesson_content;
        if($request->lesson_video) {
            $lesson->addMedia($request->lesson_video)->toMediaCollection('lesson_video');
        }
        if($request->free_lesson) {
            $lesson->free_lesson = $request->free_lesson === "on" ? 1 : 0;
        }
        $lesson->publish = $request->publish === "on" ? 1 : 0;
        $lesson->position = $request->position;
        $lesson->type = $request->type;
        $lesson->save();

        return redirect()->route('lessons.show', $lesson->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $lesson = Lesson::where('slug', $slug)->first();
        return view('manage.lessons.show')->withLesson($lesson);
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
