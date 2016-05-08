
 <?php
 
return [
 
    'theme' => 'bootstrap',
 
    'control_access' => true,
 
    'translate_texts' => true,
 
    'novalidate' => false,
 
    'abbreviations' => [
        'ph' => 'placeholder',
        'max' => 'maxlength',
        'tpl' => 'template'
    ],
 
    'themes' => [
 
        'bootstrap' => [
 
            'field_templates' => [
                // type => template
                'checkbox' => 'checkbox',
                'checkboxes' => 'collections',
                'radios' => 'collections'
            ],
 
            'field_classes' => [
                // type => class or classes
                'default' => 'form-control',
                'checkbox' => '',
                'error' => 'input-with-feedback'
            ],
        ]
    ]
 
];