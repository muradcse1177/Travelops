<?php
// config/sidebar.php

return [

    'menus' => [

        // Dashboard - সবাই দেখবে
        [
            'name' => 'Dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'route' => '/main-dashboard',
            'yield' => 'mainDashboard',
            'permission_id' => null,
        ],

        // Report Menu
        [
            'name' => 'Report',
            'icon' => 'fas fa-chart-pie',
            'yield' => 'report',
            'menu_yield' => 'reportMenu',
            'permission_id' => 1,
            'submenu' => [
                ['name' => 'Report Dashboard',    'route' => '/report-dashboard',       'yield' => 'reportDashboard'],
                ['name' => 'Course Sale Report',  'route' => '/course-sale-report',     'yield' => 'courseSaleReport'],
                ['name' => 'Service Lead Report', 'route' => '/service-leads-report',   'yield' => 'serviceLeadsReport'],
                ['name' => 'Visitors Log',        'route' => '/visitor-logs',           'yield' => 'visitor'],
                ['name' => 'Login History',       'route' => 'login.history',           'yield' => 'login'],
            ],
        ],

        ['name' => 'General Invoice',     'icon' => 'fas fa-file-invoice', 'route' => '/g_invoice',        'yield' => 'g_invoice',       'permission_id' => 2],
        ['name' => 'Contacts',            'icon' => 'fas fa-address-book', 'route' => '/contacts',         'yield' => 'contacts',        'permission_id' => 3],
        ['name' => 'Order Request',       'icon' => 'fas fa-shopping-cart','route' => '/orderReceiver',    'yield' => 'orderReceiver',   'permission_id' => 4],

        // Air Ticket
        [
            'name' => 'Air Ticket',
            'icon' => 'fas fa-plane',
            'yield' => 'airTicket',
            'menu_yield' => 'ticketMenu',
            'permission_id' => 5,
            'submenu' => [
                ['name' => 'New Air Ticket',     'route' => 'newAirTicket',       'yield' => 'newAirTicket'],
                ['name' => 'Reissue Ticket',     'route' => 'reissueAirTicket',   'yield' => 'reissueAirTicket'],
                ['name' => 'Refund Ticket',      'route' => 'refundAirTicket',    'yield' => 'refundAirTicket'],
                ['name' => 'Temporary Cancel',   'route' => 'cancelAirTicket',    'yield' => 'cancelAirTicket'],
                ['name' => 'Order Air Ticket',   'route' => 'https://tripdesigner.xyz/', 'yield' => '', 'external' => true],
            ],
        ],

        ['name' => 'Hotel Booking', 'icon' => 'fas fa-home', 'yield' => 'hotel', 'menu_yield' => 'hotelMenu', 'permission_id' => 6,
            'submenu' => [['name' => 'New Hotel Booking', 'route' => 'hotelBooking', 'yield' => 'hotelBooking']]
        ],

        ['name' => 'Visa Processing', 'icon' => 'fas fa-passport', 'yield' => 'visa', 'menu_yield' => 'visaMenu', 'permission_id' => 18,
            'submenu' => [['name' => 'Visa Management', 'route' => 'newVisaProcess', 'yield' => 'newVisaProcess']]
        ],

        ['name' => 'Tour packages', 'icon' => 'fas fa-umbrella-beach', 'yield' => 'tourPackage', 'menu_yield' => 'tourMenu', 'permission_id' => 7,
            'submenu' => [['name' => 'Tour Management', 'route' => 'newTourPackage', 'yield' => 'newTourPackage']]
        ],

        ['name' => 'Services', 'icon' => 'fas fa-headphones', 'yield' => 'Services', 'menu_yield' => 'serviceMenu', 'permission_id' => 20,
            'submenu' => [['name' => 'Service Management', 'route' => 'newServicePackage', 'yield' => 'newServicePackage']]
        ],

        ['name' => 'Hajj & Umrah', 'icon' => 'fas fa-kaaba', 'yield' => 'umrahPackage', 'menu_yield' => 'umrahMenu', 'permission_id' => 8,
            'submenu' => [['name' => 'Hajj & Umrah', 'route' => 'newUmrahPackage', 'yield' => 'newUmrahPackage']]
        ],

        ['name' => 'Work Permit', 'icon' => 'fas fa-user-friends', 'yield' => 'manPowerPackage', 'menu_yield' => 'manPowerMenu', 'permission_id' => 10,
            'submenu' => [['name' => 'W.P Management', 'route' => 'newManPowerPackage', 'yield' => 'newManPowerPackage']]
        ],

        // Accounts & Finance
        [
            'name' => 'Accounts & Finance',
            'icon' => 'fas fa-landmark',
            'yield' => 'accounts',
            'menu_yield' => 'accountMenu',
            'permission_id' => 11,
            'submenu' => [
                ['name' => 'Bank Accounts',         'route' => 'bank-accounts',     'yield' => 'bankAccountSuper'],
                ['name' => 'Payment Request',       'route' => 'payment-request',   'yield' => 'paymentRequest'],
                ['name' => 'Accounts Head',         'route' => 'accountsHead',      'yield' => 'accountsHead'],
                ['name' => 'Office Expense/Income', 'route' => 'officeExpenses',    'yield' => 'officeExpenses'],
                ['name' => 'Ledger Account',        'route' => 'transactions',      'yield' => 'transactions'],
                ['name' => 'Amount in Hand',        'route' => 'bankAccounts',      'yield' => 'bankAccounts'],
            ],
        ],

        // Human Resource
        [
            'name' => 'Human Resource',
            'icon' => 'fas fa-balance-scale',
            'yield' => 'hr',
            'menu_yield' => 'hrMenu',
            'permission_id' => 12,
            'submenu' => [
                ['name' => 'Designation',         'route' => 'designation',        'yield' => 'designation'],
                ['name' => 'Employee Management', 'route' => 'employees',          'yield' => 'employees'],
                ['name' => 'Role Management',     'route' => 'roles',              'yield' => 'roles'],
                ['name' => 'Leave Management',    'route' => 'leaves',             'yield' => 'leaves'],
                ['name' => 'Leave Adjustment',    'route' => 'leave-adjustment',   'yield' => 'leave-adjustment'],
                ['name' => 'Loan Management',     'route' => 'loan',               'yield' => 'loan'],
                ['name' => 'Salary Management',   'route' => 'generate-salary',    'yield' => 'salary'],
                ['name' => 'Attendance',          'route' => 'attendance',         'yield' => 'attendance'],
            ],
        ],

        ['name' => 'Passengers', 'icon' => 'fas fa-user', 'yield' => 'users', 'menu_yield' => 'userMenu', 'permission_id' => 13,
            'submenu' => [['name' => 'Passengers', 'route' => 'users', 'yield' => 'users']]
        ],

        ['name' => 'Agency', 'icon' => 'fas fa-city', 'yield' => 'agency', 'menu_yield' => 'agencyMenu', 'permission_id' => 14,
            'submenu' => [['name' => 'Agency Management', 'route' => 'agency', 'yield' => 'agency']]
        ],

        ['name' => 'Bank Statement', 'icon' => 'fas fa-piggy-bank', 'yield' => 'statement', 'menu_yield' => 'bankDetailsMenu', 'permission_id' => 15,
            'submenu' => [
                ['name' => 'UCB Solvency',   'route' => 'ucbSolvency',   'yield' => 'ucbSolvency'],
                ['name' => 'UCB Statement',  'route' => 'ucbStatement',  'yield' => 'ucbStatement'],
                ['name' => 'City Solvency',  'route' => 'citySolvency',  'yield' => 'citySolvency'],
                ['name' => 'City Statement', 'route' => 'cityStatement', 'yield' => 'cityStatement'],
                ['name' => 'Brac Solvency',  'route' => 'bracSolvency',  'yield' => 'bracSolvency'],
                ['name' => 'Brac Statement', 'route' => 'bracStatement', 'yield' => 'bracStatement'],
            ],
        ],

        ['name' => 'Marketing', 'icon' => 'fas fa-sms', 'yield' => 'sender', 'menu_yield' => 'senderMenu', 'permission_id' => 16,
            'submenu' => [
                ['name' => 'SMS Sender', 'route' => 'smsSender',       'yield' => 'smsSender'],
                ['name' => 'SMS Log',    'route' => 'smsLog',          'yield' => 'smsLog'],
                ['name' => 'Email Sender','route' => 'emailSender',    'yield' => 'emailSender'],
                ['name' => 'Email Log',  'route' => 'emailSenderLog',  'yield' => 'emailSenderLog'],
            ],
        ],

        ['name' => 'Admin Settings', 'icon' => 'fas fa-cogs', 'yield' => 'settings', 'menu_yield' => 'settingsMenu', 'permission_id' => 17,
            'submenu' => [
                ['name' => 'Company Settings', 'route' => 'companyInfo', 'yield' => 'companyInfo'],
                ['name' => 'Vendor Settings',  'route' => 'vendors',     'yield' => 'vendors'],
                ['name' => 'Airlines Settings','route' => 'airlines',   'yield' => 'airlines'],
                ['name' => 'Airport Settings', 'route' => 'airports',    'yield' => 'airports'],
            ],
        ],

        // Website Settings - সবচেয়ে বড় মেনু
        [
            'name' => 'Website Settings',
            'icon' => 'fas fa-cog',
            'yield' => 'webSettings',
            'menu_yield' => 'websiteMenu',
            'permission_id' => 19,
            'submenu' => [
                ['name' => 'Company Info',         'route' => 'b2cCompany',              'yield' => 'b2cCompany'],
                ['name' => 'Domain Management',    'route' => 'domainManage',            'yield' => 'domainManage'],
                ['name' => 'Tour Package Country', 'route' => 'tourPackCountry',         'yield' => 'tourPackCountry'],
                ['name' => 'Tour Package',         'route' => 'b2cTourPackage',          'yield' => 'b2cTourPackage'],
                ['name' => 'Visa Country',         'route' => 'b2cVisaCountry',          'yield' => 'b2cVisaCountry'],
                ['name' => 'Visa Settings',        'route' => 'b2cVisaManagement',       'yield' => 'b2cVisaManagement'],
                ['name' => 'Services',             'route' => 'b2cServiceManagement',    'yield' => 'b2cServiceManagement'],
                ['name' => 'Manpower Country',     'route' => 'b2cManpowerCountry',      'yield' => 'b2cManpowerCountry'],
                ['name' => 'Manpower Package',     'route' => 'b2cManpowerManagement',   'yield' => 'b2cManpowerManagement'],
                ['name' => 'Hajj & Umrah Package', 'route' => 'b2cHajjUmrahManagememt',  'yield' => 'b2cHajjUmrahManagememt'],
                ['name' => 'Blog Management',      'route' => 'blogManagement',          'yield' => 'blogManagement'],

                // Nested Education Menu
                [
                    'name' => 'Education',
                    'yield' => 'WebEducation',
                    'menu_yield' => 'webEducationMenu',
                    'submenu' => [
                        ['name' => 'Country Management',    'route' => 'webEduCountryManagement',    'yield' => 'webEduCountryManagement'],
                        ['name' => 'University Management', 'route' => 'webEduUniversityManagement', 'yield' => 'webEduUniversityManagement'],
                        ['name' => 'Course Management',     'route' => 'webEduCourseManagement',     'yield' => 'webEduCourseManagement'],
                    ],
                ],
            ],
        ],

    ],
];