<?php


namespace Edsp\Php\Views;


interface IView
{
    public function render(): void;

    public function toString(): string;
}