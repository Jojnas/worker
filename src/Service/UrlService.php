<?php


namespace App\Service;


use App\Entity\UrlCheck;
use App\Message\ProcessUrlRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class UrlService
{
    private $em;
    private $bus;

    public function __construct(EntityManagerInterface $em, MessageBusInterface $bus)
    {
        $this->em = $em;
        $this->bus = $bus;
    }

    public function processEntity(string $url): bool
    {
        $existingEntity = $this->em->getRepository(UrlCheck::class)->findBy(['url' => $url]);
        if (!empty($existingEntity)) {
            return false;
        }

        $urlEntity = $this->em->getRepository(UrlCheck::class)->createNew();
        $urlEntity->setUrl($url);
        $this->em->persist($urlEntity);
        $this->em->flush();
        $this->bus->dispatch(new ProcessUrlRequest($urlEntity->getId()));
        return true;
    }
}