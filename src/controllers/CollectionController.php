<?php

use App\models\Set;
use App\Repository\SetRepository;

require_once 'AppController.php';
require_once __DIR__.'/../Models/Set.php';
require_once __DIR__.'/../Repository/SetRepository.php';

class CollectionController extends AppController
{

    public function addCollection()
    {
        session_start();

        $setRepo = new SetRepository();


        if (!$this->isPost()) {
            return $this->render('login-page', []);
        }

        $name = $_POST['name'];


        if (empty($name)) {
            return $this->render('create-set-page', ['message' => ['name']]);
        }
        $username = $_SESSION['username'];

        if (empty($username)) {
            return $this->render('login-page', ['message' => [$username]]);
        }

        $total = (float)$_POST['total'];

        if (empty($total)) {
            return $this->render('create-set-page', ['message' => ['total']]);
        }

        $cpu = $_POST['cpu'];
        $cpuPrice = (float)$_POST['cpuPrice'];
        if (empty($cpu) || empty($cpuPrice)) {
            return $this->render('create-set-page', ['message' => ['cpu']]);
        }

        $gpu = $_POST['gpu'];
        $gpuPrice = (float)$_POST['gpuPrice'];
        if (empty($gpu) || empty($gpuPrice)) {
            return $this->render('create-set-page', ['message' => ['gpu']]);
        }


        $motherboard = $_POST['motherboard'];
        $motherboardPrice = (float)$_POST['motherboardPrice'];
        if (empty($motherboard) || empty($motherboardPrice)) {
            return $this->render('create-set-page', ['message' => ['motherboard']]);
        }

        $ram = $_POST['ram'];
        $ramPrice = (float)$_POST['ramPrice'];
        if (empty($ram) || empty($ramPrice)) {
            return $this->render('create-set-page', ['message' => ['ram']]);
        }

        $storage = $_POST['storage'];
        $storagePrice = (float)$_POST['storagePrice'];
        if (empty($storage) || empty($storagePrice)) {
            return $this->render('create-set-page', ['message' => ['storage']]);
        }

        $cooler = $_POST['cooler'];
        $coolerPrice = (float)$_POST['coolerPrice'];

        if($coolerPrice == 0) {
            $tmpCoolerPrice = 100;
        }else{
            $tmpCoolerPrice = $coolerPrice;
        }

        if (empty($cooler) || empty($tmpCoolerPrice)) {
            return $this->render('create-set-page', ['message' => ['cooler']]);
        }


        $case = $_POST['case'];
        $casePrice = (float)$_POST['casePrice'];
        if (empty($case) || empty($casePrice)) {
            return $this->render('create-set-page', ['message' => ['case']]);
        }


        $psu = $_POST['psu'];
        $psuPrice = (float)$_POST['psuPrice'];

        if (empty($psu) || empty($psuPrice)) {
            return $this->render('create-set-page', ['message' => ['psu']]);
        }


        $notExists = $setRepo->addSet(
            new Set(
                $name,
                $username,
                $total,
                $cpu,
                $cpuPrice,
                $gpu,
                $gpuPrice,
                $motherboard,
                $motherboardPrice,
                $ram,
                $ramPrice,
                $storage,
                $storagePrice,
                $cooler,
                $coolerPrice,
                $case,
                $casePrice,
                $psu,
                $psuPrice,
                $_POST['preferences'],
                $_POST['priority'],
                $_POST['ramSize'],
                $_POST['storageSize']
            )
        );

        if (!$notExists) {
            return $this->render('create-set-page', ['message' => ['Zestaw o podanej nazwie już istnieje']]);
        } else {
            return $this->render('index-page', []);

        }


    }

    public function search()
    {
        session_start();

        $setRepo = new SetRepository();

        if (!$this->isPost()) {
            return $this->render('index-page', []);
        }

        $corePrice = $_POST['corePrice'];
        $varPrice = $_POST['varPrice'];

        $minPrice = (int)$corePrice - (int)$varPrice - 500;
        $maxPrice = (int)$corePrice + (int)$varPrice;

        $preferences = $_POST['preferences'];
        $priority = $_POST['priority'];
        $ramSize = $_POST['ramSize'];
        $storageSize = $_POST['storageSize'];

        $result = $setRepo->filterSets($minPrice, $maxPrice, $preferences, $priority, $ramSize, $storageSize);

        $this->render('output-page', ['result' => $result]);

    }


