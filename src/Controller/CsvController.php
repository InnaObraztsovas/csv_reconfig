<?php

namespace App\Controller;

use App\Entity\CsvFile;
use App\FilePath;
use App\Message\ProcessFile;
use App\Message\CsvMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CsvController extends AbstractController
{

    public function action(): mixed
    {
        $action = $this->generateUrl('csv_run');
        return $this->render('csv-form.html.twig', ['action' => $action]);
    }


    public function run(Request $request, ValidatorInterface $validator, MessageBusInterface $bus): Response
    {
        $entity = new CsvFile();
        $entity->setCsvFile($request->files->get('csv'));
        $violations = $validator->validate($entity);

        if ($violations->count() > 0) {
            return new Response(
                (string) $violations,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        /** @var UploadedFile $csv */
        $csv = $entity->getCsvFile();
        $filepath = FilePath::path();

        if(!move_uploaded_file($csv->getRealPath(), $filepath)) {
            return new Response(
                'Unable to save file',
                Response::HTTP_BAD_REQUEST
            );
        }

        $bus->dispatch(new ProcessFile($filepath));

        return new Response(
            'Succeed',
            Response::HTTP_OK
        );
    }
}