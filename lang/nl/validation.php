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

    'accepted' => 'De :attribute moet geaccepteerd worden.',
    'accepted_if' => 'De :attribute moet geaccepteerd worden wanneer :other :value is.',
    'active_url' => 'De :attribute is geen geldige URL.',
    'after' => 'De :attribute moet een datum zijn na :date.',
    'after_or_equal' => 'De :attribute moet een datum zijn na of gelijk aan :date.',
    'alpha' => 'De :attribute mag alleen letters bevatten.',
    'alpha_dash' => 'De :attribute mag alleen letters, nummers, streepjes en underscores bevatten.',
    'alpha_num' => 'De :attribute mag alleen letters en nummers bevatten.',
    'array' => 'De :attribute moet een array zijn.',
    'ascii' => 'De :attribute mag alleen ASCII-tekens bevatten.',
    'before' => 'De :attribute moet een datum zijn voor :date.',
    'before_or_equal' => 'De :attribute moet een datum zijn voor of gelijk aan :date.',
    'between' => [
        'array' => 'De :attribute moet tussen :min en :max items bevatten.',
        'file' => 'De :attribute moet tussen :min en :max kilobytes zijn.',
        'numeric' => 'De :attribute moet tussen :min en :max zijn.',
        'string' => 'De :attribute moet tussen :min en :max tekens zijn.',
    ],
    'boolean' => 'De :attribute veld moet waar of onwaar zijn.',
    'can' => 'De :attribute bevat een niet-toegestane waarde.',
    'confirmed' => 'De bevestiging van :attribute komt niet overeen.',
    'contains' => 'De :attribute mist een vereiste waarde.',
    'current_password' => 'Het wachtwoord is incorrect.',
    'date' => 'De :attribute is geen geldige datum.',
    'date_equals' => 'De :attribute moet een datum gelijk aan :date zijn.',
    'date_format' => 'De :attribute komt niet overeen met het formaat :format.',
    'decimal' => 'De :attribute moet :decimal decimalen hebben.',
    'declined' => 'De :attribute moet afgewezen worden.',
    'declined_if' => 'De :attribute moet afgewezen worden wanneer :other :value is.',
    'different' => 'De :attribute en :other moeten verschillend zijn.',
    'digits' => 'De :attribute moet :digits cijfers zijn.',
    'digits_between' => 'De :attribute moet tussen :min en :max cijfers zijn.',
    'dimensions' => 'De :attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => 'De :attribute veld heeft een dubbele waarde.',
    'doesnt_end_with' => 'De :attribute mag niet eindigen met een van de volgende: :values.',
    'doesnt_start_with' => 'De :attribute mag niet beginnen met een van de volgende: :values.',
    'email' => 'De :attribute moet een geldig e-mailadres zijn.',
    'ends_with' => 'De :attribute moet eindigen met een van de volgende: :values.',
    'enum' => 'De geselecteerde :attribute is ongeldig.',
    'exists' => 'De geselecteerde :attribute is ongeldig.',
    'extensions' => 'De :attribute moet een bestand zijn van het type: :values.',
    'file' => 'De :attribute moet een bestand zijn.',
    'filled' => 'De :attribute veld moet een waarde hebben.',
    'gt' => [
        'array' => 'De :attribute moet meer dan :value items hebben.',
        'file' => 'De :attribute moet groter zijn dan :value kilobytes.',
        'numeric' => 'De :attribute moet groter zijn dan :value.',
        'string' => 'De :attribute moet groter zijn dan :value tekens.',
    ],
    'gte' => [
        'array' => 'De :attribute moet :value items of meer hebben.',
        'file' => 'De :attribute moet groter zijn dan of gelijk aan :value kilobytes.',
        'numeric' => 'De :attribute moet groter zijn dan of gelijk aan :value.',
        'string' => 'De :attribute moet groter zijn dan of gelijk aan :value tekens.',
    ],
    'hex_color' => 'De :attribute moet een geldige hexadecimale kleur zijn.',
    'image' => 'De :attribute moet een afbeelding zijn.',
    'in' => 'De geselecteerde :attribute is ongeldig.',
    'in_array' => 'De :attribute veld bestaat niet in :other.',
    'integer' => 'De :attribute moet een geheel getal zijn.',
    'ip' => 'De :attribute moet een geldig IP-adres zijn.',
    'ipv4' => 'De :attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => 'De :attribute moet een geldig IPv6-adres zijn.',
    'json' => 'De :attribute moet een geldige JSON-string zijn.',
    'list' => 'De :attribute moet een lijst zijn.',
    'lowercase' => 'De :attribute moet in kleine letters zijn.',
    'lt' => [
        'array' => 'De :attribute moet minder dan :value items hebben.',
        'file' => 'De :attribute moet kleiner zijn dan :value kilobytes.',
        'numeric' => 'De :attribute moet kleiner zijn dan :value.',
        'string' => 'De :attribute moet kleiner zijn dan :value tekens.',
    ],
    'lte' => [
        'array' => 'De :attribute mag niet meer dan :value items hebben.',
        'file' => 'De :attribute moet kleiner zijn dan of gelijk aan :value kilobytes.',
        'numeric' => 'De :attribute moet kleiner zijn dan of gelijk aan :value.',
        'string' => 'De :attribute moet kleiner zijn dan of gelijk aan :value tekens.',
    ],
    'mac_address' => 'De :attribute moet een geldig MAC-adres zijn.',
    'max' => [
        'array' => 'De :attribute mag niet meer dan :max items hebben.',
        'file' => 'De :attribute mag niet groter zijn dan :max kilobytes.',
        'numeric' => 'De :attribute mag niet groter zijn dan :max.',
        'string' => 'De :attribute mag niet groter zijn dan :max tekens.',
    ],
    'max_digits' => 'De :attribute mag niet meer dan :max cijfers hebben.',
    'mimes' => 'De :attribute moet een bestand zijn van het type: :values.',
    'mimetypes' => 'De :attribute moet een bestand zijn van het type: :values.',
    'min' => [
        'array' => 'De :attribute moet minimaal :min items hebben.',
        'file' => 'De :attribute moet minimaal :min kilobytes zijn.',
        'numeric' => 'De :attribute moet minimaal :min zijn.',
        'string' => 'De :attribute moet minimaal :min tekens zijn.',
    ],
    'min_digits' => 'De :attribute moet minimaal :min cijfers hebben.',
    'missing' => 'De :attribute moet ontbreken.',
    'missing_if' => 'De :attribute moet ontbreken wanneer :other :value is.',
    'missing_unless' => 'De :attribute moet ontbreken tenzij :other :value is.',
    'missing_with' => 'De :attribute moet ontbreken wanneer :values aanwezig is.',
    'missing_with_all' => 'De :attribute moet ontbreken wanneer :values aanwezig zijn.',
    'multiple_of' => 'De :attribute moet een veelvoud van :value zijn.',
    'not_in' => 'De geselecteerde :attribute is ongeldig.',
    'not_regex' => 'De :attribute formaat is ongeldig.',
    'numeric' => 'De :attribute moet een nummer zijn.',
    'password' => [
        'letters' => 'De :attribute moet ten minste één letter bevatten.',
        'mixed' => 'De :attribute moet ten minste één hoofdletter en één kleine letter bevatten.',
        'numbers' => 'De :attribute moet ten minste één nummer bevatten.',
        'symbols' => 'De :attribute moet ten minste één symbool bevatten.',
        'uncompromised' => 'De opgegeven :attribute is verschenen in een gegevenslek. Kies een ander :attribute.',
    ],
    'present' => 'De :attribute veld moet aanwezig zijn.',
    'present_if' => 'De :attribute veld moet aanwezig zijn wanneer :other :value is.',
    'present_unless' => 'De :attribute veld moet aanwezig zijn tenzij :other :value is.',
    'present_with' => 'De :attribute veld moet aanwezig zijn wanneer :values aanwezig is.',
    'present_with_all' => 'De :attribute veld moet aanwezig zijn wanneer :values aanwezig zijn.',
    'prohibited' => 'De :attribute veld is verboden.',
    'prohibited_if' => 'De :attribute veld is verboden wanneer :other :value is.',
    'prohibited_unless' => 'De :attribute veld is verboden tenzij :other in :values is.',
    'prohibits' => 'De :attribute veld verbiedt :other aanwezig te zijn.',
    'regex' => 'De :attribute formaat is ongeldig.',
    'required' => 'De :attribute veld is verplicht.',
    'required_array_keys' => 'De :attribute veld moet vermeldingen bevatten voor: :values.',
    'required_if' => 'De :attribute veld is verplicht wanneer :other :value is.',
    'required_if_accepted' => 'De :attribute veld is verplicht wanneer :other geaccepteerd is.',
    'required_if_declined' => 'De :attribute veld is verplicht wanneer :other afgewezen is.',
    'required_unless' => 'De :attribute veld is verplicht tenzij :other in :values is.',
    'required_with' => 'De :attribute veld is verplicht wanneer :values aanwezig is.',
    'required_with_all' => 'De :attribute veld is verplicht wanneer :values aanwezig zijn.',
    'required_without' => 'De :attribute veld is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => 'De :attribute veld is verplicht wanneer geen van :values aanwezig zijn.',
    'same' => 'De :attribute en :other moeten overeenkomen.',
    'size' => [
        'array' => 'De :attribute moet :size items bevatten.',
        'file' => 'De :attribute moet :size kilobytes zijn.',
        'numeric' => 'De :attribute moet :size zijn.',
        'string' => 'De :attribute moet :size tekens zijn.',
    ],
    'starts_with' => 'De :attribute moet beginnen met een van de volgende: :values.',
    'string' => 'De :attribute moet een string zijn.',
    'timezone' => 'De :attribute moet een geldige tijdzone zijn.',
    'unique' => 'De :attribute is al in gebruik.',
    'uploaded' => 'De :attribute uploaden is mislukt.',
    'uppercase' => 'De :attribute moet in hoofdletters zijn.',
    'url' => 'De :attribute moet een geldige URL zijn.',
    'ulid' => 'De :attribute moet een geldige ULID zijn.',
    'uuid' => 'De :attribute moet een geldige UUID zijn.',

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
            'rule-name' => 'aangepast-bericht',
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
        'name' => 'naam',
        'description' => 'beschrijving',
        'duedate' => 'vervaldatum',
        'student_id' => 'student',
        'schoolclass_id' => 'schoolklas',
        'schoolyear_id' => 'schooljaar',
        'status_id' => 'status',
        'studentNr' => 'studentnummer',
        'enrolment_date' => 'inschrijvingsdatum',
        'period' => 'periode',
        'course_id' => 'cursus',
        'module_id' => 'module',
        'assignment_id' => 'opdracht',
    ],

];
