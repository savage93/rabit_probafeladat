<?php

namespace Rabit\App\View;

/**
 * This class generates the HTML code to be shown on the user list page.
 */
class UserView extends View
{
    public function __invoke(): void
    {
        new Header($this->title);
        echo "\t\t<h3>$this->title</h3>\n";
        echo "\t\t<ul>\n";

        foreach ($this->items as $item) {
            echo "\t\t\t<li>".$item->getName()."</li>\n";
        }

        echo "\t\t</ul>\n";
        new Footer();
    }
}
