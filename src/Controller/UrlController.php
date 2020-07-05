<?php


namespace App\Controller;

use App\Service\UrlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UrlController extends AbstractController
{
    /**
     * @Route("/api/urls", methods={"POST"})
     * @param Request $request
     * @param UrlService $urlService
     * @return JsonResponse
     */
    public function postUrls(Request $request, UrlService $urlService)
    {
        $response = new JsonResponse();

        if (!$request->get('urls') || empty($request->get('urls'))) {
            $response->setStatusCode(400);
            return $response;
        }

        $processed = false;
        foreach ($request->get('urls') as $url) {
            if (is_string($url)) {
                $processed = $urlService->processEntity($url);
            }
        }

        return $processed ? $response->setStatusCode(201) : $response->setStatusCode(200);
    }
}