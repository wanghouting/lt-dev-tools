<?php


namespace LTUpdate\Extension\Tools\Form\Field;



use LTUpdate\Extension\Tools\Form\Field;

class IHidden extends Field
{
    public function __construct($column, $arguments = [])
    {
        parent::__construct($column, $arguments);
        $this->setView('admin::form.hidden');
    }
}