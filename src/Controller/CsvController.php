<?php

namespace App\Controller;

use App\ExportFile;
use App\FileInput;
use App\FileProcessing;
use App\Message\CsvMessage;
use App\SaveFile;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\MessageBusInterface;

class CsvController
{
    public FileProcessing $fileProcessing;

    public function __construct()
    {
        $this->fileProcessing = new FileProcessing();
    }

    public function run()
    {

        if (isset($_POST['import']) & ($_FILES['csv']['size'] > 0)) {
            $fileName = $_FILES['csv']['tmp_name'];
            $csv = FileInput::read($fileName);
            $bus = new MessageBus();
            $bus->dispatch(new CsvMessage(json_encode($csv)));
//            $bus->dispatch(new CsvMessage('Look! I created a message!'));
//            $bus->dispatch(new CsvMessage($csv->getCsv()));
            $data = $this->fileProcessing->reconfig($csv);
            $file = SaveFile::save($data);
            ExportFile::download($file);
            ExportFile::delete($file);
        }
        else{
            throw new \Exception('Please upload the CSV file');
        }

    }

}