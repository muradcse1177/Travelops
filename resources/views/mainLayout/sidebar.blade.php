<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
        @if(@$company_info->logo)
            <div style="background-color: #FFFFFF; border-radius: 10px;" >
                <img src="{{$domain.'/'.@$company_info->logo}}" width="150" height="40" style="margin-left: 20px; margin-top: 5px; margin-bottom: 5px;">
            </div>
        @else
            <div>
                <h4 style="color: #FFFFFF;">{{@$company_info->company_name}}</h4>
            </div>
        @endif
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
                <br>
                <li class="nav-item">
                    <a href="{{url('/main-dashboard')}}" class="nav-link @yield('mainDashboard')">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php
                $r_details  = json_decode(@$role->details);
                ?>
                @if($company_info->role == 2)
                    <li class="nav-item @yield('reportMenu')">
                        <a href="#" class="nav-link @yield('report')">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Report
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/report-dashboard')}}" class="nav-link @yield('reportDashboard')">

                                    <p>Report Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/course-sale-report')}}" class="nav-link @yield('courseSaleReport')">
                                    <p>Online Payment Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/service-leads-report ')}}" class="nav-link @yield('serviceLeadsReport')">
                                    <p>Service Lead Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('visitor-logs')}}" class="nav-link @yield('visitor')">
                                    <p>Visitors Log</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('login.history') }}" class="nav-link  @yield('login')">
                                    <p>Login History</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/g_invoice')}}" class="nav-link @yield('g_invoice')">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>General Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/contacts')}}" class="nav-link @yield('contacts')">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>Contacts</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/orderReceiver')}}" class="nav-link @yield('orderReceiver')">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Order Request</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/contact-us-support')}}" class="nav-link @yield('contact-us-support')">
                            <i class="nav-icon fas fa-headset"></i>
                            <p>Website Support</p>
                        </a>
                    </li>
                    <li class="nav-item @yield('ticketMenu')">
                        <a href="#" class="nav-link @yield('airTicket')">
                            <i class="nav-icon fas fa-plane"></i>
                            <p>
                                Air Ticket
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('newAirTicket')}}" class="nav-link @yield('newAirTicket')">

                                    <p>New Air Ticket</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("reissueAirTicket")}}" class="nav-link @yield('reissueAirTicket')">

                                    <p>Reissue Ticket</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("refundAirTicket")}}" class="nav-link @yield('refundAirTicket')">

                                    <p>Refund Ticket</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url("cancelAirTicket")}}" class="nav-link @yield('cancelAirTicket')">

                                    <p>Temporary Cancel</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://tripdesigner.xyz/" class="nav-link" target="_blank">

                                    <p>Order Air Ticket</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @yield('hotelMenu')">
                        <a href="#" class="nav-link @yield('hotel')">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Hotel Booking
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('hotelBooking')}}" class="nav-link @yield('hotelBooking')">

                                    <p>New Hotel Booking</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @yield('visaMenu')">
                        <a href="#" class="nav-link @yield('visa')">
                            <i class="nav-icon fas fa-passport"></i>
                            <p>
                                Visa Processing
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("newVisaProcess")}}" class="nav-link @yield('newVisaProcess')">

                                    <p>Visa Management</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @yield('tourMenu')">
                        <a href="#" class="nav-link @yield('tourPackage')">
                            <i class="nav-icon fas fa-umbrella-beach"></i>
                            <p>
                                Tour packages
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("newTourPackage")}}" class="nav-link @yield('newTourPackage')">

                                    <p> Tour Management</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item @yield('serviceMenu')">
                        <a href="#" class="nav-link @yield('Services')">
                            <i class="nav-icon fas fa-headphones"></i>
                            <p>
                                Services
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("newServicePackage")}}" class="nav-link @yield('newServicePackage')">
                                    <p> Service Management</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @yield('umrahMenu')">
                        <a href="#" class="nav-link @yield('umrahPackage')">
                            <i class="nav-icon fas fa-kaaba"></i>
                            <p>
                                Hajj & Umrah
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("newUmrahPackage")}}" class="nav-link @yield('newUmrahPackage')">

                                    <p> Hajj & Umrah</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @yield('manPowerMenu')">
                        <a href="#" class="nav-link @yield('manPowerPackage')">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Work Permit
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url("newManPowerPackage")}}" class="nav-link @yield('newManPowerPackage')">

                                    <p> W.P Management</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @yield('accountMenu')">
                        <a href="#" class="nav-link @yield('accounts')">
                            <i class="nav-icon fas fa-landmark"></i>
                            <p>
                                Accounts & Finance
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('bank-accounts')}}" class="nav-link @yield('bankAccountSuper')">

                                    <p>Bank Accounts </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('payment-request')}}" class="nav-link @yield('paymentRequest')">

                                    <p>Payment Request</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('accountsHead')}}" class="nav-link @yield('accountsHead')">

                                    <p>Accounts Head</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('officeExpenses')}}" class="nav-link @yield('officeExpenses')">

                                    <p>Office Expense/Income</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('transactions')}}" class="nav-link @yield('transactions')">

                                    <p>Ledger Account</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('bankAccounts')}}" class="nav-link @yield('bankAccounts')">

                                    <p>Amount in Hand</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  @yield('hrMenu')">
                        <a href="#" class="nav-link @yield('hr')">
                            <i class="nav-icon fas fa-balance-scale"></i>
                            <p>
                                Human Resource
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('designation')}}" class="nav-link  @yield('designation')">

                                    <p>Designation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('employees')}}" class="nav-link  @yield('employees')">

                                    <p>Employee Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('roles')}}" class="nav-link  @yield('roles')">
                                    <p>Role Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('leaves')}}" class="nav-link  @yield('leaves')">
                                    <p>Leave Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('leave-adjustment')}}" class="nav-link  @yield('leave-adjustment')">
                                    <p>Leave Adjustment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('loan')}}" class="nav-link  @yield('loan')">

                                    <p>Loan Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('generate-salary')}}" class="nav-link  @yield('salary')">

                                    <p>Salary Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('attendance')}}" class="nav-link  @yield('attendance')">

                                    <p>Attendance</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  @yield('inventoryMenu')">
                        <a href="#" class="nav-link @yield('inventory')">
                            <i class="nav-icon fas fa-align-justify"></i>
                            <p>
                                Inventory
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('inventory/categoryManagement')}}" class="nav-link  @yield('categoryManagement')">
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('inventory/productManagement')}}" class="nav-link  @yield('productManagement')">
                                    <p>Product</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item  @yield('userMenu')">
                        <a href="#" class="nav-link @yield('users')">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Passengers
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('users')}}" class="nav-link  @yield('users')">

                                    <p>Passengers</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(Session::get('agent_id') == 4)
                    <li class="nav-item  @yield('agencyMenu')">
                        <a href="#" class="nav-link @yield('agency')">
                            <i class="nav-icon fas fa-city"></i>
                            <p>
                                Agency
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('agency')}}" class="nav-link  @yield('agency')">

                                    <p>Agency Management</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item  @yield('bankDetailsMenu')">
                        <a href="#" class="nav-link @yield('statement')">
                            <i class="nav-icon fas fa-piggy-bank"></i>
                            <p>
                                Bank Statement
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('ucbSolvency')}}" class="nav-link  @yield('ucbSolvency')">

                                    <p>UCB Solvency</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('ucbStatement')}}" class="nav-link  @yield('ucbStatement')">
                                    <p>UCB Statement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('citySolvency')}}" class="nav-link  @yield('citySolvency')">

                                    <p>City Solvency</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('cityStatement')}}" class="nav-link  @yield('cityStatement')">

                                    <p>City Statement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('bracSolvency')}}" class="nav-link  @yield('bracSolvency')">

                                    <p>Brac Solvency</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('bracStatement')}}" class="nav-link  @yield('bracStatement')">
                                    <p>Brac Statement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('siblFdrSolvency')}}" class="nav-link  @yield('siblFdrSolvency')">
                                    <p>SIBL FDR Solvency</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('siblFdrStatement')}}" class="nav-link  @yield('siblFdrStatement')">
                                    <p>SIBL FDR Statement</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  @yield('senderMenu')">
                        <a href="#" class="nav-link @yield('sender')">
                            <i class="nav-icon fas fa-sms"></i>
                            <p>
                                Marketing
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('smsSender')}}" class="nav-link  @yield('smsSender')">

                                    <p>SMS Sender</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('smsLog')}}" class="nav-link  @yield('smsLog')">

                                    <p>SMS Log</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('emailSender')}}" class="nav-link  @yield('emailSender')">
                                    <p>Email Sender</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('emailSenderLog')}}" class="nav-link  @yield('emailSenderLog')">
                                    <p>Email Log</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  @yield('settingsMenu')">
                        <a href="#" class="nav-link @yield('settings')">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Admin Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('companyInfo')}}" class="nav-link  @yield('companyInfo')">

                                    <p>Company Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('vendors')}}" class="nav-link  @yield('vendors')">

                                    <p>Vendor Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('airlines')}}" class="nav-link  @yield('airlines')">

                                    <p>Airlines Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('airports')}}" class="nav-link  @yield('airports')">

                                    <p>Airport Settings</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @yield('academyMenu')">
                        <a href="#" class="nav-link @yield('academy')">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Academy Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('course-management')}}" class="nav-link @yield('course')">

                                    <p>Course Management </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('class-videos')}}" class="nav-link @yield('class')">

                                    <p>Class Management </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('ebook-management')}}" class="nav-link @yield('ebook')">

                                    <p>E-Book Management</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  @yield('websiteMenu')">
                        <a href="#" class="nav-link @yield('webSettings')">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Website Settings
                                <i class="fas fa-angle-left right"></i><br>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('b2cCompany')}}" class="nav-link  @yield('b2cCompany')">
                                    <p>Company Info</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('domainManage')}}" class="nav-link  @yield('domainManage')">
                                    <p>Domain Management</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('tourPackCountry')}}" class="nav-link  @yield('tourPackCountry')">
                                    <p>Tour Package Country</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('b2cTourPackage')}}" class="nav-link  @yield('b2cTourPackage')">
                                    <p>Tour Package</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('b2cVisaCountry')}}" class="nav-link  @yield('b2cVisaCountry')">
                                    <p>Visa Country</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('b2cVisaManagement')}}" class="nav-link  @yield('b2cVisaManagement')">
                                    <p>Visa Settings</p>
                                </a>
                            </li>
                            <li class="nav-item @yield('webEducationMenu')">
                                <a href="#" class="nav-link @yield('WebEducation')">
                                    <p>
                                        Education
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{url("webEduCountryManagement")}}" class="nav-link @yield('webEduCountryManagement')">
                                            <p> Country Management</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url("webEduUniversityManagement")}}" class="nav-link @yield('webEduUniversityManagement')">
                                            <p> University Management</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url("webEduCourseManagement")}}" class="nav-link @yield('webEduCourseManagement')">
                                            <p> Course Management</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('b2cServiceManagement')}}" class="nav-link  @yield('b2cServiceManagement')">
                                    <p>Services</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('b2cManpowerCountry')}}" class="nav-link  @yield('b2cManpowerCountry')">
                                    <p>Manpower Country</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('b2cManpowerManagement')}}" class="nav-link  @yield('b2cManpowerManagement')">
                                    <p>Manpower Package</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('b2cHajjUmrahManagememt')}}" class="nav-link  @yield('b2cHajjUmrahManagememt')">
                                    <p>Hajj & Umrah Package</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('blogManagement')}}" class="nav-link  @yield('blogManagement')">
                                    <p>Blog Management</p>
                                </a>
                            </li>
                        </ul><br>
                    </li>
                @else
                    @if($r_details != null)
                        @foreach($r_details as $detail)
                            @if($detail == $attributes[1]->id)
                                <li class="nav-item">
                                    <a href="{{url('/report-dashboard')}}" class="nav-link @yield('reportDashboard')">
                                        <i class="nav-icon fas fa-chart-line"></i>
                                        <p>Report Dashboard</p>
                                    </a>
                                </li>
                            @endif
                            @if($detail == $attributes[2]->id)
                                <li class="nav-item">
                                    <a href="{{url('/g_invoice')}}" class="nav-link @yield('g_invoice')">
                                        <i class="nav-icon fas fa-file-invoice"></i>
                                        <p>General Invoice</p>
                                    </a>
                                </li>
                            @endif
                            @if($detail == $attributes[3]->id)
                                <li class="nav-item">
                                    <a href="{{url('/contacts')}}" class="nav-link @yield('contacts')">
                                        <i class="nav-icon fas fa-address-book"></i>
                                        <p>Contacts</p>
                                    </a>
                                </li>
                            @endif
                            @if($detail == $attributes[4]->id)
                                <li class="nav-item">
                                    <a href="{{url('/orderReceiver')}}" class="nav-link @yield('orderReceiver')">
                                        <i class="nav-icon fas fa-shopping-cart"></i>
                                        <p>Order Request</p>
                                    </a>
                                </li>
                            @endif
                            @if($detail == $attributes[5]->id)
                                <li class="nav-item @yield('ticketMenu')">
                                    <a href="#" class="nav-link @yield('airTicket')">
                                        <i class="nav-icon fas fa-plane"></i>
                                        <p>
                                            Air Ticket
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('newAirTicket')}}" class="nav-link @yield('newAirTicket')">

                                                <p>New Air Ticket</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url("reissueAirTicket")}}" class="nav-link @yield('reissueAirTicket')">

                                                <p>Reissue Ticket</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url("refundAirTicket")}}" class="nav-link @yield('refundAirTicket')">

                                                <p>Refund Ticket</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url("cancelAirTicket")}}" class="nav-link @yield('cancelAirTicket')">

                                                <p>Temporary Cancel</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="https://tripdesigner.xyz/" class="nav-link" target="_blank">

                                                <p>Order Air Ticket</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[6]->id)
                                <li class="nav-item @yield('hotelMenu')">
                                    <a href="#" class="nav-link @yield('hotel')">
                                        <i class="nav-icon fas fa-home"></i>
                                        <p>
                                            Hotel Booking
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('hotelBooking')}}" class="nav-link @yield('hotelBooking')">

                                                <p>New Hotel Booking</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[18]->id)
                                <li class="nav-item @yield('visaMenu')">
                                    <a href="#" class="nav-link @yield('visa')">
                                        <i class="nav-icon fas fa-passport"></i>
                                        <p>
                                            Visa Processing
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url("newVisaProcess")}}" class="nav-link @yield('newVisaProcess')">

                                                <p>Visa Management</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[7]->id)
                                <li class="nav-item @yield('tourMenu')">
                                    <a href="#" class="nav-link @yield('tourPackage')">
                                        <i class="nav-icon fas fa-umbrella-beach"></i>
                                        <p>
                                            Tour packages
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url("newTourPackage")}}" class="nav-link @yield('newTourPackage')">

                                                <p> Tour Management</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[8]->id)
                                <li class="nav-item @yield('umrahMenu')">
                                    <a href="#" class="nav-link @yield('umrahPackage')">
                                        <i class="nav-icon fas fa-kaaba"></i>
                                        <p>
                                            Hajj & Umrah
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url("newUmrahPackage")}}" class="nav-link @yield('newUmrahPackage')">

                                                <p> Hajj & Umrah</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[9]->id)

                            @endif
                            @if($detail == $attributes[10]->id)
                                <li class="nav-item @yield('manPowerMenu')">
                                    <a href="#" class="nav-link @yield('manPowerPackage')">
                                        <i class="nav-icon fas fa-user-friends"></i>
                                        <p>
                                            Work Permit
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url("newManPowerPackage")}}" class="nav-link @yield('newManPowerPackage')">

                                                <p> W.P Management</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[11]->id)
                                <li class="nav-item @yield('accountMenu')">
                                    <a href="#" class="nav-link @yield('accounts')">
                                        <i class="nav-icon fas fa-landmark"></i>
                                        <p>
                                            Accounts & Finance
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('bank-accounts')}}" class="nav-link @yield('bankAccountSuper')">

                                                <p>Bank Accounts </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('payment-request')}}" class="nav-link @yield('paymentRequest')">

                                                <p>Payment Request</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('accountsHead')}}" class="nav-link @yield('accountsHead')">

                                                <p>Accounts Head</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('officeExpenses')}}" class="nav-link @yield('officeExpenses')">

                                                <p>Office Expense/Income</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('transactions')}}" class="nav-link @yield('transactions')">

                                                <p>Ledger Account</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('bankAccounts')}}" class="nav-link @yield('bankAccounts')">

                                                <p>Amount in Hand</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[12]->id)
                                <li class="nav-item  @yield('hrMenu')">
                                    <a href="#" class="nav-link @yield('hr')">
                                        <i class="nav-icon fas fa-balance-scale"></i>
                                        <p>
                                            Human Resource
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('leaves')}}" class="nav-link  @yield('leaves')">

                                                <p>Leave Management</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('attendance')}}" class="nav-link  @yield('attendance')">

                                                <p>Attendance</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[13]->id)
                                <li class="nav-item  @yield('userMenu')">
                                    <a href="#" class="nav-link @yield('users')">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>
                                            Passengers
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('users')}}" class="nav-link  @yield('users')">

                                                <p>Passengers</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[14]->id && Session::get('agent_id') == 4)
                                <li class="nav-item  @yield('agencyMenu')">
                                    <a href="#" class="nav-link @yield('agency')">
                                        <i class="nav-icon fas fa-city"></i>
                                        <p>
                                            Agency
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('agency')}}" class="nav-link  @yield('agency')">

                                                <p>Agency Management</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[15]->id)
                                <li class="nav-item  @yield('bankDetailsMenu')">
                                    <a href="#" class="nav-link @yield('statement')">
                                        <i class="nav-icon fas fa-piggy-bank"></i>
                                        <p>
                                            Bank Statement
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('ucbSolvency')}}" class="nav-link  @yield('ucbSolvency')">

                                                <p>UCB Solvency</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('ucbStatement')}}" class="nav-link  @yield('ucbStatement')">
                                                <p>UCB Statement</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('citySolvency')}}" class="nav-link  @yield('citySolvency')">

                                                <p>City Solvency</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('cityStatement')}}" class="nav-link  @yield('cityStatement')">

                                                <p>City Statement</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[16]->id)
                                <li class="nav-item  @yield('senderMenu')">
                                    <a href="#" class="nav-link @yield('sender')">
                                        <i class="nav-icon fas fa-sms"></i>
                                        <p>
                                            Marketing
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('smsSender')}}" class="nav-link  @yield('smsSender')">

                                                <p>SMS Sender</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('smsLog')}}" class="nav-link  @yield('smsLog')">

                                                <p>SMS Log</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('emailSender')}}" class="nav-link  @yield('emailSender')">
                                                <p>Email Sender</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('emailSenderLog')}}" class="nav-link  @yield('emailSenderLog')">
                                                <p>Email Log</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[17]->id)
                                <li class="nav-item  @yield('settingsMenu')">
                                    <a href="#" class="nav-link @yield('settings')">
                                        <i class="nav-icon fas fa-cogs"></i>
                                        <p>
                                            Admin Settings
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('companyInfo')}}" class="nav-link  @yield('companyInfo')">

                                                <p>Company Settings</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('vendors')}}" class="nav-link  @yield('vendors')">

                                                <p>Vendor Settings</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('airlines')}}" class="nav-link  @yield('airlines')">

                                                <p>Airlines Settings</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('airports')}}" class="nav-link  @yield('airports')">

                                                <p>Airport Settings</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            @if($detail == $attributes[19]->id)
                                <li class="nav-item  @yield('websiteMenu')">
                                    <a href="#" class="nav-link @yield('webSettings')">
                                        <i class="nav-icon fas fa-cog"></i>
                                        <p>
                                            Website Settings
                                            <i class="fas fa-angle-left right"></i><br>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{url('b2cCompany')}}" class="nav-link  @yield('b2cCompany')">

                                                <p>Company Info</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('domainManage')}}" class="nav-link  @yield('domainManage')">

                                                <p>Domain Management</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('tourPackCountry')}}" class="nav-link  @yield('tourPackCountry')">

                                                <p>Tour Package Country</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('b2cTourPackage')}}" class="nav-link  @yield('b2cTourPackage')">

                                                <p>Tour Package</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('b2cVisaCountry')}}" class="nav-link  @yield('b2cVisaCountry')">

                                                <p>Visa Country</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('b2cVisaManagement')}}" class="nav-link  @yield('b2cVisaManagement')">

                                                <p>Visa Settings</p>
                                            </a>
                                        </li>
                                        <li class="nav-item @yield('webEducationMenu')">
                                            <a href="#" class="nav-link @yield('WebEducation')">
                                                <p>
                                                    Education
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="{{url("webEduCountryManagement")}}" class="nav-link @yield('webEduCountryManagement')">
                                                        <p> Country Management</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{url("webEduUniversityManagement")}}" class="nav-link @yield('webEduUniversityManagement')">
                                                        <p> University Management</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{url("webEduCourseManagement")}}" class="nav-link @yield('webEduCourseManagement')">
                                                        <p> Course Management</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('b2cServiceManagement')}}" class="nav-link  @yield('b2cServiceManagement')">

                                                <p>Services</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('b2cManpowerCountry')}}" class="nav-link  @yield('b2cManpowerCountry')">

                                                <p>Manpower Country</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('b2cManpowerManagement')}}" class="nav-link  @yield('b2cManpowerManagement')">

                                                <p>Manpower Package</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('b2cHajjUmrahManagememt')}}" class="nav-link  @yield('b2cHajjUmrahManagememt')">

                                                <p>Hajj & Umrah Package</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{url('blogManagement')}}" class="nav-link  @yield('blogManagement')">

                                                <p>Blog Management</p>
                                            </a>
                                        </li>
                                    </ul><br>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endif

            </ul><br>
        </nav>
    </div>
</aside>
