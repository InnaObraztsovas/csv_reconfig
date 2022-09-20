<?php

namespace App\Controller;

use App\Entity\CsvFile;
use App\ExportFile;
use App\FileInput;
use App\FileProcessing;
use App\Message\CsvMessage;
use App\FilePath;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\MessageBusInterface;

class CsvController extends AbstractController
{

    public function __construct(public FileProcessing $fileProcessing)
    {}

    public function action()
    {
        $action = $this->generateUrl('csv_run');
        return $this->render('csv-form.html.twig', ['action' => $action]);
    }


    public function run(Request $request, MessageBusInterface $bus)
    {
        $entity = new CsvFile();
        $entity->setCsvFile($request->files->get('csv'));
        $fileName = $entity->getCsvFile();
        $bus->dispatch(new CsvMessage($fileName));
        return new Response(
            'Succeed',
            Response::HTTP_OK
        );
    }
}