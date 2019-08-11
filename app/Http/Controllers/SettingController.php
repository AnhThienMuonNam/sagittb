<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Piece;
use App\Charm;
use File;

class SettingController extends Controller
{
  public function getAdvisoryView()
  {
    return view('admin.setting.advisory');
  }

  public function getAdvisoryPost(Request $request)
  {
    $url = "http://phongthuy.xemtuong.net/";
    $tatAchUrl = $url . "an_sao_tu_vi/index.php?" . $this->fillParameters($request);
    $tatAchHtml = file_get_html($tatAchUrl);
    $tatAchFilterResult = strstr($tatAchHtml->outertext, "<a name='tat_ach'>");
    $tatAchFilterResult = strstr($tatAchFilterResult, "<a name='thien_di'>", true);
    $tatAchFilterResultHtml = str_get_html($tatAchFilterResult);
    $tatAchFinalResult = '';
    foreach ($tatAchFilterResultHtml->find('.y_nghia') as $element)
      $tatAchFinalResult = $tatAchFinalResult . '- ' . $element->plaintext . '<br>';

    $sucKhoeUrl = $url . "KHHB/tu_binh_bat_tu_tru/index.php?" . $this->fillParameters($request);
    $sucKhoeHtml = file_get_html($sucKhoeUrl);
    $sucKhoeFilterResult = strstr($sucKhoeHtml->outertext, 'Sức Khẻo');
    $sucKhoeFilterResult = strstr($sucKhoeFilterResult, 'Hướng Dẫn Xem', true);

    $sucKhoeFilterResultHtml = str_get_html($sucKhoeFilterResult);
    $sucKhoeFinalResult = '';
    foreach ($sucKhoeFilterResultHtml->find('.tuvi_title_nho') as $element)
      $sucKhoeFinalResult = $sucKhoeFinalResult . '- ' . $element->plaintext . '<br>';

    //DUNGTHAN
    $thanvuong_dungthan = '';
    foreach ($sucKhoeHtml->find('.laso_title') as $element)
      $thanvuong_dungthan = $element->plaintext;

    $thanvuong_dungthan = strstr($thanvuong_dungthan, 'Thân Vượng:');

    return response()->json([
      'tatAch' => $tatAchFinalResult,
      'sucKhoe' => $sucKhoeFinalResult,
      'tatAchUrl' => $tatAchUrl,
      'thanVuong_dungThan' => $thanvuong_dungthan
    ]);
  }

  function fillParameters($request)
  {
    $name = $request->name;
    $isLunar = $request->isLunar;
    $day = $request->day;
    $month = $request->month;
    $year = $request->year;
    $gio = $request->gio;
    $phut = $request->phut;
    $fixhour = $request->fixhour;
    $gender = $request->gender;
    $year_xem = $request->year_xem;

    return "name=" . $name . "&isLunar=" . $isLunar . "&day=" . $day . "&month=" . $month . "&year=" . $year . "&gio=" . $gio . "&phut=" . $phut . "&fixhour=" . $fixhour . "&gender=" . $gender . "&year_xem=" . $year_xem . "&submit=Submit";
  }

  public function getAllPieces()
  {
    $result = Piece::where('is_deleted', 0)->get();
    return view('admin.setting.piece', ['Pieces' => $result]);
  }

  public function editPiece(Request $request)
  {
    try {
      $this->validate(
        $request,
        [
          'name' => 'required|max:100',
          'price' => 'required',
          'image' => 'required',
        ],
        [
          'name.required' => 'Bạn chưa nhập tên',
          'name.max' => 'Tên phải ít hơn 100 ký tự',
          'price.required' => 'Bạn chưa nhập giá',
          'image.required' => 'Bạn chưa chọn hình ảnh'
        ]
      );

      $model = Piece::find($request->id);
      $model->name = $request->name;
      $model->price = $request->price;
      $model->is_active = $request->is_active;

      if ($model->image != $request->image) {
        $image_path_to_remove = public_path() . '/images/' . $model->image;
        unlink($image_path_to_remove);
        $model->image = $request->image;
      }

      $model->save();

      return response()->json(['IsSuccess' => true]);
    } catch (Exception $ex) {
      return response()->json(['IsSuccess' => false]);
    }
  }

