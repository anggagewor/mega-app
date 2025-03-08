<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Subtopic;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $topics = Topic::when($request->has('search'), function ($query) {
            $query->where('name', 'like', '%' . request('search') . '%');
        })->paginate();

        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $topic = new Topic;
        $topic->name = $name;
        $topic->description = $description;
        $topic->save();

        return redirect()->route('topics.index');
    }

    public function createSub($id)
    {
        $topic = Topic::findOrFail($id);

        return view('topics.create-sub', compact('topic'));
    }

    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        $subs = Subtopic::where('topic_id', $id)->get();

        return view('topics.show', compact('topic', 'subs'));
    }

    public function subtopic($id, $sub_id)
    {
        $topic = Topic::findOrFail($id);
        $sub = Subtopic::findOrFail($sub_id);
        $contents = Content::orderBy('id', 'ASC')->where('subtopic_id', $sub_id)->get();
        $detail = Content::orderBy('id', 'ASC')->where('subtopic_id', $sub_id)->first();
        return view('topics.subtopic', compact('topic', 'contents', 'sub', 'detail'));
    }


    public function showContent($id, $sub_id, $content_id)
    {
        $topic = Topic::findOrFail($id);
        $sub = Subtopic::findOrFail($sub_id);
        $contents = Content::orderBy('id', 'ASC')->where('subtopic_id', $sub_id)->get();
        $detail = Content::findOrFail($content_id);
        return view('topics.subtopic', compact('topic', 'contents', 'sub', 'detail'));
    }

    public function storeSub($id, Request $request)
    {
        $sub = new Subtopic;
        $sub->topic_id = $id;
        $sub->name = $request->name;
        $sub->description = $request->description;
        $sub->save();

        return redirect()->route('topics.show', ['id' => $id]);
    }

    public function editContent($id, $sub_id, $content_id)
    {
        $content = Content::findOrFail($content_id);
        $sub = Subtopic::findOrFail($sub_id);
        $topic = Topic::findOrFail($id);
        return view('topics.edit-content', compact('content', 'sub', 'topic'));
    }

    public function createContent($id, $sub_id)
    {
        $sub = Subtopic::findOrFail($sub_id);
        $topic = Topic::findOrFail($id);
        return view('topics.create-content', compact('sub', 'topic'));
    }

    public function storeContent($id, $sub_id, Request $request)
    {
        $content = new Content();
        $content->title = $request->name;
        $content->subtopic_id = $sub_id;
        $content->body = $request->description;
        $content->save();
        return redirect()->route('topics.subtopic.show.content', ['id' => $id, 'sub_id' => $sub_id, 'content_id' => $content->id]);
    }

    public function updateContent($id, $sub_id, $content_id, Request $request)
    {
        $content = Content::findOrFail($content_id);
        $content->title = $request->name;
        $content->body = $request->description;
        $content->save();
        return redirect()->route('topics.subtopic.show.content', ['id' => $id, 'sub_id' => $sub_id, 'content_id' => $content_id]);
    }
}
