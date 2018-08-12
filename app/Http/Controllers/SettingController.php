<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentInfos;
use App\StoreInfos;
use App\Feedbacks;
use App\Logo;
use App\Policies;
use App\SeoConfig;
use App\SlideIndexs;


class SettingController extends Controller
{
    //
    public function getAllBank()
    {
        $banks = PaymentInfos::all();
        return view('admin.bank.index',['banks'=>$banks]);
    }

    public function createBankView()
    {
        return view('admin.bank.create');
    }

    public function createBank(Request $request)
    {
        $this->validate($request,[
                                    'BankName'=>'required',
                                    'AccountId'=>'required',
                                    'Brand'=>'required',
                                    'Owner'=>'required',
                                ],
            [
                'BankName.required'=>'Bạn chưa nhập tên ngân hàng',
                'AccountId.required'=>'Bạn chưa nhập số tài khoản',
                'Brand.required'=>'Bạn chưa nhập chi nhánh ngân hàng',
                'Owner.required'=>'Bạn chưa nhập tên chủ tài khoản',
            ]);

        $model = new PaymentInfos;
        $model->BankName = $request->BankName;
        $model->Brand = $request->Brand;
        $model->AccountId = $request->AccountId;
        $model->Owner = $request->Owner;

        $model->save();
        return redirect('admin/bank/create')->with('message','Thêm thành công');
    }

    public function deleteBank(Request $request)
    {
        $model = PaymentInfos::find($request->Id);
        $model->delete();
        return response()->json(['message' => 'Đã xóa thành công']);
    }

    public function getAllStore()
    {
        $stores = StoreInfos::all();
        return view('admin.store.index',['stores'=>$stores]);
    }

    public function createStoreView()
    {
        return view('admin.store.create');
    }

    public function createStore(Request $request)
    {   
         $this->validate($request,[
                                    'Name'=>'required',
                                ],
            [
                'Name.required'=>'Bạn chưa nhập tên ngân hàng',
            ]);

        $model = new StoreInfos;
        $model->Name = $request->Name;
        $model->PhoneNumber = $request->PhoneNumber;
        $model->Email = $request->Email;
        $model->WorkingTime = $request->WorkingTime;

        $model->save();
        return redirect('admin/store/create')->with('message','Thêm thành công');
    }

    public function deleteStore(Request $request)
    {
        $model = StoreInfos::find($request->Id);
        $model->delete();
        return response()->json(['message' => 'Đã xóa thành công']);
    }



    //feedback
    public function getAllFeedback()
    {
        $feedbacks = Feedbacks::all();
        return view('admin.feedback.index',['feedbacks'=>$feedbacks]);
    }

    public function createFeedbackView()
    {
        return view('admin.feedback.create');
    }

    public function createFeedback(Request $request)
    {   
         $this->validate($request,[
                                    'Author'=>'required',
                                    'Content'=>'required'
                                ],
            [
                'Author.required'=>'Bạn chưa nhập tên người viết',
                'Content.required'=>'Bạn chưa nhập tên người viết'
            ]);

        $model = new Feedbacks;
        $model->Author = $request->Author;
        $model->Content = $request->Content;
       

        $model->save();
        return redirect('admin/feedback/create')->with('message','Thêm thành công');
    }

    public function deleteFeedback(Request $request)
    {
        $model = Feedbacks::find($request->Id);
        $model->delete();
        return response()->json(['message' => 'Đã xóa thành công']);
    }
    //end feedback

    //logo
    public function editLogoView()
    {
        $logo_favicon = Logo::all();
        return view('admin.logo.edit',['logo_favicon'=>$logo_favicon]);
    }

    public function editLogo(Request $request)
    {   
        $model = Logo::where('Type',$request->Type)->first();
       
        $path = public_path();
        $image_path = public_path().'/images/'.$model->Logo;  
        unlink($image_path);

        //upload
        $imageName = time() . '.' . $request->uploadFile->getClientOriginalExtension();
        $request->uploadFile->move(public_path().'/images/', $imageName);

        $model->Logo = $imageName;

        $model->save();

        return response()->json(['logo' => $model->Logo]);
    }
    //end logo


    //about us
    public function editAboutUsView()
    {
        //1: ve chung toi
        //2: su kien
        //3: .....
        $about_us = Policies::where('Type',1)->first();
        return view('admin.aboutus.edit',['about_us'=>$about_us]);
    }

    public function editAboutUs(Request $request)
    {   
         // $this->validate($request,[
         //                            'Author'=>'required',
         //                            'Content'=>'required'
         //                        ],
         //    [
         //        'Author.required'=>'Bạn chưa nhập tên người viết',
         //        'Content.required'=>'Bạn chưa nhập tên người viết'
         //    ]);

        $model = Policies::where('Type',1)->first();
      
        $model->Content = $request->Content;

        $model->save();
        return redirect('admin/aboutus')->with('message','Cập nhật thành công');
        // return response()->json(['about_us' => $model]);
    }
    //end about us


    // event
    public function editEventView()
    {
        //1: ve chung toi
        //2: su kien
        //3: .....
        $event = Policies::where('Type',2)->first();
        return view('admin.event.edit',['event'=>$event]);
    }

    public function editEvent(Request $request)
    {   
         // $this->validate($request,[
         //                            'Author'=>'required',
         //                            'Content'=>'required'
         //                        ],
         //    [
         //        'Author.required'=>'Bạn chưa nhập tên người viết',
         //        'Content.required'=>'Bạn chưa nhập tên người viết'
         //    ]);

        $model = Policies::where('Type',2)->first();
      
        $model->Content = $request->Content;

        $model->save();
        return redirect('admin/event')->with('message','Cập nhật thành công');
        // return response()->json(['about_us' => $model]);
    }
    // end event


