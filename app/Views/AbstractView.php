<?php


namespace Edsp\Php\Views;


use Edsp\Php\Exceptions\ServerSideException;

abstract class AbstractView implements IView
{
    protected ?View $parent;
    protected array $childs;
    protected string $html;
    protected string $mountedHtml;

    public const FROM_STRING = 0;
    public const FROM_FILE = 1;

    /**
     * @throws ServerSideException
     */
    protected function __construct(string $str, int $instanceMode = self::FROM_STRING)
    {
        $html = $str;
        if ($instanceMode === self::FROM_FILE) {
            $path = projectPath() . $str;
            if (!file_exists($path))
                throw new ServerSideException("Não foi possível encontrar o arquivo '$path'");

            $html = file_get_contents($path);
        }

        $this->parent = null;
        $this->childs = [];
        $this->setHtml($html);
    }

    protected function setHtml(string $html): void
    {
        $this->html = $html;
    }

    protected function addChild(View $child): self
    {
        $this->childs[] = $child;
        return $this;
    }

    protected function mount(): self
    {
        $this->mountedHtml = $this->html;

        $replace = fn(?int $i, string $replace, bool $replaceAll = false)
        => (string)preg_replace(
            pattern: '/@\[' . ($i ?? '\d+') . ']/',
            replacement: $replace,
            subject: $this->mountedHtml,
            limit: $replaceAll ? -1 : 1
        );

        /**
         * @var View $child
         */
        foreach ($this->childs as $i => $child)
            $this->mountedHtml = $replace($i, $child->toString(), true);

        $this->mountedHtml = $replace(null, '', true);

        return $this;
    }

    public function render(): void
    {
        echo $this->toString();
    }

    public function toString(): string
    {
        $this->mount();
        return $this->mountedHtml;
    }
}