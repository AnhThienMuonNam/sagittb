<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;


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
}
