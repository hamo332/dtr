<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'حقل :attribute يجب أن يكون مقبول.',
    'accepted_if' => 'حقل :attribute must be accepted when :other is :value.',
    'active_url' => 'حقل  :attribute يجب أن يكون رابط صحيح',
    'after' => 'حقل  :attribute يجب أن يكون تاريخ بعد :date.',
    'after_or_equal' => 'حقل  :attribute يجب أن يكون تاريخ بعد أو يساوي  :date.',
    'alpha' => 'حقل  :attribute يجب أن يكون حروف فقط.',
    'alpha_dash' => 'حقل  :attribute يجب أن يحتوي فقط على حروف , أرقام , فواصل - و _.',
    'alpha_num' => 'حقل  :attribute يجب أن يكون عبارة عن حروف وأرقام فقط.',
    'array' => 'حقل  :attribute يجب أن يكون مصفوفة.',
    'before' => 'حقل  :attribute يجب أن يكون تاريخ قبل  :date.',
    'before_or_equal' => 'حقل  :attribute يجب أن يكون تاريخ قبل أو يساوي  :date.',
    'between' => [
        'numeric' => 'حقل  :attribute يجب أن يكون بين  :min و :max.',
        'file' => 'حقل  :attribute يجب أن يكون بين  :min و  :max كيلو بايت.',
        'string' => 'حقل  :attribute يجب أن يكون بين  :min و :max حرف.',
        'array' => 'حقل  :attribute يجب أن يحتوي على  :min و :max عنصر.',
    ],
    'boolean' => 'حقل  :attribute يجب أن يكون true أو false.',
    'confirmed' => 'حقل  :attribute غير مطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'حقل  :attribute تاريخ غير صحيح.',
    'date_equals' => 'حقل  :attribute يجب أن يكون تاريخ يساوي التاريخ  :date.',
    'date_format' => ':attribute لا يتطابق مع تهيئة التاريخ :format.',
    'declined' => 'حقل  :attribute يجب أن يكون مرفوض.',
    'declined_if' => 'حقل  :attribute يجب أن يكون مرفوض عندما يكون  :other يساوي  :value.',
    'different' => ':attribute و :other يجب أن يكونوا مختلفين.',
    'digits' => ':attribute يجب أن يكون :digits أرقام.',
    'digits_between' => ':attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => ':attribute يحتوي على أبعاد الصورة غير صالحة.',
    'distinct' => 'الحقل :attribute يحتوي على قيمة مكررة',
    'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صحيح.',
    'ends_with' => ':attribute يجب أن ينتهي بواحد مما يلي: :values.',
    'enum' => ':attribute الذي أدخلته غير صحيح.',
    'exists' => ':attribute الذي اخترته غير صحيح.',
    'file' => ':attribute يجب أن يكون ملف.',
    'filled' => ':attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'numeric' => ':attribute يجب أن يكون أكبر من :value.',
        'file' => ':attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أكبر من :value كلمة.',
        'array' => ':attribute يجب أن يكون أكقر من :value عنصر.',
    ],
    'gte' => [
        'numeric' => ':attribute يجب أن يكون أكبر من أو يساوي :value.',
        'file' => ':attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'string' => ':attribute mيجب أن يكون أكبر من أو يساوي :value حرف.',
        'array' => ':attribute يجب أن يحتوي على :value عنصر أو أكثر.',
    ],
    'image' => ':attribute يجب أن يكون صورة.',
    'in' => ':attribute الذي تم اختياره غير صحيح.',
    'in_array' => ':attribute ملف غير موجود في :other.',
    'integer' => ':attribute يجب أن يكون رقم صحيح',
    'ip' => ':attribute يجب أن يكون عنوان IP صحيح',
    'ipv4' => ':attribute يجب أن يكون عنوان IPv4 صحيح.',
    'ipv6' => 'حقل  :attribute يجب أن يكون عنوان IPv6 صحيح',
    'json' => 'حقل  :attribute يجب أن يكون عبارة عن JSON صحيح',
    'mac_address' => 'حقل  :attribute يجب أن يكون  عنوان  MAC صحيح.',
    'lt' => [
        'numeric' => ':attribute يجب أن يكون أقل من :value.',
        'file' => ':attribute يجب أن يكون أقل من :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أقل من :value حرف.',
        'array' => ':attribute يجب أن يكون أقل من :value عنصر.',
    ],
    'lte' => [
        'numeric' => ':attribute يجب أن يكون أقل من منأو يساوي :value.',
        'file' => ':attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أقل من أو يساوي :value حرف.',
        'array' => ':attribute يجب ألا يحتوي على أكثر من  :value عنصر.',
    ],
    'max' => [
        'numeric' => ':attribute يجب ألا يكون أكبر من :max.',
        'file' => ':attribute يجب ألا يكون أكبر من :max كيلوبايت.',
        'string' => ':attribute يجب ألا يكون أكبر من :max حرف.',
        'array' => ':attribute يجب ألا يحتوي على أكثر من :max عنصر.',
    ],
    'mimes' => ':attribute يجب أن يكون ملف من نوع: :values.',
    'mimetypes' => ':attribute يجب أن يكون ملف من نوع: :values.',
    'min' => [
        'numeric' => ':attribute يجب أن يكون على الأقل :min.',
        'file' => ':attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'string' => ':attribute يجب أن يكون على الأقل :min حرف.',
        'array' => ':attribute يجب أن يحتوي على الأقل :min عنصر.',
    ],
    'multiple_of' => 'حقل  :attribute يجب أن يكون ضعف  :value.',
    'not_in' => ':attribute الذي تم اختياره غير صحيح.',
    'not_regex' => 'صيغى :attribute غير صحيحة.',
    'numeric' => ':attribute يجب أن يكون رقم.',
    'password' => 'كلمة المرور غير صحيحة.',
    'password_or_username' => 'اسم المستخدم أو كلمة المرور غير صحيحة.',
    'present' => ':attribute يجب أن يكون في الحاضر.',
    'prohibited' => 'حقل  :attribute محظور.',
    'prohibited_if' => 'حقل  :attribute محظور عندما يكون  :other يساوي  :value.',
    'prohibited_unless' => 'حقل  :attribute محظور إذا لم يكن  :other ضمن  :values.',
    'prohibits' => 'حقل  :attribute يحظر  :other من التقديم.',
    'regex' => 'صيغة :attribute غير صحيحة.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب عندما يكون :other يساوي :value.',
    'required_unless' => 'حقل :attribute إذا لم يكن :other في :values.',
    'required_with' => 'حقل :attribute عندما يكون :values في الحاضر.',
    'required_with_all' => 'حقل :attribute مطلوب عندما يكون :values في الحاضر.',
    'required_without' => 'حقل :attribute مطلوب عندما يكون :values ليس في الحاضر.',
    'required_without_all' => 'حقل :attribute عندما لا يكون أي من :values في الحاضر.',
    'same' => ':attribute و :other يجب أن يتطابقا.',
    'size' => [
        'numeric' => ':attribute يجب أن يكون :size.',
        'file' => ':attribute يجب أن يكون :size كيلوبايت.',
        'string' => ':attribute يجب أن يكون :size حرف.',
        'array' => ':attribute يجب أن يحتوي على :size عنصر.',
    ],
    'starts_with' => ':attribute يجب أن يبدأ بأحد العناصر التالية: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => ':attribute يجب أن تكون منطقة صالحة.',
    'unique' => ':attribute موجود مسبقاً.',
    'uploaded' => ':attribute فشل في الرفع.',
    'url' => 'صيغة :attribute غير صحيحة.',
    'uuid' => ':attribute يجب أن يكون UUID صحيح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'site_name' => 'اسم الموقع',
        'logo' => 'الشعار',
        'favicon' => 'الأيقونة',
        'appleicon' => 'أيقونة الهواتف',
        'mail_server' => 'السيرفر',
        'mail_port' => 'المنفذ',
        'mail_user' => 'اسم المستخدم',
        'mail_password' => 'كلمة المرور',
        'mail_encryption' => 'نوع التشفير',
        'mail_sender' => ' عنوان بريد المرسل ',
        'mail_sender_name' => ' اسم المرسل',
        'header_logo' => 'لوجو الهيدر',
        'language_changer' => 'محول اللغة',
        'header_baner' => 'بانر الهيدر',
        'baner_link' => 'رابط البانر',
        'menu' => 'القائمة',
        'footer_about' => 'نص من  نحن',
        'footer_logo' => 'لوجو الفوتر',
        'play_app' => 'رابط تطبيق play store',
        'apple_app' => 'رابط تطبيق app store',
        'contact_phone' => 'رقم الهاتف',
        'contact_address' => 'العنوان',
        'contact_mail' => 'البريد الإلكتروني',
        'contact_location' => 'رابط الخريطة',
        'name' => 'الاسم',
        'title' => 'العنوان',
        'slug' => 'الرابط',
        'content' => 'المحتوى',
        'meta_title' => 'عنوان الميتا',
        'meta_description' => 'وصف الميتا',
        'meta_img' => 'صورة الميتا',
        'meta_keywords' => 'الكلمات الدلالية',
        'cookies_text' => 'نص الاتفاقية',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'head_script' => 'سكريبت الهيدر',
        'footer_script' => 'سكريبت الفوتر',
        'description' => 'الوصف',
        'permissions' => 'الأذونات',
        'phone' => 'الهاتف',
        'user_img' => 'صورة المستخدم',
        'role' => 'الرتبة',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'name_ar' => 'الاسم عربي',
        'name_en' => 'الاسم إنجليزي',
        'code' => 'الكود',
        'level' => 'المستوى',
        'icon' => 'الأيقونة',
        'img' => 'الصورة',
        'majority' => 'التخصص',
        'site_close_message' => 'رسالة إغلاق الموقع',
        'age' => 'العمر',
        'identity_img' => 'صورة الهوية',
        'auth_img' => 'صورة التصريح',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
        '' => '',
    ],

];
