<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class websiteSettingController extends Controller
{
    public function b2cVisaManagement(Request $request){
        try{
            $rows1 = DB::table('b2c_visa_country')->where('agent_id',Session::get('agent_id'))->get();
            $rows2 = DB::table('b2c_visa')->where('agent_id',Session::get('agent_id'))->orderBy('id','desc')->get();
            return view('websiteSetting.visaManagement',['countries' => $rows1,'visas' => $rows2]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editB2CVisaPage(Request $request){
        try{
            $rows1 = DB::table('b2c_visa_country')->where('agent_id',Session::get('agent_id'))->get();
            $rows2 = DB::table('b2c_visa')->where('agent_id',Session::get('agent_id'))->where('id',$request->id)->first();
            return view('websiteSetting.editB2CVisaPage',['countries' => $rows1,'visas' => $rows2]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function createNewB2CVisa(Request $request){
        try{
            //dd($request);
            $fileName = time() . '.' . $request->v_c_photo->extension();
            $request->v_c_photo->move(public_path('images/upload/company/'), $fileName);
            $logo = 'public/images/upload/company/'.$fileName;
            $result = DB::table('b2c_visa')->insert([
                'agent_id' => Session::get('agent_id'),
                'country' => $request->c_name,
                'title' => $request->title,
                'v_c_photo' => $logo,
                'a_price' => $request->a_price,
                'c_price' => $request->c_price,
                'slug' => $request->slug,
                'keyword' =>  json_encode($request->keyword),
                'description' => json_encode($request->description),
                'requirements' => json_encode($request->requirements),
                'price_details' => json_encode($request->p_details),
                'em_info' => json_encode($request->em_info),
            ]);
            if ($result) {
                return redirect()->to('b2cVisaManagement')->with('successMessage', 'New Visa Service Added Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editNewB2CVisa(Request $request){
        try {
            if ($request) {
                $rows = DB::table('b2c_visa')->where('agent_id',Session::get('agent_id'))->where('id',$request->id)->first();
                if($request->v_c_photo){
                    $fileName = time() . '.' . $request->v_c_photo->extension();
                    $request->v_c_photo->move(public_path('images/upload/company/'), $fileName);
                    $logo = 'public/images/upload/company/'.$fileName;
                }
                else{
                    $logo =   $rows->v_c_photo;
                }
                $result =DB::table('b2c_visa')
                    ->where('id', $rows->id)
                    ->where('agent_id',Session::get('agent_id'))
                    ->update([
                        'country' => $request->c_name,
                        'title' => $request->title,
                        'v_c_photo' => $logo,
                        'slug' => $request->slug,
                        'a_price' => $request->a_price,
                        'c_price' => $request->c_price,
                        'keyword' =>  json_encode($request->keyword),
                        'description' => json_encode($request->description),
                        'requirements' => json_encode($request->requirements),
                        'price_details' => json_encode($request->p_details),
                        'em_info' => json_encode($request->em_info),
                    ]);
                if($result){
                    return back()->with('successMessage', 'Visa Updated Successfully!!');
                }
                else{
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteB2CVisaManagement(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_visa')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('b2cVisaManagement')->with('successMessage', 'Visa deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function b2cCompany(Request $request){
        try{
            $rows = DB::table('company_info')->where('agent_id',Session::get('agent_id'))->first();
            return view('websiteSetting.companyInfo',['info' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addCompanyInfo(Request $request){
        try {
            if ($request) {
                $rows = DB::table('company_info')->where('agent_id',Session::get('agent_id'))->get()->count();
                if($rows>0){
                    $rows = DB::table('company_info')->where('agent_id',Session::get('agent_id'))->first();
                    if($request->logo){
                        $request->validate([
                            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                        ]);

                        $fileName = time() . '.' . $request->logo->extension();
                        $request->logo->move(public_path('images/upload/company/'), $fileName);
                        $logo = 'public/images/upload/company/'.$fileName;
                    }
                    else{
                        $logo =   $rows->logo;
                    }
                    $result =DB::table('company_info')
                        ->where('id', $rows->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'phone1' => $request->phone1,
                            'phone2' => $request->phone2,
                            'currency' => $request->currency,
                            'symbol' => $request->symbol,
                            'address' => $request->address,
                            'tagline' => $request->tagline,
                            'logo' => $logo,
                            'f_link' => $request->f_link,
                            'in_link' => $request->in_link,
                            'y_link' => $request->y_link,
                            'about_us' => json_encode($request->about_us),
                            'privacy_policy' => json_encode($request->privacy_policy),
                            'tnt' => json_encode($request->tnt),
                            'r_policy' => json_encode($request->r_policy),
                            'c_policy' => json_encode($request->c_policy),
                        ]);
                    if($result){
                        return back()->with('successMessage', 'Company Updated Successfully!!');
                    }
                    else{
                        return back()->with('errorMessage', 'Please Try Again!!');
                    }
                }
                else{
                    $request->validate([
                        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);

                    $fileName = time() . '.' . $request->logo->extension();
                    $request->logo->move(public_path('images/upload/company/'), $fileName);
                    $logo = 'public/images/upload/company/'.$fileName;

                    $result = DB::table('company_info')->insert([
                        'agent_id' => Session::get('agent_id'),
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone1' => $request->phone1,
                        'phone2' => $request->phone2,
                        'currency' => $request->currency,
                        'symbol' => $request->symbol,
                        'address' => $request->address,
                        'tagline' => $request->tagline,
                        'logo' => $logo,
                        'f_link' => $request->f_link,
                        'in_link' => $request->in_link,
                        'y_link' => $request->y_link,
                        'about_us' => json_encode($request->about_us),
                        'privacy_policy' => json_encode($request->privacy_policy),
                        'tnt' => json_encode($request->tnt),
                        'r_policy' => json_encode($request->r_policy),
                        'c_policy' => json_encode($request->c_policy),
                    ]);
                    if($result){
                        return back()->with('successMessage', 'Company Added Successfully!!');
                    }
                    else{
                        return back()->with('errorMessage', 'Please Try Again!!');
                    }
                }
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function tourPackCountry(Request $request){
        try{
            $rows = DB::table('b2c_tour_package_country')->where('agent_id',Session::get('agent_id'))->orderBy('id','desc')->get();
            return view('websiteSetting.tourPackCountry',['countries' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function b2cManpowerCountry(Request $request){
        try{
            $rows = DB::table('b2c_manpower_country')->where('agent_id',Session::get('agent_id'))->orderBy('id','desc')->get();
            return view('websiteSetting.b2cManpowerCountry',['countries' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function b2cVisaCountry(Request $request){
        try{
            $rows = DB::table('b2c_visa_country')->where('agent_id',Session::get('agent_id'))->orderBy('id','desc')->get();
            return view('websiteSetting.b2cVisaCountry',['countries' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addTourPackCountry(Request $request){
        try{
            //dd($request);
            $result = DB::table('b2c_tour_package_country')->insert([
                'agent_id' => Session::get('agent_id'),
                'name' => $request->name,
            ]);
            if ($result) {
                return redirect()->to('tourPackCountry')->with('successMessage', 'New Country Added Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public  function addManpowerCountry(Request $request){
        try{
            //dd($request);
            $result = DB::table('b2c_manpower_country')->insert([
                'agent_id' => Session::get('agent_id'),
                'name' => $request->name,
            ]);
            if ($result) {
                return redirect()->to('b2cManpowerCountry')->with('successMessage', 'New Country Added Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addVisaCountry(Request $request){
        try{
            $result = DB::table('b2c_visa_country')->insert([
                'agent_id' => Session::get('agent_id'),
                'name' => $request->name,
            ]);
            if ($result) {
                return redirect()->to('b2cVisaCountry')->with('successMessage', 'New Country Added Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editTourCountryName (Request $request){
        try{
            $rows1 = DB::table('b2c_tour_package_country')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->first();
            return view('websiteSetting.editTourCountryName',['tours' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editVisaCountryName (Request $request){
        try{
            $rows1 = DB::table('b2c_visa_country')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->first();
            return view('websiteSetting.editVisaCountryName',['visa' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editTourPackCountry (Request $request){
        try{
            $result = DB::table('b2c_tour_package_country')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->update([
                    'name' => $request->name,
                ]);
            if ($result) {
                return redirect()->to('tourPackCountry')->with('successMessage', 'Country Updated Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editManpowerCountryName (Request $request){
        try{
            $rows1 = DB::table('b2c_manpower_country')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->first();
            return view('websiteSetting.editManpowerCountryName',['visa' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editManpowerPackCountry (Request $request){
        try{
            $result = DB::table('b2c_manpower_country')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->update([
                    'name' => $request->name,
                ]);
            if ($result) {
                return redirect()->to('b2cManpowerCountry')->with('successMessage', 'Country Updated Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editVisaPackCountry (Request $request){
        try{
            $result = DB::table('b2c_visa_country')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->update([
                    'name' => $request->name,
                ]);
            if ($result) {
                return redirect()->to('b2cVisaCountry')->with('successMessage', 'Country Updated Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteTourCountryName(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_tour_package_country')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('tourPackCountry')->with('successMessage', 'Country deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteVisaCountryName(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_visa_country')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('b2cVisaCountry')->with('successMessage', 'Country deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteManpowerCountryName(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_manpower_country')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('b2cManpowerCountry')->with('successMessage', 'Country deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function b2cTourPackage(Request $request){
        try{
            $rows2 = DB::table('vendors')->where('agent_id',Session::get('agent_id'))->get();
            $rows = DB::table('b2c_tour_package')->where('agent_id',Session::get('agent_id'))->get();
            $rows1 = DB::table('b2c_tour_package_country')->where('agent_id',Session::get('agent_id'))->get();
            return view('websiteSetting.b2cTourPackage',['packages' => $rows,'countries' => $rows1,'vendors' => $rows2]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addB2CTourPackage(Request $request){
        try{
            $fileName = time() . '.' . $request->p_c_photo->extension();
            $request->p_c_photo->move(public_path('images/upload/tour/'), $fileName);
            $p_c_photo = 'public/images/upload/tour/'.$fileName;
            $i = 0;
            foreach ($request->p_m_photo as $photos){
                $fileName = $i.time() . '.' . $photos->extension();
                $photos->move(public_path('images/upload/tour/'), $fileName);
                $p_m_photo[$i] = 'public/images/upload/tour/'.$fileName;
                $i++;
                echo $i;
            }
            $p_m_photos = json_encode($p_m_photo);
            $result = DB::table('b2c_tour_package')->insert([
                'agent_id' => Session::get('agent_id'),
                'c_name' => $request->c_name,
                'p_name' => $request->p_name,
                'p_code' => $request->p_code,
                'night' => $request->night,
                'p_c_photo' => $p_c_photo,
                'p_m_photo' => $p_m_photos,
                'p_p_adult' => $request->p_p_adult,
                'p_p_child' => $request->p_p_child,
                'slug' => $request->slug,
                'vendor' => $request->vendor,
                'highlights' => json_encode($request->highlights),
                'title' => json_encode($request->title),
                'itinary' => json_encode($request->description),
                'inclusion' => json_encode($request->inclusion),
                'exclusion' => json_encode($request->exclusion),
                'tnt' => json_encode($request->tnt),
                'include' => json_encode($request->include),
            ]);
            if($result){
                return back()->with('successMessage', 'Tour Package Added Successfully!!');
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function editB2CTourPackagePage(Request $request){
        try{
            $rows = DB::table('b2c_tour_package')->where('id',$request->id)->first();
            $rows1 = DB::table('b2c_tour_package_country')->get();
            $rows2 = DB::table('vendors')->where('agent_id',Session::get('agent_id'))->get();
            return view('websiteSetting.editB2CTourPackagePage',['package' => $rows,'countries' => $rows1,'vendors' => $rows2]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editB2CTourPackage (Request $request){
        try{
            $rows = DB::table('b2c_tour_package')->where('agent_id',Session::get('agent_id'))->where('id',$request->id)->first();
            if($request->p_c_photo){
                $fileName = time() . '.' . $request->p_c_photo->extension();
                $request->p_c_photo->move(public_path('images/upload/tour/'), $fileName);
                $p_c_photo = 'public/images/upload/tour/'.$fileName;
            }
            else{
                $p_c_photo = $rows->p_c_photo;
            }
            if($request->p_m_photo){
                $i = 0;
                foreach ($request->p_m_photo as $photos){
                    $fileName = $i.time() . '.' . $photos->extension();
                    $photos->move(public_path('images/upload/tour/'), $fileName);
                    $p_m_photo[$i] = 'public/images/upload/tour/'.$fileName;
                    $i++;
                    echo $i;
                }
                $p_m_photos = json_encode($p_m_photo);
            }
            else{
                $p_m_photos = $rows->p_m_photo;
            }
            $result = DB::table('b2c_tour_package')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->update([
                    'c_name' => $request->c_name,
                    'p_name' => $request->p_name,
                    'p_code' => $request->p_code,
                    'night' => $request->night,
                    'p_c_photo' => $p_c_photo,
                    'p_m_photo' => $p_m_photos,
                    'p_p_adult' => $request->p_p_adult,
                    'p_p_child' => $request->p_p_child,
                    'slug' => $request->slug,
                    'vendor' => $request->vendor,
                    'highlights' => json_encode($request->highlights),
                    'title' => json_encode($request->title),
                    'itinary' => json_encode($request->description),
                    'inclusion' => json_encode($request->inclusion),
                    'exclusion' => json_encode($request->exclusion),
                    'tnt' => json_encode($request->tnt),
                    'include' => json_encode($request->include),
                ]);
            if ($result) {
                return redirect()->to('b2cTourPackage')->with('successMessage', 'Tour Package Updated Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteB2CTourPackage(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_tour_package')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('b2cTourPackage')->with('successMessage', 'Tour Package deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function b2cManpowerManagement(Request $request){
        try{
            $rows = DB::table('b2c_manpower')->where('agent_id',Session::get('agent_id'))->get();
            $rows1 = DB::table('b2c_manpower_country')->where('agent_id',Session::get('agent_id'))->get();
            return view('websiteSetting.b2cManpowerManagement',['packages' => $rows,'countries' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addB2CManpower(Request $request){
        try{
            $fileName = time() . '.' . $request->c_photo->extension();
            $request->c_photo->move(public_path('images/upload/manpower/'), $fileName);
            $c_photos = 'public/images/upload/manpower/'.$fileName;

            $result = DB::table('b2c_manpower')->insert([
                'agent_id' => Session::get('agent_id'),
                'country' => $request->c_name,
                'c_photo' => $c_photos,
                'salary' => $request->salary,
                'period' => $request->period,
                'accommodation' => $request->accommodation,
                'slug' => $request->slug,
                'requirements' => json_encode($request->requirements),
                'responsibilities' => json_encode($request->responsibilities),
                'p_time' => json_encode($request->p_time),
                'p_method' => json_encode($request->p_method),
                'r_policy' => json_encode($request->r_policy),
                'tnt' => json_encode($request->tnt),
                'exclusion' => json_encode($request->exclusion),
            ]);
            if($result){
                return back()->with('successMessage', 'Manpower Package Added Successfully!!');
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editB2CManpowerPackagePage(Request $request){
        try{
            $rows = DB::table('b2c_manpower')->where('id',$request->id)->first();
            $rows1 = DB::table('b2c_manpower_country')->get();
            return view('websiteSetting.editB2CManpowerPackagePage',['package' => $rows,'countries' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editB2CManpowerPackage (Request $request){
        try{
            $rows = DB::table('b2c_manpower')->where('agent_id',Session::get('agent_id'))->where('id',$request->id)->first();
            if($request->c_photo){
                $fileName = time() . '.' . $request->c_photo->extension();
                $request->c_photo->move(public_path('images/upload/manpower/'), $fileName);
                $c_photo = 'public/images/upload/manpower/'.$fileName;
            }
            else{
                $c_photo = $rows->c_photo;
            }
            $result = DB::table('b2c_manpower')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->update([
                    'country' => $request->c_name,
                    'c_photo' => $c_photo,
                    'salary' => $request->salary,
                    'period' => $request->period,
                    'accommodation' => $request->accommodation,
                    'slug' => $request->slug,
                    'requirements' => json_encode($request->requirements),
                    'responsibilities' => json_encode($request->responsibilities),
                    'p_time' => json_encode($request->p_time),
                    'p_method' => json_encode($request->p_method),
                    'r_policy' => json_encode($request->r_policy),
                    'tnt' => json_encode($request->tnt),
                    'exclusion' => json_encode($request->exclusion),
                ]);
            if ($result) {
                return redirect()->to('b2cManpowerManagement')->with('successMessage', 'Manpower Package Updated Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteB2CManpowerPackage(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_manpower')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('b2cManpowerManagement')->with('successMessage', 'Manpower Package deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function b2cServiceManagement(Request $request){
        try{
            $rows = DB::table('b2c_service')->where('agent_id',Session::get('agent_id'))->get();
            return view('websiteSetting.b2cServiceManagement',['services' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function addB2CServices(Request $request)
    {
        try {
            // 📸 Cover Photo Upload
            $fileName = time() . '.' . $request->c_photo->extension();
            $request->c_photo->move(public_path('images/upload/services/'), $fileName);
            $c_photo = 'public/images/upload/services/' . $fileName;

            // 🧑‍💼 Consultant Information Handling
            $consultants = [];
            if ($request->has('consultant_name')) {
                foreach ($request->consultant_name as $index => $name) {
                    $photoPath = null;
                    if ($request->hasFile('consultant_photo') && isset($request->consultant_photo[$index])) {
                        $photo = $request->consultant_photo[$index];
                        $photoName = time() . '_' . uniqid() . '.' . $photo->extension();
                        $photo->move(public_path('images/upload/consultants/'), $photoName);
                        $photoPath = 'public/images/upload/consultants/' . $photoName;
                    }

                    $consultants[] = [
                        'name' => $name,
                        'designation' => $request->consultant_designation[$index] ?? '',
                        'institute' => $request->consultant_institute[$index] ?? '',
                        'photo' => $photoPath,
                    ];
                }
            }

            // 🎓 Student Review Handling
            $reviews = [];
            if ($request->has('student_name')) {
                foreach ($request->student_name as $index => $name) {
                    $photoPath = null;
                    if ($request->hasFile('student_photo') && isset($request->student_photo[$index])) {
                        $photo = $request->student_photo[$index];
                        $photoName = time() . '_' . uniqid() . '.' . $photo->extension();
                        $photo->move(public_path('images/upload/reviews/'), $photoName);
                        $photoPath = 'public/images/upload/reviews/' . $photoName;
                    }

                    $reviews[] = [
                        'name' => $name,
                        'review' => $request->student_review[$index] ?? '',
                        'photo' => $photoPath,
                    ];
                }
            }

            // 💾 Insert into Database
            $result = DB::table('b2c_service')->insert([
                'agent_id' => Session::get('agent_id'),
                'name' => $request->name,
                'title' => $request->title,
                'slug' => $request->slug,
                'c_photo' => $c_photo,
                's_details' => json_encode($request->s_details),
                'p_method' => json_encode($request->p_method),
                'exclusion' => json_encode($request->exclusion),
                'tnt' => json_encode($request->tnt),

                // ✅ only 2 columns for all data
                'consultant_info' => json_encode($consultants),
                'review_info' => json_encode($reviews),
            ]);

            if ($result) {
                return back()->with('successMessage', 'New Service Added Successfully!');
            } else {
                return back()->with('errorMessage', 'Please Try Again!');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        } catch (\Exception $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editB2CServicePage(Request $request)
    {
        try {
            $rows = DB::table('b2c_service')->where('id', $request->id)->first();

            // Decode JSON data
            $rows->consultant_info = json_decode($rows->consultant_info, true);
            $rows->review_info = json_decode($rows->review_info, true);

            return view('websiteSetting.editB2CServicePage', ['package' => $rows]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function editB2CService(Request $request)
    {
        try {
            $rows = DB::table('b2c_service')
                ->where('agent_id', Session::get('agent_id'))
                ->where('id', $request->id)
                ->first();

            // ✅ Cover Photo Handling
            if ($request->hasFile('c_photo')) {
                $fileName = time() . '.' . $request->c_photo->extension();
                $request->c_photo->move(public_path('images/upload/services/'), $fileName);
                $c_photo = 'public/images/upload/services/' . $fileName;
            } else {
                $c_photo = $rows->c_photo;
            }

            // 🧑‍💼 Consultant Info Handling
            $consultants = [];
            if ($request->has('consultant_name')) {
                foreach ($request->consultant_name as $index => $name) {
                    $photoPath = null;
                    if ($request->hasFile('consultant_photo') && isset($request->consultant_photo[$index])) {
                        $photo = $request->consultant_photo[$index];
                        $photoName = time() . '_' . uniqid() . '.' . $photo->extension();
                        $photo->move(public_path('images/upload/consultants/'), $photoName);
                        $photoPath = 'public/images/upload/consultants/' . $photoName;
                    } elseif (!empty($request->old_consultant_photo[$index])) {
                        $photoPath = $request->old_consultant_photo[$index];
                    }

                    $consultants[] = [
                        'name' => $name,
                        'designation' => $request->consultant_designation[$index] ?? '',
                        'institute' => $request->consultant_institute[$index] ?? '',
                        'photo' => $photoPath,
                    ];
                }
            }

            // 🎓 Review Info Handling
            $reviews = [];
            if ($request->has('student_name')) {
                foreach ($request->student_name as $index => $name) {
                    $photoPath = null;
                    if ($request->hasFile('student_photo') && isset($request->student_photo[$index])) {
                        $photo = $request->student_photo[$index];
                        $photoName = time() . '_' . uniqid() . '.' . $photo->extension();
                        $photo->move(public_path('images/upload/reviews/'), $photoName);
                        $photoPath = 'public/images/upload/reviews/' . $photoName;
                    } elseif (!empty($request->old_student_photo[$index])) {
                        $photoPath = $request->old_student_photo[$index];
                    }

                    $reviews[] = [
                        'name' => $name,
                        'review' => $request->student_review[$index] ?? '',
                        'photo' => $photoPath,
                    ];
                }
            }

            // ✅ Update DB
            $result = DB::table('b2c_service')
                ->where('id', $request->id)
                ->where('agent_id', Session::get('agent_id'))
                ->update([
                    'name' => $request->name,
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'c_photo' => $c_photo,
                    's_details' => json_encode($request->s_details),
                    'p_method' => json_encode($request->p_method),
                    'exclusion' => json_encode($request->exclusion),
                    'tnt' => json_encode($request->tnt),
                    'consultant_info' => json_encode($consultants),
                    'review_info' => json_encode($reviews),
                ]);

            if ($result) {
                return redirect()->to('b2cServiceManagement')->with('successMessage', 'Service Updated Successfully!');
            } else {
                return back()->with('errorMessage', 'Please try again!');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        } catch (\Exception $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function deleteB2CService(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_service')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('b2cServiceManagement')->with('successMessage', 'Service  deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function b2cHajjUmrahManagememt(Request $request){
        try{
            $rows = DB::table('b2c_hajj_umrah')->where('agent_id',Session::get('agent_id'))->get();
            return view('websiteSetting.b2cHajjUmrahManagememt',['packages' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addB2CHajjUmrahPackage(Request $request){
        try{
            $fileName = time() . '.' . $request->p_c_photo->extension();
            $request->p_c_photo->move(public_path('images/upload/hajj/'), $fileName);
            $p_c_photo = 'public/images/upload/hajj/'.$fileName;
            $i = 0;
            foreach ($request->p_m_photo as $photos){
                $fileName = $i.time() . '.' . $photos->extension();
                $photos->move(public_path('images/upload/hajj/'), $fileName);
                $p_m_photo[$i] = 'public/images/upload/hajj/'.$fileName;
                $i++;
                echo $i;
            }
            $p_m_photos = json_encode($p_m_photo);
            $result = DB::table('b2c_hajj_umrah')->insert([
                'agent_id' => Session::get('agent_id'),
                'type' => $request->type,
                'p_name' => $request->p_name,
                'p_code' => $request->p_code,
                'night' => $request->night,
                'p_c_photo' => $p_c_photo,
                'p_m_photo' => $p_m_photos,
                'p_p_adult' => $request->p_p_adult,
                'p_p_child' => $request->p_p_child,
                'p_p_infant' => $request->p_p_infant,
                'slug' => $request->slug,
                'highlights' => json_encode($request->highlights),
                'title' => json_encode($request->title),
                'itinary' => json_encode($request->description),
                'inclusion' => json_encode($request->inclusion),
                'exclusion' => json_encode($request->exclusion),
                'tnt' => json_encode($request->tnt),
                'include' => json_encode($request->include),
            ]);
            if($result){
                return back()->with('successMessage', 'Hajj & Umrah Package Added Successfully!!');
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function  editB2CHajjUmrahPage(Request $request){
        try{
            $rows = DB::table('b2c_hajj_umrah')->where('id',$request->id)->first();
            return view('websiteSetting.editB2CHajjUmrahPage',['package' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editB2CHajjUmrahPackage (Request $request){
        try{
            $rows = DB::table('b2c_hajj_umrah')->where('agent_id',Session::get('agent_id'))->where('id',$request->id)->first();
            if($request->p_c_photo){
                $fileName = time() . '.' . $request->p_c_photo->extension();
                $request->p_c_photo->move(public_path('images/upload/hajj/'), $fileName);
                $p_c_photo = 'public/images/upload/hajj/'.$fileName;
            }
            else{
                $p_c_photo = $rows->p_c_photo;
            }
            if($request->p_m_photo){
                $i = 0;
                foreach ($request->p_m_photo as $photos){
                    $fileName = $i.time() . '.' . $photos->extension();
                    $photos->move(public_path('images/upload/hajj/'), $fileName);
                    $p_m_photo[$i] = 'public/images/upload/hajj/'.$fileName;
                    $i++;
                    echo $i;
                }
                $p_m_photos = json_encode($p_m_photo);
            }
            else{
                $p_m_photos = $rows->p_m_photo;
            }
            //dd($request);
            $result = DB::table('b2c_hajj_umrah')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->update([
                    'type' => $request->type,
                    'p_name' => $request->p_name,
                    'p_code' => $request->p_code,
                    'night' => $request->night,
                    'p_c_photo' => $p_c_photo,
                    'p_m_photo' => $p_m_photos,
                    'p_p_adult' => $request->p_p_adult,
                    'p_p_child' => $request->p_p_child,
                    'p_p_infant' => $request->p_p_infant,
                    'slug' => $request->slug,
                    'highlights' => json_encode($request->highlights),
                    'title' => json_encode($request->title),
                    'itinary' => json_encode($request->description),
                    'inclusion' => json_encode($request->inclusion),
                    'exclusion' => json_encode($request->exclusion),
                    'tnt' => json_encode($request->tnt),
                    'include' => json_encode($request->include),
                ]);
            if ($result) {
                return redirect()->to('b2cHajjUmrahManagememt')->with('successMessage', 'Hajj & Umrah Package Updated Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteB2CHajjUmrahPackage(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_hajj_umrah')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('b2cHajjUmrahManagememt')->with('successMessage', 'ajj & Umrah Package deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function blogManagement(Request $request){
        try{
            $rows = DB::table('b2c_blog')->where('agent_id',Session::get('agent_id'))->get();
            return view('websiteSetting.blogManagement',['blogs' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addB2CBlog(Request $request){
        try{
            $fileName = time() . '.' . $request->b_c_photo->extension();
            $request->b_c_photo->move(public_path('images/upload/blog/'), $fileName);
            $b_c_photo = 'public/images/upload/blog/'.$fileName;
            //dd($request);
            $result = DB::table('b2c_blog')->insert([
                'agent_id' => Session::get('agent_id'),
                'b_title' => $request->b_title,
                'b_category' => $request->b_category,
                'slug' => $request->slug,
                'p_by' => $request->p_by,
                'b_c_photo' => $b_c_photo,
                'keyword' => json_encode($request->keyword),
                'description' => json_encode($request->description),
                's_description' => $request->s_description,
                'details' => json_encode($request->details),
                'map_location' => json_encode($request->map_location),
            ]);
            if($result){
                return back()->with('successMessage', 'New Blog Added Successfully!!');
            }
            else{
                return back()->with('errorMessage', 'Please Try Again!!');
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editB2CBlogPage(Request $request){
        try{
            $rows = DB::table('b2c_blog')->where('id',$request->id)->first();
            return view('websiteSetting.editB2CBlogPage',['blog' => $rows,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function editB2CBlog (Request $request){
        try{
            $rows = DB::table('b2c_blog')->where('agent_id',Session::get('agent_id'))->where('id',$request->id)->first();
            if($request->b_c_photo){
                $fileName = time() . '.' . $request->b_c_photo->extension();
                $request->b_c_photo->move(public_path('images/upload/blog/'), $fileName);
                $b_c_photo = 'public/images/upload/blog/'.$fileName;
            }
            else{
                $b_c_photo = $rows->b_c_photo;
            }
            $result = DB::table('b2c_blog')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->update([
                    'b_title' => $request->b_title,
                    'b_category' => $request->b_category,
                    'slug' => $request->slug,
                    'p_by' => $request->p_by,
                    'b_c_photo' => $b_c_photo,
                    'keyword' => json_encode($request->keyword),
                    'description' => json_encode($request->description),
                    's_description' => $request->s_description,
                    'details' => json_encode($request->details),
                    'map_location' => json_encode($request->map_location),
                ]);
            if ($result) {
                return redirect()->to('blogManagement')->with('successMessage', 'Blog Updated Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteB2CBlog(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('b2c_blog')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('blogManagement')->with('successMessage', 'Blog  deleted successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function domainManage(Request $request){
        try{
            $rows = DB::table('domain')->where('agent_id',Session::get('agent_id'))->first();
            return view('websiteSetting.domainManage',['domainy' => $rows,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addDomain(Request $request){
        try{
            $rows = DB::table('domain')->where('id',$request->name)->get();
            if($rows->count()>1){
                return back()->with('errorMessage', 'Domain Already Exits!!');
            }
            else{
                $result = DB::table('domain')->insert([
                    'agent_id' => Session::get('agent_id'),
                    'name' => $request->name,
                ]);
                if($result){
                    return back()->with('successMessage', 'New Domain Added Successfully!!');
                }
                else{
                    return back()->with('errorMessage', 'Please Try Again!!');
                }
            }

        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }


    public function webEduCountryManagement()
    {
        $countries = DB::table('edu_countries')->orderBy('id', 'desc')->get();
        return view('websiteSetting.education.webEduCountryManagement', compact('countries'));
    }

    public function webEduCountryStore(Request $request)
    {
        // ✅ Validate basic fields
        $request->validate([
            'country_name' => 'required|max:255',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'page_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ File Upload (Cover)
        $cover_photo_path = null;
        if ($request->hasFile('cover_photo')) {
            $fileName = time() . '_cover.' . $request->cover_photo->extension();
            $request->cover_photo->move(public_path('images/upload/edu_countries/'), $fileName);
            $cover_photo_path = 'public/images/upload/edu_countries/' . $fileName;
        }

        // ✅ File Upload (Page)
        $page_photo_path = null;
        if ($request->hasFile('page_photo')) {
            $fileName = time() . '_page.' . $request->page_photo->extension();
            $request->page_photo->move(public_path('images/upload/edu_countries/'), $fileName);
            $page_photo_path = 'public/images/upload/edu_countries/' . $fileName;
        }

        // ✅ Convert FAQ array to JSON
        $faq_data = [];
        if ($request->has('faq_question')) {
            foreach ($request->faq_question as $index => $question) {
                if (!empty($question) || !empty($request->faq_answer[$index])) {
                    $faq_data[] = [
                        'question' => $question,
                        'answer'   => $request->faq_answer[$index] ?? '',
                    ];
                }
            }
        }

        // ✅ Insert record
        DB::table('edu_countries')->insert([
            'agent_id' => Session::get('agent_id'),
            'country_name' => $request->country_name,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->country_name),
            'cover_photo' => $cover_photo_path,
            'page_photo' => $page_photo_path,
            'international_students' => $request->international_students,
            'happiness_ranking' => $request->happiness_ranking,
            'employment_rate' => $request->employment_rate,
            'start_date' => $request->start_date,
            'min_wage' => $request->min_wage,
            'max_work_hours' => $request->max_work_hours,
            'cost_of_living' => $request->cost_of_living,
            'visa_work_permit' => $request->visa_work_permit,
            'employment_opportunities' => $request->employment_opportunities,
            'why_study' => $request->why_study,
            'best_universities' => $request->best_universities,
            'popular_programs' => $request->popular_programs,
            'what_sets_apart' => $request->what_sets_apart,
            'student_life' => $request->student_life,
            'faq' => json_encode($faq_data, JSON_UNESCAPED_UNICODE),
            'created_at' => now(),
        ]);

        return back()->with('successMessage', 'Country Added Successfully!');
    }

    public function webEduCountryEdit($id)
    {
        $country = DB::table('edu_countries')->where('id', $id)->first();
        // Decode JSON FAQ if exists
        $faqs = [];
        if (!empty($country->faq)) {
            $faqs = json_decode($country->faq, true);
        }
        return view('websiteSetting.education.webEduCountryEdit', compact('country', 'faqs'));
    }

    public function webEduCountryUpdate(Request $request, $id)
    {
        $request->validate([
            'country_name' => 'required|max:255',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'page_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Fetch old country
        $old = DB::table('edu_countries')->where('id', $id)->first();

        // Handle new uploads
        $cover_photo_path = $old->cover_photo;
        if ($request->hasFile('cover_photo')) {
            $fileName = time() . '_cover.' . $request->cover_photo->extension();
            $request->cover_photo->move(public_path('images/upload/edu_countries/'), $fileName);
            $cover_photo_path = 'public/images/upload/edu_countries/' . $fileName;
        }

        $page_photo_path = $old->page_photo;
        if ($request->hasFile('page_photo')) {
            $fileName = time() . '_page.' . $request->page_photo->extension();
            $request->page_photo->move(public_path('images/upload/edu_countries/'), $fileName);
            $page_photo_path = 'public/images/upload/edu_countries/' . $fileName;
        }

        // Convert FAQ to JSON
        $faq_data = [];
        if ($request->has('faq_question')) {
            foreach ($request->faq_question as $index => $question) {
                if (!empty($question) || !empty($request->faq_answer[$index])) {
                    $faq_data[] = [
                        'question' => $question,
                        'answer'   => $request->faq_answer[$index] ?? '',
                    ];
                }
            }
        }

        // Update record
        DB::table('edu_countries')->where('id', $id)->update([
            'country_name' => $request->country_name,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->country_name),
            'cover_photo' => $cover_photo_path,
            'page_photo' => $page_photo_path,
            'international_students' => $request->international_students,
            'happiness_ranking' => $request->happiness_ranking,
            'employment_rate' => $request->employment_rate,
            'start_date' => $request->start_date,
            'min_wage' => $request->min_wage,
            'max_work_hours' => $request->max_work_hours,
            'cost_of_living' => $request->cost_of_living,
            'visa_work_permit' => $request->visa_work_permit,
            'employment_opportunities' => $request->employment_opportunities,
            'why_study' => $request->why_study,
            'best_universities' => $request->best_universities,
            'popular_programs' => $request->popular_programs,
            'what_sets_apart' => $request->what_sets_apart,
            'student_life' => $request->student_life,
            'faq' => json_encode($faq_data, JSON_UNESCAPED_UNICODE),
        
        ]);

        return redirect('webEduCountryManagement')->with('successMessage', 'Country Updated Successfully!');
    }

    // ================== Delete ==================
    public function webEduCountryDelete(Request $request)
    {
        DB::table('edu_countries')->where('id', $request->id)->delete();
        return back()->with('successMessage', 'Country Deleted Successfully!');
    }
    // ======================= University Management ==========================
    public function webEduUniversityManagement(Request $request)
    {
        $countries = DB::table('edu_countries')->orderBy('country_name')->get();

        $query = DB::table('edu_universities')
            ->join('edu_countries', 'edu_universities.edu_country_id', '=', 'edu_countries.id')
            ->select('edu_universities.*', 'edu_countries.country_name')
            ->orderBy('edu_universities.id', 'desc');

        // 🔹 Filter by Country
        if ($request->filled('country_id')) {
            $query->where('edu_universities.edu_country_id', $request->country_id);
        }

        // 🔹 Filter by University name (search)
        if ($request->filled('university_name')) {
            $query->where('edu_universities.university_name', 'like', '%'.$request->university_name.'%');
        }

        $universities = $query->paginate(20);

        return view('websiteSetting.education.webEduUniversityManagement', compact('universities', 'countries'))
            ->with([
                'filter_country' => $request->country_id,
                'filter_university' => $request->university_name
            ]);
    }


    public function webEduUniversityStore(Request $request)
    {
        $request->validate([
            'edu_country_id' => 'required',
            'university_name' => 'required|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Logo upload
        $logo_path = null;
        if ($request->hasFile('logo')) {
            $fileName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('images/upload/edu_universities/'), $fileName);
            $logo_path = 'public/images/upload/edu_universities/' . $fileName;
        }

        // ✅ Cover Photo upload
        $cover_photo_path = null;
        if ($request->hasFile('cover_photo')) {
            $fileName = time() . '_cover.' . $request->cover_photo->extension();
            $request->cover_photo->move(public_path('images/upload/edu_universities/'), $fileName);
            $cover_photo_path = 'public/images/upload/edu_universities/' . $fileName;
        }

        // ✅ Insert record
        DB::table('edu_universities')->insert([
            'agent_id' => Session::get('agent_id'),
            'edu_country_id' => $request->edu_country_id,
            'university_name' => $request->university_name,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->university_name),
            'logo' => $logo_path,
            'cover_photo' => $cover_photo_path,
            'international_students' => $request->international_students,
            'qs_ranking' => $request->qs_ranking,
            'acceptance_rate' => $request->acceptance_rate,
            'employability_rate' => $request->employability_rate,
            'tuition_fee' => $request->tuition_fee,
            'overview' => $request->overview,
            'student_life' => $request->student_life,
            'accommodation' => $request->accommodation,
            'facilities' => $request->facilities,
            'campus_details' => $request->campus_details,
            'employability' => $request->employability,
            'created_at' => now(),
        ]);

        return back()->with('successMessage', 'University Added Successfully!');
    }

    public function webEduUniversityEdit($id)
    {
        $university = DB::table('edu_universities')->where('id', $id)->first();
        $countries = DB::table('edu_countries')->get();
        return view('websiteSetting.education.webEduUniversityEdit', compact('university', 'countries'));
    }

    public function webEduUniversityUpdate(Request $request, $id)
    {
        $request->validate([
            'edu_country_id' => 'required',
            'university_name' => 'required|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $old = DB::table('edu_universities')->where('id', $id)->first();

        // ✅ Handle logo upload
        $logo_path = $old->logo;
        if ($request->hasFile('logo')) {
            $fileName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('images/upload/edu_universities/'), $fileName);
            $logo_path = 'public/images/upload/edu_universities/' . $fileName;
        }

        // ✅ Handle cover upload
        $cover_photo_path = $old->cover_photo;
        if ($request->hasFile('cover_photo')) {
            $fileName = time() . '_cover.' . $request->cover_photo->extension();
            $request->cover_photo->move(public_path('images/upload/edu_universities/'), $fileName);
            $cover_photo_path = 'public/images/upload/edu_universities/' . $fileName;
        }

        // ✅ Update
        DB::table('edu_universities')->where('id', $id)->update([
            'edu_country_id' => $request->edu_country_id,
            'university_name' => $request->university_name,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->university_name),
            'logo' => $logo_path,
            'cover_photo' => $cover_photo_path,
            'international_students' => $request->international_students,
            'qs_ranking' => $request->qs_ranking,
            'acceptance_rate' => $request->acceptance_rate,
            'employability_rate' => $request->employability_rate,
            'tuition_fee' => $request->tuition_fee,
            'overview' => $request->overview,
            'student_life' => $request->student_life,
            'accommodation' => $request->accommodation,
            'facilities' => $request->facilities,
            'campus_details' => $request->campus_details,
            'employability' => $request->employability,
        ]);

        return redirect('webEduUniversityManagement')->with('successMessage', 'University Updated Successfully!');
    }

    public function webEduUniversityDelete(Request $request)
    {
        DB::table('edu_universities')->where('id', $request->id)->delete();
        return back()->with('successMessage', 'University Deleted Successfully!');
    }
    // ======================= Course Management ==========================
    public function webEduCourseManagement(Request $request)
    {
        $countries = DB::table('edu_countries')->orderBy('country_name')->get();

        // base query
        $query = DB::table('edu_course')
            ->join('edu_universities', 'edu_course.edu_university_id', '=', 'edu_universities.id')
            ->join('edu_countries', 'edu_course.edu_country_id', '=', 'edu_countries.id')
            ->select(
                'edu_course.*',
                'edu_universities.university_name',
                'edu_countries.country_name'
            )
            ->orderBy('edu_course.id', 'desc');

        // 🔹 Filter by Country
        if ($request->filled('country_id')) {
            $query->where('edu_course.edu_country_id', $request->country_id);
        }

        // 🔹 Filter by University
        if ($request->filled('university_id')) {
            $query->where('edu_course.edu_university_id', $request->university_id);
        }

        // 🔹 Filter by Course name
        if ($request->filled('course_name')) {
            $query->where('edu_course.course_name', 'like', '%' . $request->course_name . '%');
        }

        $courses = $query->paginate(20);

        // dynamic universities for filter dropdown
        $universities = DB::table('edu_universities')
            ->select('id', 'university_name')
            ->orderBy('university_name')
            ->get();

        return view('websiteSetting.education.webEduCourseManagement', compact('courses', 'countries', 'universities'))
            ->with([
                'filter_country' => $request->country_id,
                'filter_university' => $request->university_id,
                'filter_course' => $request->course_name,
            ]);
    }


    public function webEduCourseStore(Request $request)
    {
        $request->validate([
            'edu_country_id' => 'required',
            'edu_university_id' => 'required',
            'course_name' => 'required|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ✅ Upload logo
        $logo_path = null;
        if ($request->hasFile('logo')) {
            $fileName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('images/upload/edu_course/'), $fileName);
            $logo_path = 'public/images/upload/edu_course/' . $fileName;
        }

        // ✅ Upload cover
        $cover_path = null;
        if ($request->hasFile('cover_photo')) {
            $fileName = time() . '_cover.' . $request->cover_photo->extension();
            $request->cover_photo->move(public_path('images/upload/edu_course/'), $fileName);
            $cover_path = 'public/images/upload/edu_course/' . $fileName;
        }

        $defaultRequirements = json_encode([
            "academic_certificates" => [
                "Secondary School marksheet and certificate",
                "Higher Secondary marksheet and certificate",
                "Undergraduate marksheet and certificate"
            ],
            "english_language_tests" => [
                "TOEFL",
                "IELTS",
                "PTE",
                "DUOLINGO"
            ],
            "identity" => "Passport",
            "medical" => "TB Certificate"
        ], JSON_UNESCAPED_UNICODE);

        DB::table('edu_course')->insert([
            'agent_id' => Session::get('agent_id'),
            'edu_country_id' => $request->edu_country_id,
            'edu_university_id' => $request->edu_university_id,
            'course_name' => $request->course_name,
            'course_type' => $request->course_type,
            'course_slug' => $request->course_slug ? Str::slug($request->course_slug) : Str::slug($request->course_name),
            'tuition_fees' => $request->tuition_fees,
            'final_tuition_fee' => $request->final_tuition_fee,
            'duration' => $request->duration,
            'campus' => $request->campus,
            'mode_of_study' => $request->mode_of_study,
            'logo' => $logo_path,
            'cover_photo' => $cover_path,
            'course_overview' => $request->course_overview,
            'key_program_highlights' => $request->key_program_highlights,
            'requirements' => $request->requirements ?: $defaultRequirements, // 👈 এখানে default apply হবে
            'created_at' => now(),
        ]);

        return back()->with('successMessage', 'Course Added Successfully!');
    }

    public function webEduCourseEdit($id)
    {
        $course = DB::table('edu_course')->where('id', $id)->first();
        $countries = DB::table('edu_countries')->get();
        $universities = DB::table('edu_universities')->get();
        return view('websiteSetting.education.webEduCourseEdit', compact('course', 'countries', 'universities'));
    }

    public function webEduCourseUpdate(Request $request, $id)
    {
        $request->validate([
            'edu_country_id' => 'required',
            'edu_university_id' => 'required',
            'course_name' => 'required|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $old = DB::table('edu_course')->where('id', $id)->first();
        $logo_path = $old->logo;
        $cover_path = $old->cover_photo;

        if ($request->hasFile('logo')) {
            $fileName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('images/upload/edu_course/'), $fileName);
            $logo_path = 'public/images/upload/edu_course/' . $fileName;
        }

        if ($request->hasFile('cover_photo')) {
            $fileName = time() . '_cover.' . $request->cover_photo->extension();
            $request->cover_photo->move(public_path('images/upload/edu_course/'), $fileName);
            $cover_path = 'public/images/upload/edu_course/' . $fileName;
        }

        DB::table('edu_course')->where('id', $id)->update([
            'edu_country_id' => $request->edu_country_id,
            'edu_university_id' => $request->edu_university_id,
            'course_name' => $request->course_name,
            'course_type' => $request->course_type,
            'course_slug' => $request->course_slug ? Str::slug($request->course_slug) : Str::slug($request->course_name),
            'tuition_fees' => $request->tuition_fees,
            'final_tuition_fee' => $request->final_tuition_fee,
            'duration' => $request->duration,
            'campus' => $request->campus,
            'mode_of_study' => $request->mode_of_study,
            'logo' => $logo_path,
            'cover_photo' => $cover_path,
            'course_overview' => $request->course_overview,
            'key_program_highlights' => $request->key_program_highlights,
            'requirements' => $request->requirements,
        ]);

        return redirect('webEduCourseManagement')->with('successMessage', 'Course Updated Successfully!');
    }

    public function webEduCourseDelete(Request $request)
    {
        DB::table('edu_course')->where('id', $request->id)->delete();
        return back()->with('successMessage', 'Course Deleted Successfully!');
    }
    // ======================= AJAX: Load University by Country ==========================
    public function getUniversitiesByCountry(Request $request)
    {
        $universities = DB::table('edu_universities')
            ->where('edu_country_id', $request->country_id)
            ->select('id', 'university_name')
            ->orderBy('university_name', 'asc')
            ->get();

        return response()->json($universities);
    }

}
