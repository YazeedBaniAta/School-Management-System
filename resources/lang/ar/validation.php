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

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'يجب ان يكون عنوان ايميل صحيح',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => ':attribute يجب ان يكون  :min ارقام',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute يجب ان يكون رقم',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => ':attribute غير صحيح الادخال',
    'required' => ':attribute  مطلوب',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ' :attribute  موجود مسبقا',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => ':attribute غير صحيح الادخال',
    'uuid' => 'The :attribute must be a valid UUID.',

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

        //this is message to grades pages attributes
        'Name'=>'الاسم باللغة العربية',
        'Name_en'=>'الاسم باللغة الانجليزية',

        //this is message to ClassRoom pages attributes
        'List_Classes.*.Name'=>'الاسم باللغة العربية',
        'List_Classes.*.Name_class_en'=>'الاسم باللغة الانجليزية',

        //this is message to Sections pages attributes
        'Name_Section_Ar'=>'الاسم باللغة العربية',
        'Name_Section_En'=>'الاسم باللغة الانجليزية',


        //this is message to Add Teachers Pages attributes
        'Name_ar'=>'الاسم باللغة العربية',
        'Specialization_id'=>'التخصص',
        'Gender_id'=>'الجنس',
        'Joining_Date'=>'تاريخ التعين',
        'Address'=>'العنوان',

        //this is message to Add Students Pages attributes
        'email' => 'عنوان البريد الالكتروني',
        'password' => 'كلمة السر',
        'name_ar' => 'الاسم باللغة العربية',
        'name_en' => 'الاسم باللغة الانجليزية',
        'nationalitie_id' => 'الجنسية',
        'Grade_id' => 'المرحلة الدراسية',
        'Classroom_id' => 'الصف الدراسي',
        'section_id' => 'القسم',
        'gender_id'=>'الجنس',
        'Date_Birth'=>'تاريخ الميلاد',
        'parent_id' => 'اسم الاب',
        'blood_id' => 'نوع فصيلة الدم',
        'academic_year' => 'تاريخ التسجيل',


        //this is message to Add Parents pages attributes
        'Email'=>'الايميل ',
        'Password'=>'كلمة السر ',

        'Name_Father'=>'اسم الاب باللغة العربية',
        'Name_Father_en'=>'اسم الاب باللغة الانجليزية',
        'Job_Father'=>'وظيفة الاب باللغة العربية',
        'Job_Father_en'=>'وظيفة الاب باللغة الانجليزية',
        'Nationality_Father_id'=>'جنسية الاب',
        'Blood_Type_Father_id'=>'فصيلة دم',
        'Religion_Father_id'=>'ديانة الاب',
        'Address_Father'=>'عنوان الاب',
        'National_ID_Father'=>'رقم الهوية',
        'Passport_ID_Father'=>'رقم جواز السفر',
        'Phone_Father'=>'رقم الهاتف',

        'Name_Mother'=>'اسم الام باللغة العربية',
        'Name_Mother_en'=>'اسم الام باللغة الانجليزية',
        'Job_Mother'=>'وظيفة الام باللغة العربية',
        'Job_Mother_en'=>'وظيفة الام باللغة الانجليزية',
        'Nationality_Mother_id'=>'جنسية الام',
        'Blood_Type_Mother_id'=>'فصيلة دم',
        'Religion_Mother_id'=>'ديانة الام',
        'Address_Mother'=>'عنوان الام',
        'National_ID_Mother'=>'رقم الهوية',
        'Passport_ID_Mother'=>'رقم جواز السفر',
        'Phone_Mother'=>'رقم الهاتف',


        //this is message to Add Fees pages attributes
        'title_ar'=>'اسم الاب باللغة العربية',
        'title_en'=>'اسم الاب باللغة الانجليزية',
        'amount'=>'المبلغ',
        'year'=>'السنة الدراسية',
        'Fees_type'=>'نوع الرسم الدراسي',


        //random message
        'teacher_id'=>'اسم المعلم',
        'term'=>'الفصل',
        'subject_id'=>'المادة الدراسية',


    ],

];
