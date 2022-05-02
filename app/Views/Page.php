<?php


namespace Edsp\Php\Views;


class Page extends AbstractView
{
    public function __construct()
    {
        $baseTemplatePagePath = 'public/html/BaseTemplatePage.html';
        //TODO: Implementar exceção

        parent::__construct($baseTemplatePagePath, self::FROM_FILE);
    }

    public function setTitle(string $title): void
    {
        $this->childs[0] = new View($title);
    }

    public function setContent(View $content): void
    {
        $this->childs[1] = $content;
    }

    public function getContent(): ?View
    {
        return $this->childs[1] ?? null;
    }

    public function mount(): Page
    {
        return parent::mount();
    }
}