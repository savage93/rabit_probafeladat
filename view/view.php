<?php

namespace Rabit\App\View;

/**
 * The base view class.
 */
abstract class View
{
    /**
     * @var string title
     *             This property holds the title of the page
     */
    protected string $title;
    /**
     * @var array items
     *            This array holds the items to show in the listing
     */
    protected array $items;

    public function __construct(string $title, array $items)
    {
        $this->title = $title;
        $this->items = $items;
    }

    abstract public function __invoke();
}
