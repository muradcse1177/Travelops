<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DomPDF Root Directory
    |--------------------------------------------------------------------------
    |
    | Set this to the root directory of your DomPDF installation.
    |
    */
    'show_warnings' => false,

    /*
    |--------------------------------------------------------------------------
    | Log warnings from DomPDF
    |--------------------------------------------------------------------------
    */
    'log_output_file' => storage_path('logs/dompdf.html'),

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable html5 parser.
    |--------------------------------------------------------------------------
    |
    | This is set to true by default, but you can disable it if you are having
    | issues with special HTML.
    |
    */
    'enable_html5_parser' => true,

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable remote file access
    |--------------------------------------------------------------------------
    |
    | If you want to download images from external URLs, you need to enable this.
    |
    */
    'enable_remote' => true,

    /*
    |--------------------------------------------------------------------------
    | Font directory
    |--------------------------------------------------------------------------
    |
    | The location to look for fonts to use in rendering PDFs.
    |
    */
    'font_dir' => storage_path('fonts/'),

    /*
    |--------------------------------------------------------------------------
    | Font cache directory
    |--------------------------------------------------------------------------
    |
    | The location to cache font metrics.
    |
    */
    'font_cache' => storage_path('fonts/'),

    /*
    |--------------------------------------------------------------------------
    | Default font
    |--------------------------------------------------------------------------
    |
    | The default font to use when none is specified.
    |
    */
    'default_font' => 'DejaVu Sans',

    /*
    |--------------------------------------------------------------------------
    | Custom font families
    |--------------------------------------------------------------------------
    |
    | Add custom fonts here to use in your PDFs. Example:
    |
    | 'custom_font' => [
    |     'R'  => 'YourFont-Regular.ttf',
    |     'B'  => 'YourFont-Bold.ttf',
    |     'I'  => 'YourFont-Italic.ttf',
    |     'BI' => 'YourFont-BoldItalic.ttf',
    | ]
    |
    */
    'font_family' => [
        'sans-serif' => [
            'R'  => 'Helvetica',
            'B'  => 'Helvetica-Bold',
            'I'  => 'Helvetica-Oblique',
            'BI' => 'Helvetica-BoldOblique',
        ],
        'serif' => [
            'R'  => 'Times-Roman',
            'B'  => 'Times-Bold',
            'I'  => 'Times-Italic',
            'BI' => 'Times-BoldItalic',
        ],
        'monospace' => [
            'R'  => 'Courier',
            'B'  => 'Courier-Bold',
            'I'  => 'Courier-Oblique',
            'BI' => 'Courier-BoldOblique',
        ],
        'DejaVu Sans' => [
            'R'  => 'DejaVuSans.ttf',
            'B'  => 'DejaVuSans-Bold.ttf',
            'I'  => 'DejaVuSans-Oblique.ttf',
            'BI' => 'DejaVuSans-BoldOblique.ttf',
        ],
        'DejaVu Sans Mono' => [
            'R'  => 'DejaVuSansMono.ttf',
            'B'  => 'DejaVuSansMono-Bold.ttf',
            'I'  => 'DejaVuSansMono-Oblique.ttf',
            'BI' => 'DejaVuSansMono-BoldOblique.ttf',
        ],

        // 👉 Example: News Gothic Std (custom)
        'NewsGothicStd' => [
            'R' => 'NewsGothicStd-Regular.ttf',
            'B' => 'NewsGothicStd-Bold.ttf',
        ],
        'timesnewroman' => [
            'R' => 'times-new-roman/times-new-roman.ttf',
            'B' => 'times-new-roman/times-new-roman-bold.ttf',
            'I' => 'times-new-roman/times-new-roman-italic.ttf',
        ],
        'solaimanlipi' => [
            'R'  => 'SolaimanLipi.ttf',       // Normal
            'B'  => 'SolaimanLipiBold.ttf',       // যদি Bold আলাদা না থাকে
            'I'  => 'SolaimanLipi.ttf',
            'BI' => 'SolaimanLipi.ttf',
        ],
        'kalpurush' => [
            'R'  => 'kalpurush.ttf',
            'B'  => 'kalpurush.ttf', // না থাকলে normal use করুন
            'I'  => 'kalpurush.ttf',
            'BI' => 'kalpurush.ttf',
        ],
        'calibri' => [
            'R'  => 'calibri-regular.ttf',
            'B'  => 'calibri-bold.ttf',
            'I'  => 'calibri-italic.ttf',
            'BI' => 'calibri-bold-italic.ttf',
        ],
    ],
];
