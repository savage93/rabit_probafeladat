<?php

namespace Rabit\App;

// Class autoloader
spl_autoload_register(function ($class) {
    $prefix = 'Rabit\\App\\';
    if (strncmp($prefix, $class, 9) !== 0) {
        return;
    }
    $relative_class = substr($class, 9);
    $file = __DIR__.str_replace('\\', '/', $relative_class).'.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Routing based on 'page' GET parameter
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'users': // user list requested
            $controller = new Controller\UserController(new Model\UserModel());
            $controller->render();
            break;
        case 'advertisements': // advertisement list requested
            $controller = new Controller\AdvertisementController(new Model\AdvertisementModel());
            $controller->render();
            break;
        default: // invalid URL requested, redirecting to index page
            $index = new IndexPage();
            $index->render();
    }
} else { // no page parameter received, rendering index page
    $index = new IndexPage();
    $index->render();
}

class IndexPage
{
    /**
     * @var string title
     *             The title of the page
     */
    private string $title = 'Index';

    /**
     * render
     * Builds the HTML code of the webpage and sends it to the user's browser.
     */
    public function render(): void
    {
        new View\Header($this->title);
        echo "\t\t".'<h3>Welcome to the index page!</h3>'."\n";
        new View\Footer();
    }
}
