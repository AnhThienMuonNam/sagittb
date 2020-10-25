<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;


class Admin_TopicController extends Controller
{
    public function getAllTopics()
    {
        if (!\AppHelper::instance()->hasPermission('TOPIC_LIST')) {
            return view('admin.unauthorized');
        }
        $result = Topic::where('is_deleted', 0)->get();
        return view('admin.topic.index', ['topics' => $result]);
    }

    public function createTopicView()
    {
        if (!\AppHelper::instance()->hasPermission('TOPIC_ADD')) {
            return view('admin.unauthorized');
        }
        return view('admin.topic.create');
    }

    public function createTopic(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('TOPIC_ADD')) {
            return response()->json(['IsSuccess' => false]);
        }
        $this->validate(
            $request,
            [
                'image' => 'required'
            ],
            [
                'image.required' => 'Bạn chưa chọn Hình ảnh'
            ]
        );

        $model = new Topic;
        $model->line1 = $request->line1;
        $model->line2 = $request->line2;
        $model->line3 = $request->line3;
        $model->url = $request->url;
        $model->image = $request->image;
        $model->is_active = $request->is_active;
        $model->save();

        return response()->json(['IsSuccess' => true]);
    }

    public function editTopicView($Id)
    {
        if (!\AppHelper::instance()->hasPermission('TOPIC_LIST')) {
            return view('admin.unauthorized');
        }
        $blog = Topic::find($Id);

        return view('admin.topic.edit', ['Topic' => $blog]);
    }

    public function editTopic(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('TOPIC_EDIT')) {
            return response()->json(['IsSuccess' => false]);
        }
        $this->validate(
            $request,
            [
                'image' => 'required'
            ],
            [
                'image.required' => 'Bạn chưa chọn Hình ảnh'
            ]
        );

        $model = Topic::find($request->id);
        $model->line1 = $request->line1;
        $model->line2 = $request->line2;
        $model->line3 = $request->line3;
        $model->url = $request->url;
        $model->image = $request->image;
        $model->is_active = $request->is_active;
        $model->save();

        return response()->json(['IsSuccess' => true]);
    }

    public function deleteTopic(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('TOPIC_DELETE')) {
            return response()->json(['IsSuccess' => false]);
        }
        $model = Topic::find($request->id);
        $model->is_deleted = 1;
        $model->save();
        return response()->json(['IsSuccess' => true]);
    }
}
