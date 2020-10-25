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

class Admin_ProductController extends Controller
{
    public function getAllProducts()
    {
        if (!\AppHelper::instance()->hasPermission('PRODUCT_LIST')) {
            return view('admin.unauthorized');
        }
        $Products = Product::with('category')->where('is_deleted', 0)->get();
        $Categories = Category::where('is_deleted', 0)->get();

        return view('admin.product_index', ['Products' => $Products, 'Categories' => $Categories]);
    }

    public function searchProduct(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('PRODUCT_LIST')) {
            return response()->json(['result' => null]);
        }

        $result = Product::with('category')->where('is_deleted', 0);
        if ($request->sKeyword) {
            $result = $result->where('name', 'like', '%' . $request->sKeyword . '%')->orwhere('alias', 'like', '%' . $request->sKeyword . '%');
        }

        if ($request->sCategoryId) {
            $result = $result->where('category_id', $request->sCategoryId);
        }
        if ($request->sIsActive != null) {
            $result = $result->where('is_active', $request->sIsActive);
        }

        $result = $result->orderBy('created_at', 'desc')->get();

        return response()->json(['result' => $result]);
    }

    public function editProductView($Id)
    {
        if (!\AppHelper::instance()->hasPermission('PRODUCT_LIST')) {
            return view('admin.unauthorized');
        }
        $Product = Product::find($Id);
        $Categories = Category::where('is_deleted', 0)->get();
        $Pieces = Piece::where('is_deleted', 0)->get();

        return view('admin.product_edit', ['Product' => $Product, 'Categories' => $Categories, 'Pieces' => $Pieces]);
    }

    public function editProduct(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('PRODUCT_EDIT')) {
            return response()->json(['IsSuccess' => false]);
        }
        try {
            $this->validate(
                $request,
                [
                    'name' => 'required|max:100',
                    'price' => 'required|numeric|min:1000',
                    'category_id' => 'required',
                    'piece_id' => 'required',
                    'description' => 'max:1990'
                ],
                [
                    'name.required' => 'Bạn chưa nhập tên sản phẩm',
                    'name.max' => 'Tên sản phẩm phải ít hơn 100 ký tự',
                    'price.required' => 'Bạn chưa nhập giá sản phẩm',
                    'price.min' => 'Giá sản phẩm phải lớn hơn 1000 (một ngàn)',
                    'category_id.required' => 'Bạn chưa chọn danh mục',
                    'piece_id.required' => 'Bạn chưa chọn hạt',
                    'description.max' => 'Mô tả phải ít hơn 1990 ký tự'
                ]
            );

            $model = Product::find($request->id);
            $model->name = $request->name;
            $model->alias = \AppHelper::instance()->changeTitle($request->name);
            $model->price = $request->price;
            $model->tags = $request->tags;
            $model->description = $request->description;
            $model->meta_description = $request->meta_description;
            $model->category_id = $request->category_id;

            $model->piece_id = $request->piece_id;
            $model->quantity_of_pieces = $request->quantity_of_pieces;

            $model->images = $request->images;

            if ($request->is_active)
                $model->is_active = 1;
            else
                $model->is_active = 0;

            if ($request->is_hot)
                $model->is_hot = 1;
            else
                $model->is_hot = 0;

            //images
            if ($request->removeImages) {
                foreach ($request->removeImages as $key => $item) {
                    $image_path = public_path() . '/images/' . $item;
                    unlink($image_path);
                }
            }

            $model->save();

            return response()->json(['IsSuccess' => true]);
        } catch (Exception $e) {
            return response()->json(['IsSuccess' => false]);
        }
    }

    public function createProductView()
    {
        if (!\AppHelper::instance()->hasPermission('PRODUCT_ADD')) {
            return view('admin.unauthorized');
        }
        $Categories = Category::where('is_deleted', 0)->get();
        $Pieces = Piece::where('is_deleted', 0)->get();

        return view('admin.product_create', ['Categories' => $Categories, 'Pieces' => $Pieces]);
    }

    public function createProduct(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('PRODUCT_ADD')) {
            return response()->json(['IsSuccess' => false]);
        }
        $this->validate(
            $request,
            [
                'name' => 'required|max:100',
                'price' => 'required|numeric|min:1000',
                'category_id' => 'required',
                'piece_id' => 'required',
                'description' => 'max:1990'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên sản phẩm',
                'name.max' => 'Tên sản phẩm phải ít hơn 100 ký tự',
                'price.required' => 'Bạn chưa nhập giá sản phẩm',
                'price.min' => 'Giá sản phẩm phải lớn hơn 1000 (một ngàn)',
                'category_id.required' => 'Bạn chưa chọn danh mục',
                'piece_id.required' => 'Bạn chưa chọn hạt',
                'description.max' => 'Mô tả phải ít hơn 1990 ký tự'
            ]
        );

        $model = new Product;
        $model->name = $request->name;
        $model->alias = \AppHelper::instance()->changeTitle($request->name);
        $model->price = $request->price;
        $model->tags = $request->tags;
        $model->description = $request->description;
        $model->meta_description = $request->meta_description;
        $model->category_id = $request->category_id;

        $model->piece_id = $request->piece_id;
        $model->quantity_of_pieces = $request->quantity_of_pieces;

        $model->images = $request->images;

        if ($request->is_active)
            $model->is_active = 1;
        else
            $model->is_active = 0;

        if ($request->is_hot)
            $model->is_hot = 1;
        else
            $model->is_hot = 0;

        $model->save();

        return response()->json(['IsSuccess' => true]);
    }

    public function deleteProduct(Request $request)
    {
        if (!\AppHelper::instance()->hasPermission('PRODUCT_DELETE')) {
            return response()->json(['IsSuccess' => false]);
        }
        $model = Product::find($request->id);
        $model->is_deleted = 1;
        $model->save();
        return response()->json(['IsSuccess' => true]);
    }
}
