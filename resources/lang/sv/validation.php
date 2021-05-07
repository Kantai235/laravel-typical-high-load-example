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

    'accepted' => ':attribute måste accepteras.',
    'active_url' => ':attribute är inte en giltig webbadress.',
    'after' => ':attribute måste vara ett datum efter den :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => ':attribute får endast innehålla bokstäver.',
    'alpha_dash' => ':attribute får endast innehålla bokstäver, siffror och bindestreck.',
    'alpha_num' => ':attribute får endast innehålla bokstäver och siffror.',
    'array' => ':attribute måste vara en array.',
    'before' => ':attribute måste vara ett datum innan den :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => ':attribute måste vara en siffra mellan :min och :max.',
        'file' => ':attribute måste vara mellan :min till :max kilobyte stor.',
        'string' => ':attribute måste innehålla :min till :max tecken.',
        'array' => ':attribute måste innehålla mellan :min - :max objekt.',
    ],
    'boolean' => ':attribute måste vara sant eller falskt',
    'confirmed' => ':attribute bekräftelsen matchar inte.',
    'date' => ':attribute är inte ett giltigt datum.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':attribute matchar inte formatet :format.',
    'different' => ':attribute och :other får inte vara lika.',
    'digits' => ':attribute måste vara minst :digits tecken.',
    'digits_between' => ':attribute måste vara mellan :min och :max tecken.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'Fältet :attribute måste innehålla en korrekt e-postadress.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'Det valda :attribute är ogiltigt.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'Fältet :attribute är obligatoriskt.',
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
    'image' => ':attribute måste vara en bild.',
    'in' => 'Det valda :attribute är ogiltigt.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => ':attribute måste vara en siffra.',
    'ip' => ':attribute måste vara en giltig IP-adress.',
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
        'numeric' => ':attribute får inte vara större än :max.',
        'file' => ':attribute får max vara :max kilobyte stor.',
        'string' => ':attribute får max innehålla :max tecken.',
        'array' => ':attribute får inte innehålla mer än :max objekt.',
    ],
    'mimes' => ':attribute måste vara en fil av typen: :values.',
    'min' => [
        'numeric' => ':attribute måste vara större än :min.',
        'file' => ':attribute måste vara minst :min kilobyte stor.',
        'string' => ':attribute måste innehålla minst :min tecken.',
        'array' => ':attribute måste innehålla minst :min objekt.',
    ],
    'not_in' => 'Det valda :attribute är ogiltigt.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute måste vara en siffra.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'Formatet för :attribute är ogiltigt.',
    'required' => 'Fältet :attribute är obligatoriskt.',
    'required_if' => 'Fältet :attribute är obligatoriskt då :other är :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'Fältet :attribute är obligatoriskt då :values är ifyllt.',
    'required_with_all' => 'Fältet :attribute är obligatoriskt när :values är ifyllt.',
    'required_without' => 'Fältet :attribute är obligatoriskt då :values ej är ifyllt.',
    'required_without_all' => 'Fältet :attribute är obligatoriskt när ingen av :values är ifyllt.',
    'same' => ':attribute och :other måste vara lika.',
    'size' => [
        'numeric' => ':attribute måste vara :size.',
        'file' => ':attribute får endast vara :size kilobyte stor.',
        'string' => ':attribute måste innehålla :size tecken.',
        'array' => ':attribute måste innehålla :size objekt.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => ':attribute måste vara en sträng.',
    'timezone' => ':attribute måste vara en giltig tidszon.',
    'unique' => ':attribute används redan.',
    'url' => 'Formatet :attribute är ogiltigt.',
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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],
];
