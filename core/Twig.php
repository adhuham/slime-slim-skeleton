<?php

namespace Core;

class Twig
{
    public $twig;

    public function __construct()
    {
        $viewPath = resource_path() . '/views';

        $loader = new \Twig\Loader\FilesystemLoader($viewPath);
        $twig = new \Twig\Environment($loader);

        $this->twig = $twig;
    }
}
