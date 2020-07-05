<?php


namespace App\MessageHandler;


use App\Message\ProcessUrlRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class ProcessUrlRequestHandler implements MessageHandlerInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(ProcessUrlRequest $message)
    {

    }
}