    public function filterUserSets() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            http_response_code(403); // Brak dostępu
            echo json_encode(['error' => 'User not logged in.']);
            exit;
        }
        $setRepo = new SetRepository();

        $contentTypes = $_SERVER['CONTENT_TYPE'] ?? '';

        if($contentTypes == 'application/json') {
            $content = trim(file_get_contents("php://input"));
            header('Content-type: application/json');
            http_response_code(200);
            $decoded = json_decode($content, true);
            echo json_encode($setRepo->getUserSetByTitle($decoded['search']));
        }

    }


    public function deleteSet()
    {
        session_start();

        if (!$this->isPost()) {
            return $this->render('login-page', []);
        }
        $setRepo = new SetRepository();
        $name = $_POST['setName'];
        $setRepo->deleteSet($name);

        $sets = $setRepo->getSets($_SESSION['user_id']);
        $this->render('my-account-page', ['result'=> $sets]);

    }


    public function editSet()
    {
        session_start();

        if (!$this->isPost()) {
            return $this->render('login-page', []);
        }
        $setRepo = new SetRepository();
        $name = $_POST['setName'];
        $set = $setRepo->getSet($name);
        $this->render('edit-set-page', ['set' => $set]);
    }

    public function updateSet()
    {
        session_start();
        $setRepo = new SetRepository();

        if (!$this->isPost()) {
            return $this->render('login-page', []);
        }

        $prevName = $_POST['prev-set-name'];
        $name = $_POST['set-name'];


        if (empty($name)) {
            return $this->render('create-set-page', ['message' => ['name']]);
        }
        $username = $_SESSION['username'];

        if (empty($username)) {
            return $this->render('login-page', ['message' => [$username]]);
        }

        $total = (float)$_POST['total-price'];

        if (empty($total)) {
            return $this->render('create-set-page', ['message' => ['total']]);
        }

        $cpu = $_POST['cpu-name'];
        $cpuPrice = (float)$_POST['cpu-price'];
        if (empty($cpu) || empty($cpuPrice)) {
            return $this->render('create-set-page', ['message' => ['cpu']]);
        }

        $gpu = $_POST['gpu-name'];
        $gpuPrice = (float)$_POST['gpu-price'];
        if (empty($gpu) || empty($gpuPrice)) {
            return $this->render('create-set-page', ['message' => ['gpu']]);
        }


        $motherboard = $_POST['motherboard-name'];
        $motherboardPrice = (float)$_POST['motherboard-price'];
        if (empty($motherboard) || empty($motherboardPrice)) {
            return $this->render('create-set-page', ['message' => ['motherboard']]);
        }

        $ram = $_POST['ram-name'];
        $ramPrice = (float)$_POST['ram-price'];
        if (empty($ram) || empty($ramPrice)) {
            return $this->render('create-set-page', ['message' => ['ram']]);
        }

        $storage = $_POST['storage-name'];
        $storagePrice = (float)$_POST['storage-price'];
        if (empty($storage) || empty($storagePrice)) {
            return $this->render('create-set-page', ['message' => ['storage']]);
        }

        $cooler = $_POST['cooler-name'];
        $coolerPrice = (float)$_POST['cooler-price'];

        if($coolerPrice == 0) {
            $tmpCoolerPrice = 100;
        }else{
            $tmpCoolerPrice = $coolerPrice;
        }


        if (empty($cooler) || empty($tmpCoolerPrice)) {
            return $this->render('create-set-page', ['message' => ['cooler']]);
        }


        $case = $_POST['case-name'];
        $casePrice = (float)$_POST['case-price'];
        if (empty($case) || empty($casePrice)) {
            return $this->render('create-set-page', ['message' => ['case']]);
        }


        $psu = $_POST['psu-name'];
        $psuPrice = (float)$_POST['psu-price'];

        if (empty($psu) || empty($psuPrice)) {
            return $this->render('create-set-page', ['message' => ['psu']]);
        }


        $notExists = $setRepo->editSet(
            $prevName,
            new Set(
                $name,
                $username,
                $total,
                $cpu,
                $cpuPrice,
                $gpu,
                $gpuPrice,
                $motherboard,
                $motherboardPrice,
                $ram,
                $ramPrice,
                $storage,
                $storagePrice,
                $cooler,
                $coolerPrice,
                $case,
                $casePrice,
                $psu,
                $psuPrice,
                $_POST['preferences'],
                $_POST['priority'],
                $_POST['ramSize'],
                $_POST['storageSize']
            )
        );

        if (!$notExists) {
            $set = $setRepo->getSet($prevName);
            return $this->render('edit-set-page', ['set' => $set]);
        } else {
            $result = $setRepo->getSets($_SESSION['user_id']);
            return $this->render('my-account-page', ['result'=> $result]);
        }


    }



    public function privateSearch()
    {

        $contentTypes = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';

        if($contentTypes == 'application/json') {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $corePrice = $decoded['corePrice'];
            $varPrice = $decoded['varPrice'];
            $preferences = $decoded['preferences'];
            $priority = $decoded['priority'];
            $ramSize = $decoded['ramSize'];
            $storageSize = $decoded['storageSize'];

            header('Content-type: application/json');
            http_response_code(200);

            $setRepo = new SetRepository();
            $minPrice = (int)$corePrice - (int)$varPrice - 500;
            $maxPrice = (int)$corePrice + (int)$varPrice;

            echo json_encode($setRepo->filterSets($minPrice, $maxPrice, $preferences, $priority, $ramSize, $storageSize));

        }


    }
}