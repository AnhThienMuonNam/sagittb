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
      $tatAchUrl = $url."an_sao_tu_vi/index.php?".$this->fillParameters($request);
      $tatAchHtml = file_get_html($tatAchUrl);
      $tatAchResult = strstr($tatAchHtml->plaintext, 'nhận thấy điểm huyền khí ở cung Tật ách');
      $tatAchResult = strstr($tatAchResult, 'XemTuong.net nhận thấy điểm huyền khí ở cung Thiên di', true);
      $tatAchResult = strstr($tatAchResult, 'THIÊN DI', true);

      $sucKhoeUrl = $url."KHHB/tu_binh_bat_tu_tru/index.php?".$this->fillParameters($request);
      $sucKhoeHtml = file_get_html($sucKhoeUrl);
      $sucKhoeResult = strstr($sucKhoeHtml->plaintext, 'Sức Khẻo');
      $sucKhoeResult = strstr($sucKhoeResult, 'Hướng Dẫn Xem', true);
      $sucKhoeResult = str_replace('Sức Khẻo & Bệnh Tật', '', $sucKhoeResult);

      return response()->json(['tatAch' => $tatAchResult,
                              'sucKhoe' => $sucKhoeResult,
                              'tatAchUrl' => $tatAchUrl,
                              'sucKhoeUrl' => $sucKhoeUrl
                            ]);
  }

  function fillParameters($request){
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

    return "name=".$name."&isLunar=".$isLunar."&day=".$day."&month=".$month."&year=".$year."&gio=".$gio."&phut=".$phut."&fixhour=".$fixhour."&gender=".$gender."&year_xem=".$year_xem."&submit=Submit";
  }

  public function getAllPieces()
  {
    $result = Piece::where('is_deleted',0)->get();
    return view('admin.setting.piece',['Pieces'=>$result]);
  }

  public function editPiece(Request $request)
  {
      try {
        $this->validate($request,[
                                    'name'=>'required|max:100',
                                    'price'=>'required',
                                    'image'=>'required',
                                ],
            [
                'name.required'=>'Bạn chưa nhập tên',
                'name.max'=>'Tên phải ít hơn 100 ký tự',
                'price.required'=>'Bạn chưa nhập giá',
                'image.required'=>'Bạn chưa chọn hình ảnh'
            ]);

        $model = Piece::find($request->id);
        $model->name = $request->name;
        $model->price = $request->price;
        $model->is_active = $request->is_active;

        if($model->image != $request->image){
              $image_path_to_remove = public_path().'/images/'.$model->image;
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
        $this->validate($request,[
                                    'name'=>'required|max:100',
                                    'price'=>'required',
                                    'image'=>'required',
                                ],
            [
                'name.required'=>'Bạn chưa nhập tên',
                'name.max'=>'Tên phải ít hơn 100 ký tự',
                'price.required'=>'Bạn chưa nhập giá',
                'image.required'=>'Bạn chưa chọn hình ảnh'
            ]);

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
      $request->uploadFile->move(public_path().'/images/', $imageName);
      $response = $imageName;
      return $response;
  }

  public function deleteSingleImage(Request $request)
  {
      $image_path = public_path().'/images/'.$request->deleteFile;
      unlink($image_path);
  }

  public function getAllCharms()
  {
    $result = Charm::where('is_deleted',0)->get();
    return view('admin.setting.charm',['Charms'=>$result]);
  }

  public function editCharm(Request $request)
  {
      try {
        $this->validate($request,[
                                    'name'=>'required|max:100',
                                    'price'=>'required',
                                    'image'=>'required',
                                ],
            [
                'name.required'=>'Bạn chưa nhập tên',
                'name.max'=>'Tên phải ít hơn 100 ký tự',
                'price.required'=>'Bạn chưa nhập giá',
                'image.required'=>'Bạn chưa chọn hình ảnh'
            ]);

        $model = Charm::find($request->id);
        $model->name = $request->name;
        $model->price = $request->price;
        $model->is_active = $request->is_active;

        if($model->image != $request->image){
              $image_path_to_remove = public_path().'/images/'.$model->image;
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
        $this->validate($request,[
                                    'name'=>'required|max:100',
                                    'price'=>'required',
                                    'image'=>'required',
                                ],
            [
                'name.required'=>'Bạn chưa nhập tên',
                'name.max'=>'Tên phải ít hơn 100 ký tự',
                'price.required'=>'Bạn chưa nhập giá',
                'image.required'=>'Bạn chưa chọn hình ảnh'
            ]);

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

  public function getCleanup()
  {
    $result = [];
    $dir = File::files(public_path().'/images');
    foreach ($dir as $fileinfo) {
      $fileName = basename($fileinfo);
      array_push($result, $fileName);
    }
    return view('admin.setting.cleanup',['Items'=>$result]);
  }
}
