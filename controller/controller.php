<?php

namespace Rabit\App\Controller;

/**
 * The base controller class.
 */
abstract class Controller
{
    /**
     * @var Database model
     *               Model instance used for data exchange with the database
     */
    protected \Rabit\App\Model\Database $model;

    public function __construct(\Rabit\App\Model\Database $model)
    {
        $this->model = $model;
    }

    /**
     * render
     * This function passes data to the related view and sends the rendered
     * webpage to the user's browser. Must be overriden in derived classes.
     *
     * @return void
     */
    abstract public function render();
}
