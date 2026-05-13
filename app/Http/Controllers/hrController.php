<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\SalarySlipMail;

class hrController extends Controller
{
    public function designation(Request $request){
        try{
            $rows1 = DB::table('designations')
                ->where('agent_id',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->get();
            return view('hr.designation',['designations' => $rows1]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addDesignation(Request $request){
        try{
            $row = DB::table('designations')->where('agent_id', Session::get('agent_id')) ->where('name', $request->name)->get();
            if($row->count()>0){
                return back()->with('errorMessage', 'Designation Already Exits!! Please try again!!');
            }
            $result = DB::table('designations')->insert([
                'agent_id' => Session::get('agent_id'),
                'name' => $request->name,
            ]);
            if ($result) {
                return redirect()->to('designation')->with('successMessage', 'Designation added successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function editDesignationPage(Request $request){
        try{
            $rows = DB::table('designations')->where('id',$request->id)->first();
            return view('hr.editDesignationPage',['designation' => $rows,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function updateDesignation (Request $request){
        try{

            $result = DB::table('designations')
                ->where('id',$request->id)
                ->where('agent_id',Session::get('agent_id'))
                ->update([
                    'name' => $request->name,
                ]);
            if ($result) {
                return redirect()->to('designation')->with('successMessage', 'Designation Updated Successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function deleteDesignation(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('designations')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('agent_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('designation')->with('successMessage', 'Designation deleted successfully!!');
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
    public function employeeSettings(Request $request){
        try{
            $rows1 = DB::table('employees')
                ->where('deleted',0)
                ->where('agent_id',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->get();
            $rows2 = DB::table('designations')
                ->where('agent_id',Session::get('agent_id'))
                ->orderBy('id','desc')
                ->get();
            $rows3 = DB::table('countries')->get();
            return view('hr.employeeSettings',['employees' => $rows1,'designations' => $rows2,'countries' => $rows3]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addNewEmployee(Request $request)
    {
        try {

            // Step 2: Wrap in DB Transaction
            DB::transaction(function () use ($request) {

                $name       = $request->name;
                $email      = $request->email;
                $phone      = $request->phone;
                $password   = Hash::make($request->password);
                $address    = $request->address;
                $designation= $request->designation;
                $phoneCode  = '880';
                $agentId    = Session::get('agent_id');

                // Insert into users table
                DB::table('users')->insert([
                    'company_name'   => $name,
                    'company_email'  => $email,
                    'phone_code'     => $phoneCode,
                    'company_pnone'  => $phone,
                    'password'       => $password,
                    'address'        => $address,
                    'status'         => 'Active',
                    'role'           => 5,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);

                // Insert into employees table
                DB::table('employees')->insert([
                    'agent_id'              => $agentId,
                    'name'                  => $name,
                    'phone'                 => $phone,
                    'email'                 => $email,
                    'address'               => $address,
                    'designation'           => $designation,
                    'role'                  => 5,
                    'join_date'                => $request->join_date,
                    'salary'                => $request->salary,
                    'next_salary_increase'  => $request->next_salary_increase,
                    'created_at'            => now(),
                    'updated_at'            => now(),
                ]);

            });

            // All OK
            return redirect()->to('employees')->with('successMessage', 'New employee added successfully!');

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', 'Database Error: ' . $ex->getMessage());
        } catch (\Exception $e) {
            return back()->with('errorMessage', 'Unexpected Error: ' . $e->getMessage());
        }
    }

    public function editEmployeePage(Request $request){
        try{
            $rows1 = DB::table('employees')->where('agent_id',Session::get('agent_id'))->where('id',$request->id)->first();
            $rows2 = DB::table('designations')->where('agent_id',Session::get('agent_id'))->get();
            $rows3 = DB::table('countries')->get();
            return view('hr.employeeEditPage',['employee' => $rows1,'designations' => $rows2,'countries' => $rows3]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function editEmployee(Request $request)
    {
        try {

            // Fetch employee
            $employee = DB::table('employees')->where('id', $request->id)->first();
            if (!$employee) {
                return back()->with('errorMessage', 'Employee not found!');
            }

            // Fetch linked user
            $user = DB::table('users')->where('company_email', $employee->email)->first();
            if (!$user) {
                return back()->with('errorMessage', 'Linked user not found!');
            }

            // Start Transaction
            DB::transaction(function () use ($request, $employee, $user) {

                // -------------------------
                // UPDATE USER INFORMATION
                // -------------------------
                $userData = [
                    'company_name'  => $request->name,
                    'company_email' => $request->email,
                    'company_pnone' => $request->phone,
                    'phone_code'    => $request->phoneCode,
                    'address'       => $request->address,
                    'updated_at'    => now(),
                ];

                // Update password only when provided
                if ($request->filled('password')) {
                    $userData['password'] = Hash::make($request->password);
                }

                DB::table('users')->where('id', $user->id)->update($userData);


                // -------------------------
                // UPDATE EMPLOYEE TABLE
                // -------------------------
                DB::table('employees')->where('id', $employee->id)->update([
                    'name'                 => $request->name,
                    'email'                => $request->email,
                    'phone'                => $request->phone,
                    'address'              => $request->address,
                    'designation'          => $request->designation,
                    'join_date'            => $request->join_date,
                    'salary'               => $request->salary,
                    'next_salary_increase' => $request->next_salary_increase,

                    // Leave Fields
                    'casual_leave'         => $request->casual_leave,
                    'seek_leave'           => $request->seek_leave,
                    'marriage_leave'       => $request->marriage_leave,
                    'fatherhood'           => $request->fatherhood,
                    'motherhood'           => $request->motherhood,
                    'earned_leave'         => $request->earned_leave,

                    // Active / Inactive
                    'deleted'              => $request->deleted,

                    'updated_at'           => now(),
                ]);

            });

            return redirect()->to('employees')
                ->with('successMessage', 'Employee updated successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', 'Database Error: ' . $ex->getMessage());

        } catch (\Exception $e) {
            return back()->with('errorMessage', 'Unexpected Error: ' . $e->getMessage());
        }
    }


    public function deleteEmployee(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $rows = DB::table('employees')->where('id', $request->id)->first();
                    $rows1 = DB::table('users')->where('company_email', $rows->email)->first();
                    $result =DB::table('employees')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('user_id'))
                        ->delete();
                    if ($result) {
                        $result =DB::table('users')
                            ->where('id', $rows1->id)
                            ->delete();
                        return redirect()->to('employees')->with('successMessage', 'Data deleted successfully!!');
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
    public function roles(Request $request){
        try{
            $rows1 = DB::table('attribute')->get();
            $rows2 = DB::table('designations')
                ->where('agent_id',Session::get('user_id'))
                ->orderBy('id','desc')
                ->get();
            $rows3 = DB::table('assign_role')
                ->where('agent_id',Session::get('user_id'))
                ->orderBy('id','desc')
                ->get();
            return view('hr.role',['attributes' => $rows1,'designations' => $rows2,'roles' => $rows3]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function addRole(Request $request){
        try{
            $row = DB::table('assign_role')->where('agent_id', Session::get('user_id')) ->where('designation', $request->designation)->get();
            if($row->count()>0){
                return back()->with('errorMessage', 'This Role Already Exits!! Please try again!!');
            }
            $result = DB::table('assign_role')->insert([
                'agent_id' => Session::get('user_id'),
                'designation' => $request->designation,
                'details' => json_encode($request->role),
            ]);
            if ($result) {
                return redirect()->to('roles')->with('successMessage', 'Role assigned successfully!!');
            } else {
                return back()->with('errorMessage', 'Please try again!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function deleteRole(Request $request){
        try{
            if($request) {
                if($request->id) {
                    $result =DB::table('assign_role')
                        ->where('id', $request->id)
                        ->where('agent_id',Session::get('user_id'))
                        ->delete();
                    if ($result) {
                        return redirect()->to('roles')->with('successMessage', 'Assigned role deleted successfully!!');
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

    public function leaves(Request $request)
    {
        try {
            $agentId   = Session::get('agent_id');
            $userRole  = Session::get('user_role');
            $userId    = Session::get('user_id');
            $empFilter = $request->query('employee_id');

            $rows1 = DB::table('genaral_holiday')->first();

            if ($userRole <= 2) {
                // ড্রপডাউন ডেটা
                $employees = DB::table('employees')
                    ->where('agent_id', $agentId)
                    ->select('id','name','email')
                    ->orderBy('name')
                    ->get();

                // লিভ তালিকা (ফিল্টারসহ)
                $leavesQ = DB::table('leave_mngt')
                    ->where('leave_mngt.agent_id', $agentId)
                    ->join('users', 'users.id', '=', 'leave_mngt.user_id')
                    ->leftJoin('employees', 'employees.email', '=', 'users.company_email')
                    ->select([
                        'leave_mngt.*',
                        'users.company_name',
                        'employees.id as employee_id',
                        'employees.name as employee_name',
                        'employees.casual_leave','employees.seek_leave','employees.marriage_leave',
                        'employees.fatherhood','employees.motherhood','employees.earned_leave',
                    ])
                    ->orderByDesc('leave_mngt.id');

                if (!empty($empFilter)) {
                    $leavesQ->where('employees.id', $empFilter);
                }
                $leaves = $leavesQ->get();

                // ===== Dashboard summary (selected employee) =====
                $selectedEmployee = null;
                $usedByCat = [];   // ['Casual' => 3, 'Sick' => 2, ...]
                if (!empty($empFilter)) {
                    $selectedEmployee = DB::table('employees')
                        ->where('id', $empFilter)
                        ->first();

                    // Approved লিভগুলোর ব্যবহার (days sum), users.company_email == employees.email
                    $usedRows = DB::table('leave_mngt')
                        ->join('users', 'users.id', '=', 'leave_mngt.user_id')
                        ->join('employees', 'employees.email', '=', 'users.company_email')
                        ->where('employees.id', $empFilter)
                        ->where('leave_mngt.status', 'Approved')
                        ->groupBy('leave_mngt.category')
                        ->select('leave_mngt.category', DB::raw('SUM(leave_mngt.days) as total_days'))
                        ->get();

                    foreach ($usedRows as $r) {
                        // ক্যাটাগরির নাম ভিউয়ের সাথে মেলান (আপনার DB তে যা আছে তাই ব্যবহার করুন)
                        $usedByCat[$r->category] = (int) $r->total_days;
                    }
                }

                // remaining নাকি allotted দেখাবেন—true করলে বাকি দেখাবে
                $showRemaining = true;

                return view('hr.leaves.leaves', [
                    'g_holidays'    => $rows1,
                    'user'          => $employees,
                    'leaves'        => $leaves,
                    'employees'     => $employees,
                    'employeeId'    => $empFilter,
                    'selectedEmployee' => $selectedEmployee,
                    'usedByCat'     => $usedByCat,
                    'showRemaining' => $showRemaining,
                ]);
            } else {
                // নন-অ্যাডমিন: নিজের লিভ
                $rows2    = DB::table('users')->where('id', $userId)->first();
                $employee = DB::table('employees')->where('email', $rows2->company_email)->first();
                $leaves   = DB::table('leave_mngt')->where('user_id', $userId)->orderBy('id','desc')->get();

                // নিজের ব্যালেন্স দেখাতে চাইলে এটুকু পাঠান
                $usedRows = DB::table('leave_mngt')
                    ->where('user_id', $userId)
                    ->where('status', 'Approved')
                    ->groupBy('category')
                    ->select('category', DB::raw('SUM(days) as total_days'))
                    ->get();

                $usedByCat = [];
                foreach ($usedRows as $r) $usedByCat[$r->category] = (int)$r->total_days;

                return view('hr.leaves.leaves', [
                    'g_holidays'    => $rows1,
                    'user'          => $employee,
                    'leaves'        => $leaves,
                    'selectedEmployee' => $employee,
                    'usedByCat'     => $usedByCat,
                    'showRemaining' => true,
                ]);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }


    public function newLeaveRequest(Request $request)
    {
        try {
//             Validate required fields (optional but recommended)
            $request->validate([
                'category' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'reason' => 'required',
            ]);

            // Calculate the number of days including both start and end date
            $startDate = Carbon::parse($request->start_date);
            $endDate = Carbon::parse($request->end_date);
            $days = $startDate->diffInDays($endDate) + 1;

            // Insert leave request
            $inserted = DB::table('leave_mngt')->insert([
                'user_id'    => Session::get('user_id'),
                'agent_id'   => Session::get('agent_id'),
                'category'   => $request->category,
                'start_date' => $request->start_date,
                'end_date'   => $request->end_date,
                'days'       => $days,
                'status'     => 'Requested',
                'cause'      => json_encode($request->reason),
            ]);

            if ($inserted) {
                return redirect()->to('leaves')->with('successMessage', 'New Leave Request Sent Successfully!');
            }

            return back()->with('errorMessage', 'Failed to send leave request. Please try again.');

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function approveLeave(Request $request)
    {
        try {
            $leave = DB::table('leave_mngt')->where('id', $request->id)->first();

            if (!$leave) {
                return redirect()->to('leaves')->with('errorMessage', 'Leave request not found!');
            }

            if ($leave->status === 'Approved') {
                return redirect()->to('leaves')->with('errorMessage', 'Already Approved. Please Check Again!');
            }

            $userAccount = DB::table('users')->where('id', $leave->user_id)->first();
            $employee = DB::table('employees')->where('email', $userAccount->company_email)->first();

            if (!$employee) {
                return redirect()->to('leaves')->with('errorMessage', 'Employee not found!');
            }

            $leaveTypes = [
                'Casual Leave'     => 'casual_leave',
                'Seek Leave'       => 'seek_leave',
                'Marriage Leave'   => 'marriage_leave',
                'Fatherhood Leave' => 'fatherhood',
                'Motherhood Leave' => 'motherhood',
                'Earned Leave'     => 'earned_leave',
            ];

            $leaveType = $leaveTypes[$leave->category] ?? null;

            if (!$leaveType) {
                return redirect()->to('leaves')->with('errorMessage', 'Invalid leave category!');
            }

            $remainingLeave = $employee->$leaveType - $leave->days;

            if ($remainingLeave < 0) {
                return redirect()->to('leaves')->with('errorMessage', 'Your applied leave is greater than your available leave!');
            }

            // Update employee's leave
            DB::table('employees')->where('id', $employee->id)->update([
                $leaveType => $remainingLeave
            ]);

            // Approve the leave
            DB::table('leave_mngt')->where('id', $request->id)->update([
                'status' => 'Approved'
            ]);

            return redirect()->to('leaves')->with('successMessage', 'Your Leave Request Approved Successfully!');
        } catch (\Exception $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function rejectLeave(Request $request)
    {
        try {
            $leave = DB::table('leave_mngt')->where('id', $request->id)->first();

            if (!$leave) {
                return redirect()->to('leaves')->with('errorMessage', 'Leave request not found.');
            }

            if ($leave->status === 'Approved') {
                return redirect()->to('leaves')->with('errorMessage', 'This leave has already been approved.');
            }

            if ($leave->status === 'Rejected') {
                return redirect()->to('leaves')->with('errorMessage', 'This leave has already been rejected.');
            }

            $update = DB::table('leave_mngt')
                ->where('id', $request->id)
                ->update(['status' => 'Rejected']);

            if ($update) {
                return redirect()->to('leaves')->with('successMessage', 'Leave request has been rejected successfully.');
            } else {
                return back()->with('errorMessage', 'Failed to reject leave request. Please try again.');
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function requestEarnedLeave(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        DB::table('leave_mngt')->insert([
            'user_id'    => Session::get('user_id'),
            'agent_id'   => Session::get('agent_id'),
            'category'   => 'Earned Leave',
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'days'       => (Carbon::parse($request->end_date)->diffInDays(Carbon::parse($request->start_date)) + 1),
            'status'     => 'Requested',
            'cause'      => json_encode($request->reason),
        ]);

        return redirect()->back()->with('successMessage', 'Earned Leave Request Sent Successfully!');
    }

    public function approveEarnedLeave(Request $request)
    {
        try {
            $leave = DB::table('leave_mngt')->where('id', $request->id)->first();

            if (!$leave || $leave->category !== 'Earned Leave') {
                return redirect()->back()->with('errorMessage', 'Invalid or non-earned leave request.');
            }

            $user = DB::table('users')->where('id', $leave->user_id)->first();
            $employee = DB::table('employees')->where('email', $user->company_email)->first();

            if (!$employee) {
                return redirect()->back()->with('errorMessage', 'Employee record not found.');
            }

            // Plus earned leave
            DB::table('employees')->where('id', $employee->id)->update([
                'earned_leave' => $employee->earned_leave + $leave->days,
            ]);

            // Delete leave_mngt row
            DB::table('leave_mngt')->where('id', $leave->id)->delete();

            return redirect()->back()->with('successMessage', 'Earned Leave Approved and Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage', 'Error: ' . $e->getMessage());
        }
    }
    public function attendance(Request $request){
        try{
            $userid = 'user_id';
            $id = Session::get('user_id');
            if(Session::get('user_role') == 2){
                $userid = 'agent_id';
                $id = Session::get('agent_id');
            }
            $employees = DB::table('attendance')
                ->join('users', 'attendance.user_id', '=', 'users.id')
                ->where('attendance.agent_id', $id) // $id = specific employee's ID
                ->where('users.role',5)
                ->distinct()
                ->orderBy('attendance.id', 'desc')
                ->paginate(30);
            //dd($employees);
            $attendance = DB::table('attendance')
                ->where($userid,$id)
                ->distinct()
                ->orderBy('id','desc')->paginate(30);
            //dd($attendance);
            $filter=0;
            return view('hr.attendance', ['atts' => $attendance,'employees' => $employees,'filter' => $filter,]);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function entryAttendance(Request $request)
    {
        try {
            $userId = Session::get('user_id');
            $agentId = Session::get('agent_id');
            $today = date('Y-m-d');
            $now = now()->setTimezone('Asia/Dhaka');
            $entryDeadline = $now->copy()->setTime(10, 10); // 10:10 AM
            $exitDeadline = $now->copy()->setTime(19, 0);    // 7:00 PM

            // Check if attendance already submitted
            $existingAttendance = DB::table('attendance')
                ->where('user_id', $userId)
                ->where('date', $today)
                ->first();

            if ($existingAttendance) {
                return back()->with('errorMessage', 'Attendance already submitted. Try again tomorrow!');
            }

            // Check if current time is beyond exit time
            if ($now->gt($exitDeadline)) {
                return back()->with('errorMessage', 'Attendance time is over. Entry not allowed after 7:00 PM.');
            }

            // Calculate late only if after 10:10 AM
            $late = '';
            if ($now->gt($entryDeadline)) {
                $diff = $now->diff($entryDeadline);
                $hours = $diff->h > 0 ? $diff->h . 'H :' : '';
                $minutes = $diff->i > 0 ? $diff->i . 'M :' : '';
                $seconds = $diff->s > 0 ? $diff->s . 'S' : '';
                $late = $hours . $minutes . $seconds;
            }

            // Get IP
            $ipAddress = $request->ip();

            // Save attendance
            $result = DB::table('attendance')->insert([
                'user_id' => $userId,
                'agent_id' => $agentId,
                'entry_time' => $now,
                'late' => $late,
                'ip' => $ipAddress,
                'date' => $today,
                'month' => $now->format('F'),
            ]);

            if ($result) {
                return redirect()->to('attendance')->with('successMessage', 'Your attendance was submitted successfully!');
            } else {
                return back()->with('errorMessage', 'Attendance submission failed. Please try again!');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function exitAttendance(Request $request)
    {
        try {
            $userId = Session::get('user_id');
            $today = Carbon::now('Asia/Dhaka')->toDateString();

            $attendance = DB::table('attendance')
                ->where('user_id', $userId)
                ->where('date', $today)
                ->first();

            if (!$attendance) {
                return back()->with('errorMessage', 'No entry found. Please mark your entry first.');
            }

            if (!empty($attendance->exit_time)) {
                return back()->with('errorMessage', 'Exit already submitted. Try again tomorrow!');
            }

            $now = Carbon::now('Asia/Dhaka');
            $scheduledExit = Carbon::createFromFormat('Y-m-d H:i:s', $today . ' 19:00:00', 'Asia/Dhaka');

            $earlyExit = null;
            if ($now->lt($scheduledExit)) {
                $interval = $scheduledExit->diff($now);
                $earlyExit = sprintf('%02dH:%02dM:%02dS', $interval->h, $interval->i, $interval->s);
            }

            $result = DB::table('attendance')
                ->where('user_id', $userId)
                ->where('date', $today)
                ->update([
                    'exit_time' => $now->toDateTimeString(),
                    'early_exit' => $earlyExit,
                    'exit_ip' => $request->ip(),
                ]);

            if ($result) {
                return redirect()->to('attendance')->with('successMessage', 'Your exit attendance submitted successfully!');
            } else {
                return back()->with('errorMessage', 'Attendance update failed. Please try again.');
            }

        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('errorMessage', $ex->getMessage());
        }
    }

    public function filterAttendance(Request $request)
    {
        // Step 1: Validate Inputs
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        // Step 2: Set employee based on user role
        if(Session::get('user_role') == 2) {
            $employees = DB::table('users')->where('role', 5)->get();
        } else {
            $employees = '';
            $request->employee = Session::get('user_id');
        }

        // Step 3: Get Attendance Records
        $atts = DB::table('attendance')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->where('user_id', $request->employee)
            ->orderBy('date', 'desc')
            ->paginate(30)
            ->appends($request->all());

        // Step 4: Office Day Calculation (excluding Fridays)
        $range = CarbonPeriod::create($request->start_date, $request->end_date);
        $rangeOfficeDays = collect($range)->filter(function ($date) {
            return $date->format('l') !== 'Friday';
        })->count();

        // Step 5: Late Entry Count
        $lateCount = DB::table('attendance')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->where('user_id', $request->employee)
            ->whereNotNull('late')
            ->where('late', '!=', '')
            ->count();

        // Step 6: Early Exit Count
        $earlyExitCount = DB::table('attendance')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->where('user_id', $request->employee)
            ->whereNotNull('early_exit')
            ->where('early_exit', '!=', '')
            ->count();

        // Step 7: Current Month Office Days (excluding Fridays)
        $now = Carbon::now();
        $currentMonth = CarbonPeriod::create($now->startOfMonth(), $now->endOfMonth());
        $currentMonthOfficeDays = collect($currentMonth)->filter(function ($date) {
            return $date->format('l') !== 'Friday';
        })->count();
        $currentMonthDays = $now->daysInMonth;

        // ✅ Step 8: Total Present Days (Entry Taken)
        $totalPresentDays = DB::table('attendance')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->where('user_id', $request->employee)
            ->whereNotNull('entry_time') // or use 'entry_time' if that's your column
            ->count();
        $filter = 1;
        // Step 9: Return to View
        return view('hr.attendance', compact(
            'atts',
            'employees',
            'rangeOfficeDays',
            'lateCount',
            'earlyExitCount',
            'currentMonthOfficeDays',
            'currentMonthDays',
            'totalPresentDays',
            'filter',
        ));
    }
    public function saveRemark(Request $request)
    {
        $data = $request->validate([
            'id'      => 'required|integer',
            'remarks' => 'required|string|max:255',
        ]);

        $row = DB::table('attendance')
            ->where('id', $data['id'])
            ->select('id','date','late','early_exit','remarks')
            ->first();

        if (!$row) {
            return back()->with('errorMessage', 'Attendance row not found.');
        }

        // 1) remarks allowed only if late or early_exit is present
        if (empty($row->late) && empty($row->early_exit)) {
            return back()->with('errorMessage', 'Remarks allowed only for late entry or early exit.');
        }

        // 2) remarks only the SAME DAY
        $today = Carbon::today(config('app.timezone'))->toDateString();      // e.g. 2025-08-13
        if ((string)$row->date !== $today) {
            return back()->with('errorMessage', 'Remarks can be added only on the same day.');
        }

        // 3) only ONCE (if already set, block)
        if (!empty($row->remarks)) {
            return back()->with('errorMessage', 'Remark already saved and cannot be changed later.');
        }

        DB::table('attendance')->where('id', $row->id)->update([
            'remarks'    => $data['remarks'],
        ]);

        return back()->with('successMessage', 'Remark saved.');
    }
    public function downloadAttendancePdf(Request $request)
    {
        // Step 1: Validate Inputs
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        // Step 2: Get Employee Info
        if(Session::get('user_role') == 2) {
            $employees = DB::table('users')->where('role', 5)->get();
        } else {
            $employees = '';
            $request->employee = Session::get('user_id');
        }

        // Step 3: Get Attendance Data
        $atts = DB::table('attendance')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->where('user_id', $request->employee)
            ->orderBy('date', 'asc')
            ->get();

        $employee = DB::table('users')->where('id', $request->employee)->first();

        // Step 4: Office Days (excluding Fridays)
        $range = CarbonPeriod::create($request->start_date, $request->end_date);
        $rangeOfficeDays = collect($range)->filter(fn($date) => $date->format('l') !== 'Friday')->count();

        // Step 5: Late Count
        $lateCount = DB::table('attendance')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->where('user_id', $request->employee)
            ->whereNotNull('late')
            ->where('late', '!=', '')
            ->count();

        // Step 6: Early Exit Count
        $earlyExitCount = DB::table('attendance')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->where('user_id', $request->employee)
            ->whereNotNull('early_exit')
            ->where('early_exit', '!=', '')
            ->count();

        // ✅ Step 7: Total Present Days (Entry Taken)
        $totalPresentDays = DB::table('attendance')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->where('user_id', $request->employee)
            ->whereNotNull('entry_time') // Adjust this if your column is named differently
            ->count();

        // Step 8: Current Month Days
        $currentMonthDays = Carbon::now()->daysInMonth;

        // Step 9: Get Company Info
        $rows2 = DB::table('users')
            ->where('id', Session::get('agent_id'))
            ->first();

        // Step 10: Generate PDF
        $pdf = Pdf::loadView('hr.attendance_report', [
            'atts' => $atts,
            'company' => $rows2,
            'employee' => $employee,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'rangeOfficeDays' => $rangeOfficeDays,
            'lateCount' => $lateCount,
            'earlyExitCount' => $earlyExitCount,
            'currentMonthDays' => $currentMonthDays,
            'totalPresentDays' => $totalPresentDays
        ]);

        return $pdf->download("Attendance_Report_{$employee->company_name}.pdf");
    }

    public function generateSalary()
    {
        $agentId = Session::get('agent_id');
        $summaries = DB::table('salaries')
            ->select('year', 'month', DB::raw('SUM(salary) as total_salary'))
            ->where('agent_id', $agentId)
            ->where('final_update', 1)
            ->groupBy('year', 'month')
            ->orderByDesc('year')
            ->orderByDesc('month')
            ->get();
        return view('hr.salary.generate-salary', compact('summaries'));
    }
    public function salaryEntry(Request $request)
    {
        $request->validate([
            'month' => 'required|integer|min:1|max:12',
            'year'  => 'required|integer|min:2020',
        ]);

        $agentId = Session::get('agent_id');

        // Prevent regeneration if already finalized

        $existsFinal = DB::table('salaries')
            ->where('agent_id', $agentId)
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->where('final_update', 1)
            ->exists();

        if ($existsFinal) {
            return back()->with('errorMessage', 'Salary for this month has already been finalized. No changes allowed.');
        }
        // Step 1: Get employees under this agent
        $employees = DB::table('employees')
            ->where('agent_id', $agentId)
            ->where('deleted', 0)
            ->get();

        // Step 2: Delete all existing salaries for this agent + month + year
        DB::table('salaries')
            ->where('agent_id', $agentId)
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->delete();

        $insertData = [];

        foreach ($employees as $emp) {
            $salary = $emp->salary ?? 0;

            if ($salary <= 0) continue; // skip if salary not set

            $insertData[] = [
                'agent_id'    => $agentId,
                'emp_id'      => $emp->id,
                'salary'      => $salary,
                'basic'       => round($salary * 0.60, 2),
                'house_rent'  => round($salary * 0.30, 2),
                'medical'     => round($salary * 0.10, 2),
                'commission'  => 0,
                'transport'   => 0,
                'ta_da'       => 0,
                'month'       => $request->month,
                'year'        => $request->year,
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        if (!empty($insertData)) {
            DB::table('salaries')->insert($insertData);

            // Fetch updated salary list to show in view
            $salaries = DB::table('salaries')
                ->where('agent_id', $agentId)
                ->where('month', $request->month)
                ->where('year', $request->year)
                ->get()
                ->keyBy('emp_id');
            $loans = DB::table('loan')
                ->select('emp_id', DB::raw('SUM(loan_amount - paid_amount) as due'))
                ->where('agent_id', $agentId)
                ->whereColumn('loan_amount', '>', 'paid_amount')
                ->groupBy('emp_id')
                ->pluck('due', 'emp_id');

            $summaries = DB::table('salaries')
                ->select('year', 'month', DB::raw('SUM(salary) as total_salary'))
                ->where('agent_id', $agentId)
                ->where('final_update', 1)
                ->groupBy('year', 'month')
                ->orderByDesc('year')
                ->orderByDesc('month')
                ->get();
            return view('hr.salary.generate-salary', [
                'month' => $request->month,
                'year' => $request->year,
                'employees' => $employees,
                'salaries' => $salaries,
                'loans' => $loans,
                'summaries' => $summaries,
            ])->with('successMessage', 'Salaries generated successfully.');
        } else {
            return back()->with('errorMessage', 'No salary generated. Check if salaries are set for employees.');
        }
    }
    public function updateBulkSalary(Request $request)
    {
        $request->validate([
            'month'            => 'required|integer|min:1|max:12',
            'year'             => 'required|integer|min:2020',
            'emp_ids'          => 'required|array',
            'basic'            => 'array',
            'house_rent'       => 'array',
            'medical'          => 'array',
            'transport'        => 'array',
            'commission'       => 'array',
            'ta_da'            => 'array',
            'attendance_day'   => 'array',
            'advance'          => 'array',
            'deduct'           => 'array',
            'loan_due'         => 'array',
            'net_salary'       => 'array',
            'net_pay'          => 'array',
        ]);

        $agentId = Session::get('agent_id');

        DB::beginTransaction();

        try {
            foreach ($request->emp_ids as $index => $emp_id) {
                // Fetch employee name
                $employee = DB::table('employees')->where('id', $emp_id)->first();
                $empName = $employee->name ?? 'Unknown';
                $company = DB::table('users')->where('id', $employee->agent_id)->first();

                // Extract salary data
                $basic         = $request->basic[$index] ?? 0;
                $house_rent    = $request->house_rent[$index] ?? 0;
                $medical       = $request->medical[$index] ?? 0;
                $transport     = $request->transport[$index] ?? 0;
                $commission    = $request->commission[$index] ?? 0;
                $ta_da         = $request->ta_da[$index] ?? 0;
                $attendance    = $request->attendance_day[$index] ?? 0;
                $advance       = $request->advance[$index] ?? 0;
                $deduct        = $request->deduct[$index] ?? 0;
                $loan_due      = $request->loan_due[$index] ?? 0;
                $net_salary    = $request->net_salary[$index] ?? 0;
                $net_pay       = $request->net_pay[$index] ?? 0;

                // Full total (gross)
                $totalSalary = $basic + $house_rent + $medical + $transport + $commission + $ta_da;

                // Step 1: Update salary
                DB::table('salaries')->updateOrInsert(
                    [
                        'agent_id' => $agentId,
                        'emp_id'   => $emp_id,
                        'month'    => $request->month,
                        'year'     => $request->year,
                    ],
                    [
                        'salary'       => $totalSalary,
                        'basic'        => $basic,
                        'house_rent'   => $house_rent,
                        'medical'      => $medical,
                        'transport'    => $transport,
                        'commission'   => $commission,
                        'ta_da'        => $ta_da,
                        'attendance'   => $attendance,
                        'advance'      => $advance,
                        'deduct'       => $deduct,
                        'loan'       => $loan_due,
                        'net_salary'   => $net_salary,
                        'net_pay'      => $net_pay,
                        'final_update' => 1,
                        'updated_at'   => now(),
                    ]
                );

                // Step 2: Update loan repayment
                if ($loan_due > 0) {
                    $existingLoan = DB::table('loan')
                        ->where('emp_id', $emp_id)
                        ->whereColumn('loan_amount', '>', 'paid_amount')
                        ->orderByDesc('id')
                        ->first();

                    if ($existingLoan) {
                        $newPaidAmount = $existingLoan->paid_amount + $loan_due;
                        if ($newPaidAmount > $existingLoan->loan_amount) {
                            $newPaidAmount = $existingLoan->loan_amount;
                        }

                        $updateLoan = [
                            'paid_amount' => $newPaidAmount,
                            'updated_at'  => now(),
                        ];

                        if ($newPaidAmount == $existingLoan->loan_amount) {
                            $updateLoan['status'] = 'Closed';
                            $updateLoan['emp_paid_on'] = now();
                        }

                        DB::table('loan')->where('id', $existingLoan->id)->update($updateLoan);
                    }
                }

                // Step 3: Add ledger to accounts
                DB::table('accounts')->updateOrInsert(
                    [
                        'agent_id'   => $agentId,
                        'invoice_id' => $emp_id,
                        'source'     => 'Salary',
                        'date'       => now()->format('Y-m-d'),
                    ],
                    [
                        'transaction_type' => 'Debit',
                        'purpose'          => 'Salary for ' . $empName . ' - ' . date("F", mktime(0, 0, 0, $request->month, 1)) . ' ' . $request->year,
                        'buying_price'     => $net_salary,
                        'selling_price'    => 0,
                        'updated_at'       => now(),
                    ]
                );
                if (!empty($employee->email)) {
                    $salaryObject = (object)[
                        'month'       => $request->month,
                        'year'        => $request->year,
                        'basic'       => $basic,
                        'house_rent'  => $house_rent,
                        'medical'     => $medical,
                        'transport'   => $transport,
                        'commission'  => $commission,
                        'ta_da'       => $ta_da,
                        'attendance'  => $attendance,
                        'advance'     => $advance,
                        'deduct'      => $deduct,
                        'loan_due'    => $loan_due,
                        'net_salary'  => $net_salary,
                        'net_pay'     => $net_pay,
                    ];

                    try {
                        Mail::to($employee->email)->queue(new SalarySlipMail(
                            $employee,
                            $salaryObject,
                            $company
                        ));
                    } catch (\Exception $mailEx) {
                        Log::error('Email failed for ' . $employee->email . ': ' . $mailEx->getMessage());
                        // Optionally notify admin or continue silently
                    }
                }
            }

            DB::commit();
            return back()->with('successMessage', 'Salary, loan, ledger and email updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('errorMessage', 'Error: ' . $e->getMessage());
        }
    }
    public function salaryDetails($year, $month)
    {
        $agentId = Session::get('agent_id');

        $salaries = DB::table('salaries')
            ->join('employees', 'salaries.emp_id', '=', 'employees.id')
            ->select(
                'employees.name',
                'salaries.emp_id',
                'salaries.salary',
                'salaries.basic',
                'salaries.house_rent',
                'salaries.medical',
                'salaries.transport',
                'salaries.commission',
                'salaries.ta_da',
                'salaries.attendance as attendance_day',
                'salaries.net_salary',
                'salaries.advance',
                'salaries.deduct',
                'salaries.net_pay',
                'salaries.loan'
            )
            ->where('salaries.agent_id', $agentId)
            ->where('salaries.year', $year)
            ->where('salaries.month', $month)
            ->get();

        // calculate working days for the given month
        $workingDays = \Carbon\Carbon::create($year, $month, 1)->daysInMonth;

        return view('hr.salary.salary-details', compact('salaries', 'month', 'year', 'workingDays'));
    }


    public function salaryPayslip($emp_id, $month, $year)
    {
        $agentId = Session::get('agent_id');

        // Get company info
        $company = DB::table('users')->where('id', $agentId)->first();

        // Get salary + employee details
        $salary = DB::table('salaries')
            ->join('employees', 'salaries.emp_id', '=', 'employees.id')
            ->select('employees.*', 'salaries.*')
            ->where('salaries.agent_id', $agentId)
            ->where('salaries.emp_id', $emp_id)
            ->where('salaries.month', $month)
            ->where('salaries.year', $year)
            ->first();

        // Handle missing salary record
        if (!$salary) {
            return back()->with('errorMessage', 'Salary data not found.');
        }
        $workingDays = \Carbon\Carbon::create($year, $month, 1)->daysInMonth;
        // Generate PDF from view
        $pdf = PDF::loadView('hr.salary.payslip-pdf', [
            'salary'  => $salary,
            'company' => $company,
            'workingDays'  => $workingDays,

        ])->setPaper('A4');

        // Filename with employee name and date
        $monthName = \Carbon\Carbon::create()->month($month)->format('F');
        $fileName = 'PaySlip_' . str_replace(' ', '_', $salary->name) . '_' . $monthName . '_' . $year . '.pdf';

        return $pdf->download($fileName);
    }
    public function downloadSalaryReport($year, $month)
    {
        $agentId = Session::get('agent_id');

        // Fetch salaries with full breakdown
        $salaries = DB::table('salaries')
            ->join('employees', 'salaries.emp_id', '=', 'employees.id')
            ->select(
                'employees.name',
                'salaries.emp_id',
                'salaries.salary',
                'salaries.basic',
                'salaries.house_rent',
                'salaries.medical',
                'salaries.transport',
                'salaries.commission',
                'salaries.ta_da',
                'salaries.attendance as attendance_day',
                'salaries.net_salary',
                'salaries.advance',
                'salaries.deduct',
                'salaries.net_pay'
            )
            ->where('salaries.agent_id', $agentId)
            ->where('salaries.year', $year)
            ->where('salaries.month', $month)
            ->get();

        // Fetch company info for branding
        $company = DB::table('users')->where('id', $agentId)->first();

        // Calculate total working days for that month/year
        $workingDays = \Carbon\Carbon::create($year, $month, 1)->daysInMonth;

        // Generate PDF
        $pdf = PDF::loadView('hr.salary.salary-summary-pdf', [
            'salaries'     => $salaries,
            'month'        => $month,
            'year'         => $year,
            'company'      => $company,
            'workingDays'  => $workingDays,
        ])->setPaper('A4', 'landscape');

        $monthName = \Carbon\Carbon::create()->month($month)->format('F');
        $filename = 'Salary_Report_' . $monthName . '_' . $year . '.pdf';

        return $pdf->download($filename);
    }
    public function leaveAdjustmentPage()
    {
        try {
            $agentId = Session::get('agent_id');
            $employees = DB::table('employees')
                ->where('agent_id', $agentId)
                ->where('deleted', 0)
                ->orderBy('name', 'asc')
                ->get();

            return view('hr.leaves.leave-adjustment', compact('employees'));
        } catch (\Exception $e) {
            return back()->with('errorMessage', 'Error: ' . $e->getMessage());
        }
    }

    public function updateLeaveBalance(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|integer',
            'category'    => 'required|string',
            'type'        => 'required|in:add,deduct',
            'days'        => 'required|integer|min:1',
            'cause'       => 'required|string|max:500',
        ]);

        try {
            $employee = DB::table('employees')->where('id', $request->employee_id)->first();
            if (!$employee) {
                return back()->with('errorMessage', 'Employee not found.');
            }

            $leaveColumns = [
                'Casual Leave'     => 'casual_leave',
                'Seek Leave'       => 'seek_leave',
                'Marriage Leave'   => 'marriage_leave',
                'Fatherhood Leave' => 'fatherhood',
                'Motherhood Leave' => 'motherhood',
                'Earned Leave'     => 'earned_leave',
            ];

            $column = $leaveColumns[$request->category] ?? null;
            if (!$column) {
                return back()->with('errorMessage', 'Invalid leave category.');
            }

            $currentValue = $employee->$column ?? 0;

            if ($request->type === 'add') {
                $newValue = $currentValue + $request->days;
            } else {
                $newValue = $currentValue - $request->days;
                if ($newValue < 0) {
                    return back()->with('errorMessage', 'Cannot deduct more than available leave.');
                }
            }

            DB::table('employees')->where('id', $employee->id)->update([
                $column => $newValue,
                'updated_at' => now(),
            ]);
            $user = DB::table('users')->where('company_email', $employee->email)->first();

            DB::table('leave_mngt')->insert([
                'user_id'    => $user->id,
                'agent_id'   => Session::get('agent_id'),
                'category'   => $request->category,
                'start_date' => now(),
                'end_date'   => now(),
                'days'       => $request->days,
                'cause'      => json_encode($request->cause),
                'status'     => 'Approved',
            ]);

            $msg = $request->type === 'add'
                ? 'Leave added successfully!'
                : 'Leave deducted successfully!';
            return back()->with('successMessage', $msg);

        } catch (\Exception $e) {
            return back()->with('errorMessage', 'Error: ' . $e->getMessage());
        }
    }

    public function menuBuilder()
    {
        $agentId = Session::get('agent_id');

        $menus = DB::table('menu_items')
            ->where('agent_id', $agentId)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();

        foreach ($menus as $menu) {
            $menu->children = DB::table('menu_items')
                ->where('agent_id', $agentId)
                ->where('parent_id', $menu->id)
                ->orderBy('order')
                ->get();

            foreach ($menu->children as $child) {
                $child->children = DB::table('menu_items')
                    ->where('agent_id', $agentId)
                    ->where('parent_id', $child->id)
                    ->orderBy('order')
                    ->get();
            }
        }

        $editMenu = null;
        return view('hr.menu_builder', compact('menus', 'editMenu'));
    }
    public function menuStore(Request $request)
    {
        $agentId = Session::get('agent_id');

        $request->validate([
            'name'        => 'required|string|max:255',
            'route'       => 'nullable|string',   // এখানে nullable
            'icon'        => 'nullable|string',
            'parent_id'   => 'nullable',
            'order'       => 'nullable|integer',
            'is_external' => 'nullable',
            'url'         => 'nullable|url'
        ]);

        $data = [
            'name'        => $request->name,
            'route'       => $request->route ?: null,           // খালি হলেও null হবে
            'icon'        => $request->icon ?? 'fas fa-circle',
            'parent_id'   => $request->parent_id == 'none' ? null : $request->parent_id,
            'order'       => $request->order ?? 999,
            'is_external' => $request->is_external ? 1 : 0,
            'url'         => $request->is_external ? $request->url : null,
            'active'      => 1,
            'agent_id'    => $agentId,
            'created_at'  => now(),
            'updated_at'  => now(),
        ];

        if ($request->filled('menu_id')) {
            DB::table('menu_items')
                ->where('id', $request->menu_id)
                ->where('agent_id', $agentId)
                ->update($data);
            $msg = 'Menu Updated Successfully!';
        } else {
            DB::table('menu_items')->insert($data);
            $msg = 'Menu Added Successfully!';
        }

        return back()->with('successMessage', $msg);
    }
    public function menuEdit($id)
    {
        $agentId = Session::get('agent_id');

        $editMenu = DB::table('menu_items')
            ->where('id', $id)
            ->where('agent_id', $agentId)
            ->first();

        if (!$editMenu) {
            return back()->with('errorMessage', 'Menu not found or access denied!');
        }

        $menus = DB::table('menu_items')
            ->where('agent_id', $agentId)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();

        foreach ($menus as $menu) {
            $menu->children = DB::table('menu_items')
                ->where('agent_id', $agentId)
                ->where('parent_id', $menu->id)
                ->orderBy('order')
                ->get();

            foreach ($menu->children as $child) {
                $child->children = DB::table('menu_items')
                    ->where('agent_id', $agentId)
                    ->where('parent_id', $child->id)
                    ->orderBy('order')
                    ->get();
            }
        }

        return view('hr.menu_builder', compact('menus', 'editMenu'));
    }

    public function menuUpdate(Request $request, $id)
    {
        $agentId = Session::get('agent_id');

        $request->validate([
            'name'        => 'required|string|max:255',
            'route'       => 'nullable|string',
            'icon'        => 'nullable|string',
            'parent_id'   => 'nullable|integer',
            'order'       => 'nullable|integer',
            'is_external' => 'nullable',
            'url'         => 'nullable|url'
        ]);

        DB::table('menu_items')
            ->where('id', $id)
            ->where('agent_id', $agentId)
            ->update([
                'name'        => $request->name,
                'route'       => $request->route,
                'icon'        => $request->icon ?? 'fas fa-circle',
                'parent_id'   => $request->parent_id == 'none' ? null : $request->parent_id,
                'order'       => $request->order ?? 999,
                'is_external' => $request->is_external ? 1 : 0,
                'url'         => $request->is_external ? $request->url : null,
                'updated_at'  => now(),
            ]);

        return back()->with('successMessage', 'Menu Updated Successfully!');
    }

    public function menuDelete($id)
    {
        $agentId = Session::get('agent_id');

        // Delete all children first
        $this->deleteChildrenRecursive($id, $agentId);

        DB::table('menu_items')
            ->where('id', $id)
            ->where('agent_id', $agentId)
            ->delete();

        return back()->with('successMessage', 'Menu & All Submenus Deleted Successfully!');
    }

    private function deleteChildrenRecursive($parentId, $agentId)
    {
        $children = DB::table('menu_items')
            ->where('agent_id', $agentId)
            ->where('parent_id', $parentId)
            ->pluck('id');

        foreach ($children as $childId) {
            $this->deleteChildrenRecursive($childId, $agentId);
            DB::table('menu_items')->where('id', $childId)->where('agent_id', $agentId)->delete();
        }
    }

    // ====================== ROLE ASSIGN (Agent-wise) ======================
    public function roleAssign()
    {
        $agentId = Session::get('agent_id');

        $designations = DB::table('designations')
            ->where('agent_id', $agentId)
            ->orderBy('name')
            ->get();

        $menus = DB::table('menu_items')
            ->where('agent_id', $agentId)
            ->whereNull('parent_id')
            ->where('active', 1)
            ->orderBy('order')
            ->get();

        foreach ($menus as $menu) {
            $menu->children = DB::table('menu_items')
                ->where('agent_id', $agentId)
                ->where('parent_id', $menu->id)
                ->where('active', 1)
                ->orderBy('order')
                ->get();

            foreach ($menu->children as $child) {
                $child->children = DB::table('menu_items')
                    ->where('agent_id', $agentId)
                    ->where('parent_id', $child->id)
                    ->where('active', 1)
                    ->orderBy('order')
                    ->get();
            }
        }

        $existingRoles = DB::table('roles')
            ->where('agent_id', $agentId)
            ->pluck('details', 'designation')
            ->toArray();

        return view('hr.role_assign', compact('designations', 'menus', 'existingRoles'));
    }

    public function roleAssignStore(Request $request)
    {
        $agentId = Session::get('agent_id');

        $request->validate([
            'designation' => 'required|string',
            'menus'       => 'nullable|array'
        ]);

        DB::table('roles')->updateOrInsert(
            [
                'agent_id'    => $agentId,
                'designation' => $request->designation
            ],
            [
                'details'    => json_encode($request->menus ?? []),
                'updated_at' => now()
            ]
        );

        return back()->with('successMessage', "Permission saved successfully for {$request->designation}");
    }
}
