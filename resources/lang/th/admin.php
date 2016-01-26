<?php
return [

    /*
    |--------------------------------------------------------------------------
    | English Admin Language Lines
    |--------------------------------------------------------------------------
    */

    "article" => [
        "create"                    => "สร้างบทความใหม่",
        "edit"                      => "แก้ไขบทความ",
        "index"                     => "บทความ",
        "show"                      => "แสดงบทความ"
    ],
    "category" => [
        "create"                    => "สร้างหมวดหมู่",
        "edit"                      => "แก้ไขหมวดหมู่",
        "index"                     => "หมวดหมู่",
        "show"                      => "แสดงหมวดหมู่"
    ],
    "create" => [
        "fail"                      => "กระบวนการสร้างรีซอร์สล้มเหลว",
        "success"                   => "การสร้างรีซอร์สเสร็จสมบูรณ์"
    ],
    "datatables" => [               // DataTables, files can be found @ https://datatables.net/plug-ins/i18n/
        "sInfo"                     => "กำลังแสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
        "sInfoEmpty"                => "กำลังแสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
        "sInfoFiltered"             => "(กรองการแสดงผล จากทั้งหมด _MAX_ รายการ)",
        "sInfoPostFix"              => "",
        "sLengthMenu"               => "แสดง _MENU_ รายการ",
        "sProcessing"               => "กำลังประมวลผล...",
        "sSearch"                   => "ค้นหา:",
        "sUrl"                      => "",
        "sZeroRecords"              => "ไม่พบข้อมูลที่ตรงกัน",
        "oPaginate" => [
            "sFirst"                => "หน้าแรก",
            "sLast"                 => "หน้าสุดท้าย",
            "sNext"                 => "ถัดไป",
            "sPrevious"             => "ก่อนหน้า"
        ]
    ],
    "delete" => [
        "fail"                      => "กระบวนการล้มรีซอร์สล้มเหลว",
        "self"                      => "คุณจะไม่ได้รับในสิ่งที่คุณต้องการเสมอไปหรอกนะ",
        "success"                   => "การลบรีซอร์สเสร็จสมบูรณ์ฺ"
    ],
    "elfinder"                      => "ระบบจัดการไฟล์",
    "empty"                         => "ยังไม่มีบันทึกข้อมูลใดๆเลย ทำไมคุณไม่สร้างใหม่สักอันล่ะ?",
    "fields" => [
        "article" => [
            "category_id"           => "หมวดหมู่",
            "content"               => "เนื้อหา",
            "description"           => "คำอธิบาย",
            "title"                 => "ชื่อบทความ"
        ],
        "category" => [
            "color"                 => "สี",
            "description"           => "คำอธิบาย",
            "language_id"           => "ภาษา",
            "title"                 => "ชื่อหมวดหมู่"
        ],
        "created_at"                => "สร้างเมื่อ",
        "dashboard" => [
            'average_time'          => "เวลาเฉลี่ย",
            'bounce_rate'           => "อัตราตีกลับ",
            'browsers'              => "เบราเซอร์",
            'chart_country'         => "ประเทศ",
            'chart_region'          => "ภูมิภาค",
            'chart_visitors'        => "ผู้เยี่ยมชม",
            'entrance_pages'        => "การเข้าชม",
            'exit_pages'            => "การออก",
            'keywords'              => "คีย์เวิร์ด",
            'os'                    => "ระบบปฏิบัติการ",
            'page_visits'           => "ค่าเฉลี่ยผู้เยี่ยมชม",
            'pages'                 => "หน้าเว็บ",
            'region_visitors'       => "แบ่งประเภทผู้เยี่ยมชม: ภูมิภาค",
            'time_pages'            => "เวลาบนหน้าเว็บ",
            'total_visits'          => "ผู้เยี่ยมชมทั้งหมด",
            'traffic_sources'       => "แหล่งที่มา",
            'unique_visits'         => "ผู้เยี่ยมชมที่ไม่ซ้ำกัน",
            'visitors'              => "ผู้เยี่ยมชม",
            'visits'                => "เข้าชม",
            'world_visitors'        => "แบ่งประเภทผู้เยี่ยมชม: ทั่วโลก"
        ],
        "language" => [
            "code"                  => "รหัสย่อ",
            "flag"                  => "ธงชาติ",
            "site_description"      => "คำอธิบายเว็บไซต์",
            "site_title"            => "ชื่อเว็บไซต์",
            "title"                 => "ชื่อ"
        ],
        "page" => [
            "content"               => "เนื้อหา",
            "description"           => "คำอธิบาย",
            "language_id"           => "ภาษา",
            "title"                 => "ชื่อ",
        ],
        "published_at"              => "เผยแพร่เมื่อ",
        "read_count"                => "จำนวนการอ่าน",
        "reset"                     => "รีเซ็ต",
        "save"                      => "บันทึก",
        "setting" => [
            "analytics_id"          => "Analytics ID ( Format: UA-XXXXXX-YY )",
            "disqus_shortname"      => "Disqus Shortname",
            "email"                 => "Email",
            "facebook"              => "Facebook",
            "logo"                  => "Logo",
            "twitter"               => "Twitter"
        ],
        "updated_at"                => "Updated at",
        "uploaded"                  => "Uploaded file",
        "user" => [
            "email"                 => "Email",
            "ip_address"            => "IP",
            "logged_in_at"          => "Login At",
            "logged_out_at"         => "Logout At",
            "name"                  => "Name",
            "password"              => "Password",
            "password_confirmation" => "Password Confirmation",
            "picture"               => "Avatar"
        ]
    ],
    "language" => [
        "create"                    => "Create language",
        "edit"                      => "Edit language",
        "index"                     => "Languages",
        "show"                      => "Show language"
    ],
    "last_login"                    => "Last Login",
    "menu" => [
        "article" => [
            "add"                   => "Add an Article",
            "all"                   => "All Articles",
            "root"                  => "Articles"
        ],
        "category" => [
            "add"                   => "Add a Category",
            "all"                   => "All Categories",
            "root"                  => "Categories"
        ],
        "dashboard"                 => "Dashboard",
        "language" => [
            "add"                   => "Add a Language",
            "all"                   => "All Languages",
            "root"                  => "Languages"
        ],
        "page" => [
            "add"                   => "Add a Page",
            "all"                   => "All Pages",
            "root"                  => "Pages"
        ],
        "setting"                   => "Settings",
        "user" => [
            "add"                   => "Add a User",
            "all"                   => "All Users",
            "root"                  => "Users"
        ]
    ],
    "ops" => [
        "confirmation"              => "Are you sure?",
        "create"                    => "Create",
        "delete"                    => "Delete",
        "edit"                      => "Edit",
        "modified"                  => "Modified on",
        "name"                      => "Ops",
        "order"                     => "Order",
        "show"                      => "Show"
    ],
    "page" => [
        "create"                    => "Create page",
        "edit"                      => "Edit page",
        "show"                      => "Show page",
        "index"                     => "Pages"
    ],
    "profile"                       => "Profile",
    "root"                          => "Dashboard",
    "setting" => [
        "index"                     => "Settings"
    ],
    "submit"                        => "Submit",
    "title"                         => "Control Panel",
    "update" => [
        "fail"                      => "Update operation on resource has failed.",
        "success"                   => "Resource has been updated succesfully."
    ],
    "user" => [
        "create"                    => "Create user",
        "edit"                      => "Edit user",
        "index"                     => "Users",
        "show"                      => "Show user"
    ]

];
