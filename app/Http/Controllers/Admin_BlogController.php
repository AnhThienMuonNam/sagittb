<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Hash;
use Mail;
use Excel;
use DateTime;

use App\User;
use App\Category;
use App\Product;
use App\Kieuday;
use App\Order;
use App\Order_Status;
use App\Charm;
use App\Payment_Method;
use App\Estimated_Delivery;
use App\City;
use App\Size_Vong;
use App\Size_Hat;
use App\Piece;
use App\Topic;
use App\Blog;
use App\Lichsu_Tracuu;

class Admin_BlogController extends Controller
{
    public function getAllBlogs()
    {
        if (!\AppHelper::instance()->hasPermission('BLOG_LIST')) {
            return view('admin.unauthorized');
        }
        $result = Blog::where('is_deleted', 0)->get();
        return view('admin.blog_index', ['blogs' => $result]);
    }

    public function editBlogView($Id)
    {
        if (!\AppHelper::instance()->hasPermission('BLOG_LIST')) {
            return view('admin.unauthorized');
        }
        $blog = Blog::find($Id);
        return view('admin.blog_edit', ['blog' => $blog]);
    }

    public function createBlogView()
    {
        if (!\AppHelper::instance()->hasPermission('BLOG_ADD')) {
            return view('admin.unauthorized');
        }
        return view('admin.blog_create');
    }

    public function createBlog(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('BLOG_ADD')) {
            return response()->json(['IsSuccess' => false]);
        }
        $this->validate(
            $request,
            [
                'name' => 'required|max:100',
                'content' => 'required',
                'image' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên bài viết',
                'name.max' => 'Tên bài viết phải ít hơn 100 ký tự',
                'content.required' => 'Nội dung bài viết phải không được để trống',
                'image.required' => 'Hình ảnh không được để trống',
            ]
        );

        $model = new Blog;
        $model->name = $request->name;
        $model->alias = \AppHelper::instance()->changeTitle($request->name);
        $model->tags = $request->tags;
        $model->description = $request->description;
        $model->meta_description = $request->meta_description;
        $model->image = $request->image;
        $model->is_active = $request->is_active;
        $model->content = $request->content;

        $model->save();

        return response()->json(['IsSuccess' => true]);
    }

    public function editBlog(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('BLOG_EDIT')) {
            return response()->json(['IsSuccess' => false]);
        }
        try {
            $this->validate(
                $request,
                [
                    'name' => 'required|max:100',
                    'content' => 'required',
                    'image' => 'required'
                ],
                [
                    'name.required' => 'Bạn chưa nhập tên bài viết',
                    'name.max' => 'Tên bài viết phải ít hơn 100 ký tự',
                    'content.required' => 'Nội dung bài viết phải không được để trống',
                    'image.required' => 'Hình ảnh không được để trống',
                ]
            );

            $model = Blog::find($request->id);
            $model->name = $request->name;
            $model->alias = \AppHelper::instance()->changeTitle($request->name);
            $model->tags = $request->tags;
            $model->description = $request->description;
            $model->meta_description = $request->meta_description;

            $model->is_active = $request->is_active;
            $model->content = $request->content;
            if ($model->image != $request->image) {
                $image_path_to_remove = public_path() . '/images/' . $model->image;
                unlink($image_path_to_remove);
                $model->image = $request->image;
            }
            $model->save();

            return response()->json(['IsSuccess' => true]);
        } catch (Exception $e) {
            return response()->json(['IsSuccess' => false]);
        }
    }

    public function deleteBlog(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('BLOG_DELETE')) {
            return response()->json(['IsSuccess' => false]);
        }
        $model = Blog::find($request->id);
        $model->is_deleted = 1;
        $model->save();
        return response()->json(['IsSuccess' => true]);
    }
}
