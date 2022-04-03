<?php

namespace Rabit\App\Controller;

/**
 * Controller class for the advertisement listing page.
 */
class AdvertisementController extends Controller
{
    /**
     * render
     * Passes the advertisements' data from the model to the view,
     * then displays the rendered view.
     */
    public function render(): void
    {
        $view = new \Rabit\App\View\AdvertisementView(
            'Advertisements',
            $this->model->getAdvertisements()
        );
        $view();
    }
}
