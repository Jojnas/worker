<?php


namespace App\MessageHandler;


use App\Entity\UrlCheck;
use App\Message\ProcessUrlRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProcessUrlRequestHandler implements MessageHandlerInterface
{
    private $em;
    private $client;

    public function __construct(EntityManagerInterface $em, HttpClientInterface $client)
    {
        $this->em = $em;
        $this->client = $client;
    }

    public function __invoke(ProcessUrlRequest $message)
    {
        sleep(10);
        $urlEntity = $this->em->getRepository(UrlCheck::class)->find($message->getUrlId());
        $urlEntity->setStatus(UrlCheck::PROCESSING_STATUS);
        $this->em->persist($urlEntity);
        $this->em->flush();

        try {
            $response = $this->client->request(
                'GET',
                $urlEntity->getUrl()
            );
            $urlEntity->setStatus(UrlCheck::DONE_STATUS);
            $urlEntity->setHttpCode($response->getStatusCode());

        } catch (\Exception $exception) {
            $urlEntity->setStatus(UrlCheck::ERROR_STATUS);
            $urlEntity->setHttpCode(500);
        }

        $this->em->persist($urlEntity);
        $this->em->flush();


    }
}