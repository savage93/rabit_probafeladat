<?php

namespace Rabit\App\View;

class Header
{
    private function getHeader(string $title)
    {
        return
        <<<HEAD
        <!DOCTYPE html>
        <html>
            <head>
                <title>$title</title>
                <link rel="stylesheet" href="css/style.css" />
            </head>
            <body>
                <div class="menuContainer">
                    <a href="/">Index</a>
                    <a href="/users">Users</a>
                    <a href="/advertisements">Advertisements</a>
                </div>
        \n
        HEAD;
    }

    public function __construct(string $title)
    {
        echo $this->getHeader($title);
    }
}
