<?php

namespace LTTools\Extension\Tools\Layout;

/**
 * Class Form
 * @author wanghouting
 * @package LTTools\Extension\Tools\Layout
 */
class Form extends  \Encore\Admin\Form {
    /**
     * Set view for form.
     *
     * @param string $view
     *
     * @return $this
     */
    public function setView($view)
    {
        $this->builder()->setView($view);

        return $this;
    }
}
