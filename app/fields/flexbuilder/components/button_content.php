<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$button_content = new FieldsBuilder('button_content');
$button_content
    ->addLink('button_link', ['label' => __('Button link', 'sage')]);

return $button_content;
