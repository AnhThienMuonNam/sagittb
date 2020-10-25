<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Hash;
use App\User;
use App\City;
use App\Lichsu_Tracuu;
use App\Permissions;

class Admin_AccountController extends Controller
{
  public function getAllUsers()
  {
    if (!\AppHelper::instance()->hasPermission('ACCOUNT_LIST')) {
      return view('admin.unauthorized');
    }
    $Users = User::with('city')->orderBy('name', 'desc')->get();
    $Cities = City::all();
    return view('admin.user_index', ['Users' => $Users, 'Cities' => $Cities]);
  }

  public function createUserView()
  {
    if (!\AppHelper::instance()->hasPermission('ACCOUNT_ADD')) {
      return view('admin.unauthorized');
    }
    $Cities = City::all();
    return view('admin.user_create', ['Cities' => $Cities]);
  }

  public function createUser(Request $request)
  {
    if (!\AppHelper::instance()->hasPermission('ACCOUNT_ADD')) {
      return response()->json(['IsSuccess' => false]);
    }

    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|unique:users',
      'password' => 'required|min:6|max:20',
    ], [
      'name.required' => 'Bạn chưa nhập Họ tên',
      'email.required' => 'Bạn chưa nhập email',
      'email.unique' => 'Email đã tồn tại',
      'password.required' => 'Bạn chưa nhập mật khẩu',
      'password.min' => 'Mật khẩu mới phải lớn hơn hoặc bằng 6 ký tự',
      'password.max' => 'Mật khẩu mới phải nhỏ hơn hoặc bằng 20 ký tự',
    ]);

    $model = new User;
    $model->name = $request->name;
    $model->email = $request->email;
    $model->phone = $request->phone == null ? 0 : $request->phone;
    $model->password = bcrypt($request->password);

    $model->year_ob = $request->year_ob;
    $model->month_ob = $request->month_ob;
    $model->day_ob = $request->day_ob;
    $model->hour_ob = $request->hour_ob;
    $model->minute_ob = $request->minute_ob;

    $model->is_active = $request->is_active;
    $model->is_external_account = $request->is_external_account;

    if (\AppHelper::instance()->hasPermission('OWNER')) {
      $model->is_admin = $request->is_admin;
      $model->is_owner = $request->is_owner;
    }

    $model->historical_consultant = $request->historical_consultant;

    $model->address = $request->address;
    $model->district = $request->district;
    $model->city = $request->city;
    $model->city_id = $request->city_id;
    $model->save();

    return response()->json(['IsSuccess' => true, 'UserId' => $model->id]);
  }

  public function searchUser(Request $request)
  {
    $result = User::with('city')->orderBy('name', 'desc');
    if ($request->Keyword) {
      $result = $result->where('name', 'like', '%' . $request->Keyword . '%')
        ->orwhere('email', 'like', '%' . $request->Keyword . '%')
        ->orwhere('phone', 'like', '%' . $request->Keyword . '%');
    }

    if ($request->IsAdmin != null) {
      $result = $result->where('is_admin', $request->IsAdmin);
    }

    if ($request->CityId) {
      $result = $result->where('city_id', $request->CityId);
    }

    $result = $result->get();
    return response()->json(['Users' => $result]);
  }

  public function editUserView($Id)
  {
    if (!\AppHelper::instance()->hasPermission('ACCOUNT_LIST')) {
      return view('admin.unauthorized');
    }
    $User = User::find($Id)->load('lichsu_tracuus');
    $Cities = City::all();

    return view('admin.user_edit', ['user' => $User, 'Cities' => $Cities]);
  }

  public function editUserPost(Request $request)
  {
    if (!\AppHelper::instance()->hasPermission('ACCOUNT_EDIT')) {
      return response()->json(['IsSuccess' => false]);
    }
    $this->validate($request, [
      'name' => 'required|max:50',
      'phone' => 'required|max:12',
    ], [
      'name.required' => 'Bạn chưa nhập họ tên',
      'name.max' => 'Họ tên phải ít hơn 50 ký tự',
      'phone.required' => 'Bạn chưa nhập số điện thoại',
      'phone.max' => 'Số điện thoại không hợp lệ',
    ]);

    $model = User::find($request->id);
    $model->name = $request->name;
    $model->phone = $request->phone;
    $model->year_ob = $request->year_ob;
    $model->month_ob = $request->month_ob;
    $model->day_ob = $request->day_ob;
    $model->hour_ob = $request->hour_ob;
    $model->minute_ob = $request->minute_ob;

    $model->is_active = $request->is_active;
    $model->is_external_account = $request->is_external_account;

    if (\AppHelper::instance()->hasPermission('OWNER')) {
      $model->is_admin = $request->is_admin;
      $model->is_owner = $request->is_owner;
    }

    $model->historical_consultant = $request->historical_consultant;

    $model->address = $request->address;
    $model->district = $request->district;
    $model->city = $request->city;
    $model->city_id = $request->city_id;

    $scores = $request->lichsu_tracuus;
    if ($scores) {
      foreach ($scores as $row) {
        $score = Lichsu_Tracuu::find($row['id']);
        $score->admin_result = $row['admin_result'];
        $score->save();
      }
    }
    $model->save();

    return response()->json(['IsSuccess' => true]);
  }

  public function changePasswordPost(Request $request, $Id)
  {
    $this->validate($request, [
      'OldPassword' => 'required',
      'NewPassword' => 'required|min:6|max:20',
      'NewPasswordx2' => 'required|same:NewPassword',
    ], [
      'OldPassword.required' => 'Bạn chưa nhập mật khẩu cũ',
      'NewPassword.required' => 'Bạn chưa nhập mật khẩu mới',
      'NewPassword.min' => 'Mật khẩu mới phải lớn hơn hoặc bằng 6 ký tự',
      'NewPassword.max' => 'Mật khẩu mới phải ít hơn hoặc bằng 20 ký tự',
      'NewPasswordx2.required' => 'Bạn chưa nhập xác nhận mật khẩu mới',
      'NewPasswordx2.same' => 'Mật khẩu mới không trùng nhau'
    ]);
    // bcrypt($request->Password);
    $current_password = Auth::User()->password;
    if (Hash::check($request->OldPassword, $current_password)) {
      $user_id = Auth::User()->id;
      $obj_user = User::find($user_id);
      $obj_user->password = bcrypt($request->NewPassword);
      $obj_user->save();
      return redirect(config('constants.ADMIN_PREFIX') . '/user/edit/' . $Id)->with('message', 'Đổi mật khẩu thành công');
    } else {
      return redirect(config('constants.ADMIN_PREFIX') . 'user/edit/' . $Id)->with('errorMessage', 'Mật khẩu cũ không đúng');
    }
  }

  public function getAllPermissions()
  {
    if (!\AppHelper::instance()->hasPermission('OWNER')) {
      return view('admin.unauthorized');
    }
    $adminPermissions = Permissions::where('is_active', 1)->get(['code']);
    $Permissions = Permissions::all();
    return view('admin.permissions', ['Permissions' => $Permissions, 'adminPermissions' => $adminPermissions]);
  }

  public function editPermissionsPost(Request $request)
  {
    if (!\AppHelper::instance()->hasPermission('OWNER')) {
      return response()->json(['IsSuccess' => false]);
    }

    $active =  Permissions::whereIn('id', $request->active_permissions)->update(['is_active' => 1]);
    $inactive =  Permissions::whereNotIn('id', $request->active_permissions)->update(['is_active' => 0]);

    return response()->json(['IsSuccess' => true]);
  }
}
