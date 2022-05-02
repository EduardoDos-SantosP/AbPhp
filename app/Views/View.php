<?php


namespace Edsp\Php\Views;


use Edsp\Php\Exceptions\ServerSideException;

class View extends AbstractView
{
    public function __construct(string $str, int $instanceMode = self::FROM_STRING)
    {
        parent::__construct($str, $instanceMode);
    }

    public function addChild(View $child): self
    {
        return parent::addChild($child);
    }

    public function mount(): self
    {
        return parent::mount();
    }

    public function render(): void
    {
        parent::render();
    }

    public function toString(): string
    {
        return parent::toString();
    }
}