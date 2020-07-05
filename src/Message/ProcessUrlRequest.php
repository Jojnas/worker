<?php


namespace App\Message;


class ProcessUrlRequest
{
    private $item;

    public function __construct(string $item)
    {
        $this->item = $item;
    }

    public function getItem(): string
    {
        return $this->item;
    }
}