<?php

namespace Rabit\App\Controller;

/**
 * Controller class for the user listing page.
 */
class UserController extends Controller
{
    /**
     * render
     * Passes the users' data from the model to the view,
     * then displays the rendered view.
     */
    public function render(): void
    {
        $view = new \Rabit\App\View\UserView('Users', $this->model->getUsers());
        $view();
    }
}
