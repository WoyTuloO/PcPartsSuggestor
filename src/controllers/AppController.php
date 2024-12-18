<?php

class AppController{
    protected function render(string $template = null, array $variables = []){
        $templatePath = 'public/views/'.$template.'.php';
        $page = "file not found";
        if(file_exists($templatePath)){
            extract($variables);

            ob_start();
            include $templatePath;
            $page = ob_get_clean();
        }
        print $page;
    }

    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

}