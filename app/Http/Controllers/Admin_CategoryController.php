<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

class Admin_CategoryController extends Controller
{
    public function getAllCategories()
    {
        if (!\AppHelper::instance()->hasPermission('CATEGORY_LIST')) {
            return view('admin.unauthorized');
        }
        $result = Category::where('is_deleted', 0)->get();
        return view('admin.category_index', ['categories' => $result]);
    }

    public function createCategoryView()
    {
        if (!\AppHelper::instance()->hasPermission('CATEGORY_ADD')) {
            return view('admin.unauthorized');
        }

        return view('admin.category_create');
    }

    public function createCategory(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('CATEGORY_ADD')) {
            return response()->json(['IsSuccess' => false]);
        }

        $this->validate($request, ['name' => 'required|max:100'], [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.max' => 'Tên danh mục phải ít hơn 100 ký tự',
        ]);

        $model = $request;
        $category =  new Category;
        $category->name = $model->name;
        $category->alias = \AppHelper::instance()->changeTitle($model->name);
        $category->is_active = $model->is_active;
        $category->is_custom = $model->is_custom;

        $category->sizevongs = $model->sizevongs;
        $category->image = $model->image;

        $category->size_hat_name = $model->size_hat_name;
        $category->sizevong_name = $model->sizevong_name;
        $category->kieuday_name = $model->kieuday_name;

        $category->save();

        if ($model->sizehats) {
            foreach ($model->sizehats as $key => $item) {
                $obj = new Size_Hat;
                $obj->name = $item['name'];
                $obj->value = $item['value'];
                $obj->category_id = $category->id;
                $obj->save();
            }
        }

        if ($model->kieudays) {
            foreach ($model->kieudays as $key => $item) {
                $obj = new Kieuday;
                $obj->name = $item['name'];
                $obj->value = $item['value'];
                $obj->category_id = $category->id;
                $obj->save();
            }
        }

        return response()->json(['IsSuccess' => true]);
    }

    public function editCategoryView($Id)
    {
        if (!\AppHelper::instance()->hasPermission('CATEGORY_LIST')) {
            return view('admin.unauthorized');
        }
        $category = Category::find($Id);
        $category->sizeHats = Size_Hat::where('category_id', $Id)->get();
        $category->kieudays = Kieuday::where('category_id', $Id)->get();

        return view('admin.category_edit', ['category' => $category]);
    }

    public function editCategory(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('CATEGORY_EDIT')) {
            return response()->json(['IsSuccess' => false]);
        }

        $this->validate($request, ['name' => 'required|max:100'], [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.max' => 'Tên danh mục phải ít hơn 100 ký tự',
        ]);

        $model = $request;
        $category = Category::find($model->id);

        $category->name = $model->name;
        $category->alias = \AppHelper::instance()->changeTitle($model->name);
        $category->is_active = $model->is_active;
        $category->is_custom = $model->is_custom;
        if ($category->image != $model->image) {
            $image_path_to_remove = public_path() . '/images/' . $category->image;
            unlink($image_path_to_remove);
            $category->image = $model->image;
        }
        $category->sizevongs = $model->sizevongs;

        $category->size_hat_name = $model->size_hat_name;
        $category->sizevong_name = $model->sizevong_name;
        $category->kieuday_name = $model->kieuday_name;

        $Size_Hats = Size_Hat::where('category_id', $model->id)->get();
        foreach ($Size_Hats as $item) {
            $item->delete();
        }

        $Kieudays = Kieuday::where('category_id', $model->id)->get();
        foreach ($Kieudays as $item) {
            $item->delete();
        }

        if ($model->sizehats) {
            foreach ($model->sizehats as $key => $item) {
                $obj = new Size_Hat;
                $obj->name = $item['name'];
                $obj->value = $item['value'];
                $obj->category_id = $model->id;
                $obj->save();
            }
        }

        if ($model->kieudays) {
            foreach ($model->kieudays as $key => $item) {
                $obj = new Kieuday;
                $obj->name = $item['name'];
                $obj->value = $item['value'];
                $obj->category_id = $model->id;
                $obj->save();
            }
        }

        $category->save();
        return response()->json(['IsSuccess' => true]);
    }

    public function deleteCategory(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('CATEGORY_DELETE')) {
            return response()->json(['IsSuccess' => false]);
        }
        $model = Category::find($request->id);
        $model->is_deleted = 1;
        $model->save();
        return response()->json(['IsSuccess' => true]);
    }
}