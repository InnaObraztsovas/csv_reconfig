<?php

namespace App\Controller;

use App\Entity\CsvFile;
use App\Message\CsvMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

class CsvController extends AbstractController
{

    public function action(): mixed
    {
        $action = $this->generateUrl('csv_run');
        return $this->render('csv-form.html.twig', ['action' => $action]);
    }


    public function run(Request $request, MessageBusInterface $bus): Response
    {
        $entity = new CsvFile();
        $entity->setCsvFile($request->files->get('csv'));
        /** @var UploadedFile $csv */
        $csv = $entity->getCsvFile();
        $bus->dispatch(new CsvMessage($csv));

        return new Response(
            'Succeed',
            Response::HTTP_OK
        );
    }
}