  public function createPiece(Request $request)
  {
    try {
      $this->validate(
        $request,
        [
          'name' => 'required|max:100',
          'price' => 'required',
          'image' => 'required',
        ],
        [
          'name.required' => 'Bạn chưa nhập tên',
          'name.max' => 'Tên phải ít hơn 100 ký tự',
          'price.required' => 'Bạn chưa nhập giá',
          'image.required' => 'Bạn chưa chọn hình ảnh'
        ]
      );

      $model = new Piece;
      $model->name = $request->name;
      $model->price = $request->price;
      $model->is_active = $request->is_active;
      $model->image = $request->image;
      $model->save();
      return response()->json(['IsSuccess' => true]);
    } catch (Exception $ex) {
      return response()->json(['IsSuccess' => false]);
    }
  }

  public function deletePiece(Request $request)
  {
    $piece = Piece::find($request->id);
    $piece->is_deleted = 1;
    $piece->save();
    return response()->json(['IsSuccess' => true]);
  }

  public function uploadSingleImage(Request $request)
  {
    $imageName = time() . '.' . $request->uploadFile->getClientOriginalExtension();
    $request->uploadFile->move(public_path() . '/images/', $imageName);
    $response = $imageName;
    return $response;
  }

  public function deleteSingleImage(Request $request)
  {
    $image_path = public_path() . '/images/' . $request->deleteFile;
    unlink($image_path);
  }

  public function getAllCharms()
  {
    $result = Charm::where('is_deleted', 0)->get();
    return view('admin.setting.charm', ['Charms' => $result]);
  }

  public function editCharm(Request $request)
  {
    try {
      $this->validate(
        $request,
        [
          'name' => 'required|max:100',
          'price' => 'required',
          'image' => 'required',
        ],
        [
          'name.required' => 'Bạn chưa nhập tên',
          'name.max' => 'Tên phải ít hơn 100 ký tự',
          'price.required' => 'Bạn chưa nhập giá',
          'image.required' => 'Bạn chưa chọn hình ảnh'
        ]
      );

      $model = Charm::find($request->id);
      $model->name = $request->name;
      $model->price = $request->price;
      $model->is_active = $request->is_active;

      if ($model->image != $request->image) {
        $image_path_to_remove = public_path() . '/images/' . $model->image;
        unlink($image_path_to_remove);
        $model->image = $request->image;
      }

      $model->save();

      return response()->json(['IsSuccess' => true]);
    } catch (Exception $ex) {
      return response()->json(['IsSuccess' => false]);
    }
  }

  public function createCharm(Request $request)
  {
    try {
      $this->validate(
        $request,
        [
          'name' => 'required|max:100',
          'price' => 'required',
          'image' => 'required',
        ],
        [
          'name.required' => 'Bạn chưa nhập tên',
          'name.max' => 'Tên phải ít hơn 100 ký tự',
          'price.required' => 'Bạn chưa nhập giá',
          'image.required' => 'Bạn chưa chọn hình ảnh'
        ]
      );

      $model = new Charm;
      $model->name = $request->name;
      $model->price = $request->price;
      $model->is_active = $request->is_active;
      $model->image = $request->image;
      $model->save();
      return response()->json(['IsSuccess' => true]);
    } catch (Exception $ex) {
      return response()->json(['IsSuccess' => false]);
    }
  }

  public function deleteCharm(Request $request)
  {
    $piece = Charm::find($request->id);
    $piece->is_deleted = 1;
    $piece->save();
    return response()->json(['IsSuccess' => true]);
  }
}
