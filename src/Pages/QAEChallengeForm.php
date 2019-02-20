<?php

namespace Pages;

class QAEChallengeForm extends BasePageObject
{
    /**
     * @var array
     */
    protected $elements = [
        'email' => 'input#tfa_1',
        'errors.email' => 'div#tfa_1-E',

        # Food Options
        'option.Bread' => 'input#tfa_6',
        'option.Cheese' => 'input#tfa_5',
        'option.Veggies' => 'input#tfa_7',

        # Food Sections
        'section.Bread' => 'fieldset#tfa_14',
        'section.Cheese' => 'fieldset#tfa_8',
        'section.Veggies' => 'fieldset#tfa_19',

        # Cheese Options
        'option.Cheese.Chedder' => 'input#tfa_10',
        'option.Cheese.Swiss' => 'input#tfa_11',
        'option.Cheese.Brie' => 'input#tfa_12',

        # Bread Options
        'option.Bread.Rye' => 'input#tfa_16',
        'option.Bread.Almond Flour' => 'input#tfa_17',
        'option.Bread.Something else' => 'input#tfa_18',

        # Veggies Options
        'option.Veggies.multiple' => 'select#tfa_20',
    ];

}