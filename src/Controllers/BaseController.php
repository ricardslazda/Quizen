<?php


namespace Quiz\Controllers;


abstract class BaseController
{
    protected $template = 'default';
    protected $viewDir;
    protected function json(array $data){
        echo json_encode($data);
    }
    protected function view(string $name, array $data = [], bool $useTemplate = true){
        $fileName = $this->getViewFile($name);
        $content = $this->getViewContent($fileName, $data);

        if($useTemplate) {
            $templateName = $this->getTemplateFile();
            $templateContent = $this->getViewContent($templateName, ['content' => $content]);
            echo $templateContent;
        } else {
            echo $content;
        }
    }

    protected function getViewContent(string $fileName, array $variables = []) : string
    {
        extract($variables);
        ob_start();
        include "$fileName";
        $output = ob_get_clean();
        return $output;
    }

    protected function getViewFile(string $name)
    {
        return VIEW_BASE_DIR . '/' . $name . '.php';
    }

    private function getTemplateFile()
    {
        return TEMPLATE_BASE_DIR . '/' . $this->template . '.php';
    }
}