<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\Facades\DataTables;

class usersController extends Controller
{
    public function importCsv(){
        $file = public_path('AAA.csv');
        $csvData = file_get_contents($file);
        $rows = array_map('str_getcsv', explode("\n", $csvData));
        array_shift($rows);
        //dd($rows[0][1]);
        $data = [];
        foreach ($rows as $row) {
            $int= mt_rand(1262055681,1262055681);
            $a = date("Y-m-d",$int);
            $data[] = [
                'title' => 'Mr',
                'f_name' => @$row[1] ? $row[1] :'Example',
                'l_name' => @$row[2]  ? $row[2] :'Example',
                'gender' => 'Male',
                'phone' => @$row[3],
                'email' => @$row[4],
                //'dob' => $a,
                'nationality' => 'Bangladesh',
                'p_number' => "",
                't_type' => 'Adult',
                //'p_exp_date' => '',
                'upload_by' => 4,
            ];
        }
        //dd($data);
        DB::table('passengers')->insert($data);
        return 'Jobi done or what ever';
    }

    public function users(Request $request){
        try{
            $rows = DB::table('country')->get();
            $rows1 = DB::table('passengers')
                ->where('deleted',0)
                ->where('upload_by',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->paginate(20);
            return view('users.users',['countries' => $rows,'passengers' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function agency(Request $request){
        try{
            $rows1 = DB::table('users')
                ->where('role','!=',5)
                ->orderBy('id','desc')
                ->paginate(20);
            return view('agency.agency',['users' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function contacts(Request $request){
        try{
            $rows1 = DB::table('contacts')
                ->where('agent_id',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->paginate(10);
            return view('contacts.contacts',['passengers' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function createNewContacts(Request $request){
        try{
            if($request) {
                $row = DB::table('contacts')
                    ->where('agent_id',Session::get('agent_id'))
                    ->where('phone',$request->phone)
                    ->get();
                //dd($request);
                if($row->count()>= 1){
                    return back()->with('errorMessage', 'Contacts already exits!!');
                }
                else{
                    $result = DB::table('contacts')->insert([
                        'agent_id' => Session::get('agent_id'),
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'dob' => $request->dob,
                        'purpose' => $request->purpose,
                    ]);
                    if ($result) {
                        return redirect()->to('contacts')->with('successMessage', 'New contacts added successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
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
    public function updateContacts (Request $request){
        try{
            if($request) {
                $result = DB::table('contacts')
                    ->where('id', $request->id)
                    ->where('agent_id',Session::get('agent_id'))
                    ->update([
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'email' => $request->email,
                        'dob' => $request->dob,
                    ]);
                if ($result) {
                    return redirect()->to('contacts')->with('successMessage', 'Contacts Updated Successfully!!');
                } else {
                    return back()->with('errorMessage', 'Please try again!!');
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
    public function editContactsPage(Request $request){
        try{
            $rows = DB::table('contacts')->where('id',$request->id)->first();
            return view('contacts.editContactsPage',['contact' => $rows]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchPDetails(Request $request){
        try{
            $rows = DB::table('country')->get();
            $rows1 = DB::table('passengers')
                ->orwhere('f_name',$request->s)
                ->orWhere('l_name',$request->s)
                ->orWhere('phone',$request->s)
                ->orWhere('email',$request->s)
                ->orWhere('p_number',$request->s)
                ->where('deleted',0)
                ->where('upload_by',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->paginate(20);
            return view('users.users',['countries' => $rows,'passengers' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function searchUsersDetails(Request $request){
        try{
            //dd($request);
            $rows1 = DB::table('users')
                ->orWhere('company_name', 'like', '%' . $request->s . '%')
                ->orWhere('company_pnone', 'like', '%' . $request->s . '%')
                ->orWhere('company_email', 'like', '%' . $request->s . '%')
                ->orWhere('address', 'like', '%' . $request->s . '%')
                ->orWhere('contact_person', 'like', '%' . $request->s . '%')
                ->orWhere('con_phone', 'like', '%' . $request->s . '%')
                ->orderBy('id','desc')
                ->paginate(20);
            return view('agency.agency',['users' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function createNewPassenger(Request $request){
        try{
            if($request) {
                $title = $request->title;
                $f_name = $request->f_name;
                $l_name = $request->l_name;
                $phone = $request->phone;
                $email = $request->email;
                $gender = $request->gender;
                $nationality = $request->nationality;
                $dob = $request->dob;
                $ffn = $request->ffn;
                $p_number = $request->p_number;
                $p_exp_date = $request->p_exp_date;
                $t_type = $request->t_type;
                $result = DB::table('passengers')->insert([
                    'title' => $title,
                    'f_name' => $f_name,
                    'l_name' => $l_name,
                    'phone' => $phone,
                    'email' => $email,
                    'gender' => $gender,
                    'nationality' => $nationality,
                    'dob' => $dob,
                    'ffn' => $ffn,
                    'p_number' => $p_number,
                    'p_exp_date' => $p_exp_date,
                    't_type' => $t_type,
                    'upload_by' => Session::get('agent_id'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                if ($result) {
                    return redirect()->to('users')->with('successMessage', 'Registered done successfully!!');
                } else {
                    return back()->with('errorMessage', 'Please try again!!');
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
    public function isPassengerInActive(Request $request){
        try{
            if($request) {
                if($request->id) {
                    if($request->status== 'Active')
                    $result =DB::table('passengers')
                        ->where('id', $request->id)
                        ->update([
                            'status' => 'In Active',
                        ]);
                    if ($result) {
                        return redirect()->to('passengers')->with('successMessage', 'Data update successfully!!');
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
    public function isPassengerActive(Request $request){
        try{
            if($request) {
                if($request->id) {
                    if($request->status== 'In Active')
                    $result =DB::table('passengers')
                        ->where('id', $request->id)
                        ->update([
                            'status' => 'Active',
                        ]);
                    if ($result) {
                        return redirect()->to('passengers')->with('successMessage', 'Data update successfully!!');
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
    public function isAgencyInActive(Request $request){
        try{
            if($request) {
                if($request->id) {
                    if($request->status== 'Active')
                    $result =DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            'status' => 'In Active',
                        ]);
                    if ($result) {
                         $user = DB::table('users')->where('id', $request->id)->first();
                        // 👉 Email Send
                        $this->sendStatusChangeEmail($user, 'In Active');

                        return redirect()->to('agency')->with('successMessage', 'Agency update successfully!!');
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
    public function sendStatusChangeEmail($user, $newStatus)
    {
        $company =  DB::table('users')->where('id', 4)->first();
        Mail::send('email.agency-status-change', [
            'user'      => $user,
            'newStatus' => $newStatus,
            'company'   => $company,
        ], function($message) use ($user, $newStatus) {
            $message->to($user->company_email)
                    ->subject("Your Account Status Updated: $newStatus");
        });
    }

    public function isAgencyActive (Request $request){
        try{
            if($request) {
                if($request->id) {
                    if($request->status== 'In Active')
                    $result =DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            'status' => 'Active',
                        ]);
                    if ($result) {
                        
                        $user = DB::table('users')->where('id', $request->id)->first();
                        // 👉 Email Send
                        $this->sendStatusChangeEmail($user, 'Active');
                        return redirect()->to('agency')->with('successMessage', 'Agency update successfully!!');
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
    public function editCompanyInfo(Request $request){
        try{
            $rows1 = DB::table('users')
                ->where('id',$request->id)
                ->first();
            return view('agency.editAgencyInfo',['company' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function updateCompanyInfo(Request $request){
        try{
            if($request) {
                $rows = DB::table('users')
                    ->where('company_pnone', $request->phone)
                    ->orwhere('company_email', $request->email)
                    ->distinct()->get()->count();
                if ($rows > 0) {
                    $rows = DB::table('users')
                        ->where('company_pnone', $request->phone)
                        ->orwhere('company_email', $request->email)
                        ->first();
                    if($request->password == ''){
                        $password = $rows->password;
                    }
                    else{
                        $password = Hash::make($request->password);
                    }
                    if($request->hasFile('logo')){
                        $targetFolder = 'public/images/upload/company/';
                        $file = $request->file('logo');
                        $pname = time() . '.' . $file->getClientOriginalName();
                        $image['filePath'] = $pname;
                        $file->move($targetFolder, $pname);
                        $c_logo = $targetFolder . $pname;
                    }
                    else{
                        $c_logo = $rows->logo;
                    }
                    $result =DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            'company_email' => $request->email,
                            'company_pnone' => $request->phone,
                            'address' => $request->address,
                            'contact_person' => $request->contact_person,
                            'con_phone' => $request->con_phone,
                            'password' => $password,
                            'logo' => $c_logo,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);
                    if ($result) {
                        return redirect()->to('agency')->with('successMessage', 'Data updated successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Company not exits.Please try again!!');
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
    public function editPassengerInfo(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $title = $request->title;
                    $f_name = $request->f_name;
                    $l_name = $request->l_name;
                    $phone = $request->phone;
                    $email = $request->email;
                    $gender = $request->gender;
                    $nationality = $request->nationality;
                    $dob = $request->dob;
                    $ffn = $request->ffn;
                    $p_number = $request->p_number;
                    $p_exp_date = $request->p_exp_date;
                    $t_type = $request->t_type;
                    $result =DB::table('passengers')
                        ->where('id', $request->id)
                        ->update([
                            'title' => $title,
                            'f_name' => $f_name,
                            'l_name' => $l_name,
                            'phone' => $phone,
                            'email' => $email,
                            'gender' => $gender,
                            'nationality' => $nationality,
                            'dob' => $dob,
                            'ffn' => $ffn,
                            'p_number' => $p_number,
                            'p_exp_date' => $p_exp_date,
                            't_type' => $t_type,
                            'updated_at' => date('Y-m-d H:i:s')
                        ]);
                    if ($result) {
                        return redirect()->to('users')->with('successMessage', 'Data update successfully!!');
                    } else {
                        return back()->with('errorMessage', 'Please try again!!');
                    }
                }
                else {
                    return back()->with('errorMessage', 'Bad Request!!');
                }
            }
            else{
                return back()->with('errorMessage', 'Please fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editPassengerPage(Request $request){
        try{
            $rows = DB::table('country')->get();
            $rows1 = DB::table('passengers')->where('upload_by',Session::get('agent_id'))->where('id',$request->id)->orderBy('id','desc')->first();
            //dd($rows1);
            return view('users.editPassengerPage',['countries' => $rows,'passengers' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deletePassenger(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('passengers')
                        ->where('id', $request->id)
                        ->update([
                            'deleted' => 1,
                        ]);
                    if ($result) {
                        return redirect()->to('users')->with('successMessage', 'Data deleted successfully!!');
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
    public function orderReceiver(Request $request)
    {
        try {
            $query = DB::table('order_request')
                ->where('agent_id', Session::get('agent_id'));

            // From Date Filter
            if ($request->from_date) {
                $query->whereDate('date', '>=', $request->from_date);
            }

            // To Date Filter
            if ($request->to_date) {
                $query->whereDate('date', '<=', $request->to_date);
            }

            // Order Ref Filter
            if ($request->order_ref) {
                $query->where('r_ref', 'LIKE', '%' . $request->order_ref . '%');
            }

            // Query Type Filter
            if ($request->query_type) {
                $query->where('r_type', $request->query_type);
            }

            // Status Filter
            if ($request->status) {
                $query->where('status', $request->status);
            }

            // Pagination (20 items per page)
            $rows1 = $query->orderBy('id','desc')->paginate(20);

            return view('orderReceiver.orderReceiver', [
                'orders' => $rows1
            ]);

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function changeB2COrderStatus(Request $request){
        try{
            if($request) {
                if($request->id) {
                    if($request->status)
                        $result =DB::table('order_request')
                            ->where('id', $request->id)
                            ->update([
                                'status' => $request->status,
                            ]);
                    if ($result) {
                        return redirect()->to('orderReceiver')->with('successMessage', 'Order status updated successfully!!');
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
    public function createNewContactsDetails(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathName());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();
        $now = Carbon::now();
        $data = [];

        // 🔹 আগের সব ফোন নম্বর বের করি
        $existingPhones = DB::table('contacts')->pluck('phone')->map(fn($p) => trim($p))->toArray();

        foreach ($rows as $index => $row) {
            // ❌ এটা বাদ দাও: if ($index == 0) continue;

            $phone   = isset($row[0]) ? trim($row[0]) : null;
            $name    = isset($row[1]) ? trim($row[1]) : null;
            $purpose = isset($row[2]) ? trim($row[2]) : null;

            if (!$phone || !$name) continue;

            if (in_array($phone, $existingPhones)) continue;
            if (collect($data)->pluck('phone')->contains($phone)) continue;

            $data[] = [
                'agent_id' => Session::get('agent_id'),
                'name'     => $name,
                'phone'    => $phone,
                'purpose'  => $purpose,
                'dob'      => null,
                'en_date'  => $now,
            ];
        }
        $inserted = 0;
        if (!empty($data)) {
            DB::table('contacts')->insert($data);
            $inserted = count($data);
        }
        return redirect()->to('contacts')->with('successMessage', "{$inserted} new contacts imported successfully!");
    }
    public function contactSupportList()
    {
        $agent_id = session('agent_id');

        $messages = DB::table('contact_us')
            ->where('agent_id', $agent_id)
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return view('support.contact_list', compact('messages'));
    }
    public function contactSupportView($id)
    {
        $message = DB::table('contact_us')->where('id', $id)->first();

        if (!$message) {
            return back()->with('errorMessage', 'Message not found!');
        }

        return view('support.contact_view', compact('message'));
    }
    public function contactSupportStatusUpdate(Request $request)
    {
        DB::table('contact_us')
            ->where('id', $request->id)
            ->update(['status' => $request->status]);

        return back()->with('successMessage', 'Status updated successfully!');
    }
    public function contactSupportReply(Request $request)
    {
        $request->validate([
            'id'            => 'required',
            'reply_message' => 'required',
            'email'         => 'required|email',
        ]);

        // Load ticket info
        $ticket = DB::table('contact_us')->where('id', $request->id)->first();

        if (!$ticket) {
            return back()->with('errorMessage', 'Ticket not found!');
        }

        // Load company info
        $company = DB::table('users')->where('id', $ticket->agent_id)->first();

        // Email data for template
        $data = [
            'reply_message' => $request->reply_message,
            'customer_name' => $ticket->name,
            'company'       => $company,
        ];
        // Send Reply Email
        Mail::send('email.support-reply', $data, function ($message) use ($request, $company) {
            $message->to($request->email);
            $message->subject("Support Reply - ".($company->name ?? 'Trip Designer'));
            $message->from('sales@tripdesigner.net', $company->name ?? 'Trip Designer');
        });

        // Update ticket status to Replied
        DB::table('contact_us')
            ->where('id', $request->id)
            ->update([
                'status' => 'replied',
                'updated_at' => now()
            ]);

        return back()->with('successMessage', 'Reply email sent successfully!');
    }

}
