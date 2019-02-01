<?php
    //requires Smarty class
    class VideoSmarty extends Smarty
    {
        public function __construct($path)
        {
            parent::__construct();
            $this
                ->setTemplateDir("$path/templates/")
                ->setCompileDir("$path/templates_c/")
                ->setConfigDir("$path/configs/")
                ->setCacheDir("$path/cache/");
        }
    }
