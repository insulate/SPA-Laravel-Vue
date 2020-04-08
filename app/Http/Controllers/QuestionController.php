<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }

    public function index()
    {
        return QuestionResource::collection(Question::latest()->get());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //auth()->user()->question()->create($request->all()); //ใช้ในกรณีที่เราใช้การรับรองความถูกต้อง
        //$request['slug'] = str_slug($request->title); //ไม่ต้องเพิ่ม slug เนื่องจากทำใน model function static boot แล้ว
        $question = auth()->user()->question()->create($request->all());
        return response(new QuestionResource($question), Response::HTTP_CREATED);
    }

    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    public function edit(Question $question)
    {
        //
    }

    public function update(Request $request, Question $question)
    {
        $question->title = $request->title;
        $question->slug = str_slug($request->title);
        $question->body = $request->body;
        $question->save();
        return response(new QuestionResource($question), Response::HTTP_ACCEPTED);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