    // huong dan mua hang
    public function editGuideView()
    {
        //1: ve chung toi
        //2: su kien
        //3: huong dan mua hang
        $guide = Policies::where('Type',3)->first();
        return view('admin.guide.edit',['guide'=>$guide]);
    }

    public function editGuide(Request $request)
    {   
         // $this->validate($request,[
         //                            'Author'=>'required',
         //                            'Content'=>'required'
         //                        ],
         //    [
         //        'Author.required'=>'Bạn chưa nhập tên người viết',
         //        'Content.required'=>'Bạn chưa nhập tên người viết'
         //    ]);

        $model = Policies::where('Type',3)->first();
      
        $model->Content = $request->Content;

        $model->save();
        return redirect('admin/guide')->with('message','Cập nhật thành công');
        // return response()->json(['about_us' => $model]);
    }
    // end huong dan mua hang


    //chinh sach giao hang - policy
    public function getAllPolicy()
    {
        //1: ve chung toi
        //2: su kien
        //3: huong dan mua hang
        //4: chinh sach giao hang
        $policies = $model = Policies::where('Type',4)->get();
        return view('admin.policy.index',['policies'=>$policies]);
    }

    public function createPolicyView()
    {
        return view('admin.policy.create');
    }

    public function createPolicy(Request $request)
    {   
         $this->validate($request,[
                                    'Title'=>'required',
                                    'Content'=>'required'
                                ],
            [
                'Title.required'=>'Bạn chưa nhập tiêu đề',
                'Content.required'=>'Bạn chưa nhập nội dung'
            ]);

        $model = new Policies;
        $model->Type = 4;
        $model->Title = $request->Title;
        $model->Content = $request->Content;
       

        $model->save();
        return redirect('admin/policy/create')->with('message','Thêm thành công');
    }

    public function deletePolicy(Request $request)
    {
        $model = Policies::find($request->Id);
        $model->delete();
        return response()->json(['message' => 'Đã xóa thành công']);
    }
    //end chinh sach giao hang - policy


    //chinh dai ly
    public function getAllPolicyb()
    {
        //1: ve chung toi
        //2: su kien
        //3: huong dan mua hang
        //4: chinh sach giao hang
        //5: chinh sach dai ly

        $policiesb = $model = Policies::where('Type',5)->get();
        return view('admin.policyb.index',['policiesb'=>$policiesb]);
    }

    public function createPolicybView()
    {
        return view('admin.policyb.create');
    }

    public function createPolicyb(Request $request)
    {   
         $this->validate($request,[
                                    'Title'=>'required',
                                    'Content'=>'required'
                                ],
            [
                'Title.required'=>'Bạn chưa nhập tiêu đề',
                'Content.required'=>'Bạn chưa nhập nội dung'
            ]);

        $model = new Policies;
        $model->Type = 5;
        $model->Title = $request->Title;
        $model->Content = $request->Content;
       

        $model->save();
        return redirect('admin/policyb/create')->with('message','Thêm thành công');
    }

    public function deletePolicyb(Request $request)
    {
        $model = Policies::find($request->Id);
        $model->delete();
        return response()->json(['message' => 'Đã xóa thành công']);
    }
    //end chinh sach dai ly


    //seoconfig
    public function editSeoView()
    {
        //1: ve chung toi
        //2: su kien
        //3: huong dan mua hang
        $seo = SeoConfig::all()->first();
        return view('admin.seo.edit',['seo'=>$seo]);
    }

    public function editSeo(Request $request)
    {   
         // $this->validate($request,[
         //                            'Author'=>'required',
         //                            'Content'=>'required'
         //                        ],
         //    [
         //        'Author.required'=>'Bạn chưa nhập tên người viết',
         //        'Content.required'=>'Bạn chưa nhập tên người viết'
         //    ]);

        $model = SeoConfig::all()->first();
      
        $model->Title = $request->Title;

        $model->Description = $request->Description;
        $model->Keyword = $request->Keyword;
        $model->Other = $request->Other;

        $model->save();
        return redirect('admin/seo')->with('message','Cập nhật thành công');
    }
    //end
    
    //slide
    public function getAllSlide()
    {
        $slides = SlideIndexs::all();
        return view('admin.slide.index',['slides'=>$slides]);
    }

    public function createSlideView()
    {
        return view('admin.slide.create');
    }


     public function deleteSlide(Request $request)
    {
        $model = SlideIndexs::find($request->Id);

        $path = public_path();
        $image_path = public_path().'/images/'.$model->Image;  
        unlink($image_path);
   
        $model->delete();
        return response()->json(['message' => 'Đã xóa thành công']);
    }

    public function createSlide(Request $request)
    {
          $this->validate($request,[
                                     'Title'=>'required|max:100',
                                     'Image'=>'required'
                                ],
             [
                 'Title.required'=>'Bạn chưa nhập tiêu đề',
             	    'Title.max'=>'Tiêu đề phải ít hơn 100 ký tự',
                 'Image.required'=>'Bạn chưa chọn hình ảnh'
             ]);
        $model = new SlideIndexs;
        $model->Title = $request->Title;
        $model->Image = $request->Image;
       

        $model->save();
        return redirect('admin/slide/create')->with('message','Thêm thành công');
    }
    //end slide
}
