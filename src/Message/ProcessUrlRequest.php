<?php


namespace App\Message;


class ProcessUrlRequest
{
    private $urlId;

    public function __construct(int $urlId)
    {
        $this->urlId = $urlId;
    }

    public function getUrlId(): int
    {
        return $this->urlId;
    }
}