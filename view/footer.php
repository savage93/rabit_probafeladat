<?php

namespace Rabit\App\View;

class Footer
{
    private string $html =
    <<<FOOTER
        </body>
    </html>
    FOOTER;

    public function __construct()
    {
        echo $this->html;
    }
}
