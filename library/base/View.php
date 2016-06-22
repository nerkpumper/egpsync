<?php

class View extends Response {

    protected $template;
    protected $master;
    protected $script = '';
    protected $vars = array();


    public function __construct($template, $vars = array(), $master = 'main',$script ='')
    {
        $this->template = $template;
        $this->vars = $vars;
        $this->master = $master;
        $this->script = $script;
    }    

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return array
     */
    public function getVars()
    {
        return $this->vars;
    }

    public function execute()
    {
        $template = $this->getTemplate();
        $vars = $this->getVars();
        $master = $this->master;
        $script = $this->script;

        call_user_func(function () use ($template, $vars,$master,$script) {
            extract($vars);

            ob_start();            
            
            //$template = str_replace('.', '/', $template);
            require "views/$template.view.php";

            $view_content = ob_get_clean();

            if($master=='')
                require 'views/masterpage/masterpage.none.view.php';
            else
                require "views/masterpage/masterpage.$master.view.php";
        });
    }

}