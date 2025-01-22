<?php

namespace App\Repository;

use App\models\Set;
use Repository;


class SetRepository extends Repository
{
    public function addCpu(string $cpuName, float $cpuPrice): int{

        $stmt = $this->pdo->prepare('SELECT * FROM cpus WHERE name = :cpuName');
        $stmt->bindParam(':cpuName', $cpuName);
        $stmt->execute();
        $tmpCpu = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpCpu){

            $cpuId = $tmpCpu['id'];
            $stmt = $this->pdo->prepare('UPDATE cpus SET price = :price WHERE name = :name');
            $stmt->bindParam(':name', $cpuName);
            $stmt->bindParam(':price', $cpuPrice, \PDO::PARAM_INT);
            $stmt->execute();

            return $cpuId;
        }

        $stmt = $this->pdo->prepare('INSERT INTO cpus (name, price) VALUES (:name, :price)');
        $stmt->bindParam(':name', $cpuName);
        $stmt->bindParam(':price', $cpuPrice, \PDO::PARAM_INT);
        $stmt->execute();

        return (int)$this->pdo->lastInsertId();

    }

    public function addGpu(string $gpuName, int $gpuPrice): int{

        $stmt = $this->pdo->prepare('SELECT * FROM gpus WHERE name = :name');
        $stmt->bindParam(':name', $gpuName);
        $stmt->execute();
        $tmpGpu = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpGpu){
            $gpuId = $tmpGpu['id'];
            $stmt = $this->pdo->prepare('UPDATE gpus SET price = :price WHERE name = :name');
            $stmt->bindParam(':name', $gpuName);
            $stmt->bindParam(':price', $gpuPrice, \PDO::PARAM_INT);
            $stmt->execute();

            return $gpuId;

        }

        $stmt = $this->pdo->prepare('INSERT INTO gpus (name, price) VALUES (:name, :price)');
        $stmt->bindParam(':name', $gpuName);
        $stmt->bindParam(':price', $gpuPrice, \PDO::PARAM_INT);
        $stmt->execute();

        return (int)$this->pdo->lastInsertId();
    }


    public function addMotherboard(string $motherboardName, int $motherboardPrice): int{

        $stmt = $this->pdo->prepare('SELECT * FROM motherboards WHERE name = :name');
        $stmt->bindParam(':name', $motherboardName);
        $stmt->execute();
        $tmpMotherboard = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpMotherboard){
            $moboId = $tmpMotherboard['id'];
            $stmt = $this->pdo->prepare('UPDATE motherboards SET price = :price WHERE name = :name');
            $stmt->bindParam(':name', $motherboardName);
            $stmt->bindParam(':price', $motherboardPrice, \PDO::PARAM_INT);
            $stmt->execute();

            return $moboId;


        }

        $stmt = $this->pdo->prepare('INSERT INTO motherboards (name, price) VALUES (:name, :price)');
        $stmt->bindParam(':name', $motherboardName);
        $stmt->bindParam(':price', $motherboardPrice, \PDO::PARAM_INT);
        $stmt->execute();

        return (int)$this->pdo->lastInsertId();
    }

    public function addRam(string $ramName, int $ramPrice): int{

        $stmt = $this->pdo->prepare('SELECT * FROM rams WHERE name = :name');
        $stmt->bindParam(':name', $ramName);
        $stmt->execute();
        $tmpRam = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpRam){

            $ramId = $tmpRam['id'];
            $stmt = $this->pdo->prepare('UPDATE rams SET price = :price WHERE name = :name');
            $stmt->bindParam(':name', $ramName);
            $stmt->bindParam(':price', $ramPrice, \PDO::PARAM_INT);
            $stmt->execute();

            return $ramId;

        }

        $stmt = $this->pdo->prepare('INSERT INTO rams (name, price) VALUES (:name, :price)');
        $stmt->bindParam(':name', $ramName);
        $stmt->bindParam(':price', $ramPrice, \PDO::PARAM_INT);
        $stmt->execute();

        return (int)$this->pdo->lastInsertId();
    }

    public function addStorage(string $storageName, int $storagePrice): int{

        $stmt = $this->pdo->prepare('SELECT * FROM storages WHERE name = :name');
        $stmt->bindParam(':name', $storageName);
        $stmt->execute();
        $tmpStorage = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpStorage){

            $storageId = $tmpStorage['id'];
            $stmt = $this->pdo->prepare('UPDATE storages SET price = :price WHERE name = :name');
            $stmt->bindParam(':name', $storageName);
            $stmt->bindParam(':price', $storagePrice, \PDO::PARAM_INT);
            $stmt->execute();

            return $storageId;

        }

        $stmt = $this->pdo->prepare('INSERT INTO storages (name, price) VALUES (:name, :price)');
        $stmt->bindParam(':name', $storageName);
        $stmt->bindParam(':price', $storagePrice, \PDO::PARAM_INT);
        $stmt->execute();

        return (int)$this->pdo->lastInsertId();
    }

    public function addCooler(string $coolerName, int $coolerPrice): int{

        $stmt = $this->pdo->prepare('SELECT * FROM coolers WHERE name = :name');
        $stmt->bindParam(':name', $coolerName);
        $stmt->execute();
        $tmpCooler = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpCooler){

            $coolerId = $tmpCooler['id'];
            $stmt = $this->pdo->prepare('UPDATE coolers SET price = :price WHERE name = :name');
            $stmt->bindParam(':name', $coolerName);
            $stmt->bindParam(':price', $coolerPrice, \PDO::PARAM_INT);
            $stmt->execute();

            return $coolerId;

        }

        $stmt = $this->pdo->prepare('INSERT INTO coolers (name, price) VALUES (:name, :price)');
        $stmt->bindParam(':name', $coolerName);
        $stmt->bindParam(':price', $coolerPrice, \PDO::PARAM_INT);
        $stmt->execute();

        return (int)$this->pdo->lastInsertId();
    }

    public function addCase(string $caseName, int $casePrice): int{

        $stmt = $this->pdo->prepare('SELECT * FROM cases WHERE name = :name');
        $stmt->bindParam(':name', $caseName);
        $stmt->execute();
        $tmpCase = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpCase){

            $caseId = $tmpCase['id'];
            $stmt = $this->pdo->prepare('UPDATE cases SET price = :price WHERE name = :name');
            $stmt->bindParam(':name', $caseName);
            $stmt->bindParam(':price', $casePrice, \PDO::PARAM_INT);
            $stmt->execute();

            return $caseId;

        }

        $stmt = $this->pdo->prepare('INSERT INTO cases (name, price) VALUES (:name, :price)');
        $stmt->bindParam(':name', $caseName);
        $stmt->bindParam(':price', $casePrice, \PDO::PARAM_INT);
        $stmt->execute();

        return (int)$this->pdo->lastInsertId();
    }

    public function addPsu(string $psuName, int $psuPrice): int{

        $stmt = $this->pdo->prepare('SELECT * FROM psus WHERE name = :name');
        $stmt->bindParam(':name', $psuName);
        $stmt->execute();
        $tmpPsu = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpPsu){
            $psuId = $tmpPsu['id'];
            $stmt = $this->pdo->prepare('UPDATE psus SET price = :price WHERE name = :name');
            $stmt->bindParam(':name', $psuName);
            $stmt->bindParam(':price', $psuPrice, \PDO::PARAM_INT);
            $stmt->execute();

            return $psuId;
        }

        $stmt = $this->pdo->prepare('INSERT INTO psus (name, price) VALUES (:name, :price)');
        $stmt->bindParam(':name', $psuName);
        $stmt->bindParam(':price', $psuPrice, \PDO::PARAM_INT);
        $stmt->execute();

        return (int)$this->pdo->lastInsertId();
    }





    public function isThereComponentsSet(int $cpuId, int $gpuId, int $moboId, int $ramId, int $storageId, int $coolerId, int $caseId, int $psuId): ?int
    {
        $stmt = $this->pdo->prepare('SELECT * FROM set_components WHERE cpu_id = :cpu_id AND gpu_id = :gpu_id AND motherboard_id = :motherboard_id AND ram_id = :ram_id AND storage_id = :storage_id AND cooler_id = :cooler_id AND case_id = :case_id AND psu_id = :psu_id');
        $stmt->bindParam(':cpu_id', $cpuId, \PDO::PARAM_INT);
        $stmt->bindParam(':gpu_id', $gpuId, \PDO::PARAM_INT);
        $stmt->bindParam(':motherboard_id', $moboId, \PDO::PARAM_INT);
        $stmt->bindParam(':ram_id', $ramId, \PDO::PARAM_INT);
        $stmt->bindParam(':storage_id', $storageId, \PDO::PARAM_INT);
        $stmt->bindParam(':cooler_id', $coolerId, \PDO::PARAM_INT);
        $stmt->bindParam(':case_id', $caseId, \PDO::PARAM_INT);
        $stmt->bindParam(':psu_id', $psuId, \PDO::PARAM_INT);
        $stmt->execute();

        $set = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($set){
            return (int)$set[1];
        }

        return false;
    }

    public function addSet(Set $set): bool
    {


        $cpuId = $this->addCpu($set->getCpu(), $set->getCpuPrice());
        $gpuId = $this->addGpu($set->getGpu(), $set->getGpuPrice());
        $motherboardId = $this->addMotherboard($set->getMotherboard(), $set->getMotherboardPrice());
        $ramId = $this->addRam($set->getRam(), $set->getRamPrice());
        $storageId = $this->addStorage($set->getStorage(), $set->getStoragePrice());
        $coolerId = $this->addCooler($set->getCooler(), $set->getCoolerPrice());
        $caseId = $this->addCase($set->getCase(), $set->getCasePrice());
        $psuId = $this->addPsu($set->getPsu(), $set->getPsuPrice());

        $componentsId = $this->isThereComponentsSet($cpuId, $gpuId, $motherboardId, $ramId, $storageId, $coolerId, $caseId, $psuId);

        if(!$componentsId){
            $stmt = $this->pdo->prepare('INSERT INTO set_components (cpu_id, gpu_id, motherboard_id, ram_id, storage_id, cooler_id, case_id, psu_id) VALUES (:cpu_id, :gpu_id, :motherboard_id, :ram_id, :storage_id, :cooler_id, :case_id, :psu_id)');
            $stmt->bindParam(':cpu_id', $cpuId, \PDO::PARAM_INT);
            $stmt->bindParam(':gpu_id', $gpuId, \PDO::PARAM_INT);
            $stmt->bindParam(':motherboard_id', $motherboardId, \PDO::PARAM_INT);
            $stmt->bindParam(':ram_id', $ramId, \PDO::PARAM_INT);
            $stmt->bindParam(':storage_id', $storageId, \PDO::PARAM_INT);
            $stmt->bindParam(':cooler_id', $coolerId, \PDO::PARAM_INT);
            $stmt->bindParam(':case_id', $caseId, \PDO::PARAM_INT);
            $stmt->bindParam(':psu_id', $psuId, \PDO::PARAM_INT);
            $stmt->execute();
            $componentsId = (int)$this->pdo->lastInsertId();
        }


        $setName = $set->getName();
        $stmt = $this->pdo->prepare('SELECT * FROM sets WHERE name = :name');
        $stmt->bindParam(':name', $setName, \PDO::PARAM_STR);
        $stmt->execute();
        $tmpSet = $stmt->fetch(\PDO::FETCH_ASSOC);

        if($tmpSet){
            return false;
        }

        $stmt = $this->pdo->prepare('INSERT INTO sets (set_components_id, name, total_price, username, preferences, priority, ram, storage) VALUES (:comp_id, :name, :total_price, :username, :preferences, :priority, :ram, :storage)');
        $stmt->bindParam(':comp_id', $componentsId, \PDO::PARAM_INT);
        $stmt->bindParam(':name', $setName);
        $total = $set->getTotal();
        $stmt->bindParam(':total_price', $total, \PDO::PARAM_INT);
        $creatorName = $set->getCreatorName();
        $stmt->bindParam(':username', $creatorName, \PDO::PARAM_INT);
        $preferences = $set->getPreferences();
        $stmt->bindParam(':preferences', $preferences, \PDO::PARAM_INT);
        $priority = $set->getPriority();
        $stmt->bindParam(':priority', $priority, \PDO::PARAM_INT);
        $ram = $set->getRamSize();
        $stmt->bindParam(':ram', $ram, \PDO::PARAM_INT);
        $storage = $set->getStorageSize();
        $stmt->bindParam(':storage', $storage, \PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function getSets(string $username){
        $stmt = $this->pdo->prepare('SELECT * FROM filter_sets_by_user(:username)');
        $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
        $stmt->execute();
        $sets = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];
        foreach ($sets as $set) {
            $result[] = new Set(
                $set['set_name'],
                $username,
                $set['total_price'],
                $set['cpu_name'],
                $set['cpu_price'],
                $set['gpu_name'],
                $set['gpu_price'],
                $set['motherboard_name'],
                $set['motherboard_price'],
                $set['ram_name'],
                $set['ram_price'],
                $set['storage_name'],
                $set['storage_price'],
                $set['cooler_name'],
                $set['cooler_price'],
                $set['case_name'],
                $set['case_price'],
                $set['psu_name'],
                $set['psu_price'],
                 "",
                "",
                $set['ram_size'],
                $set['storage_size']
            );

        }

        return $result;
    }


    public function getUserSetByTitle(string $searchString): array {
        session_start();

        $searchString = '%' . strtolower($searchString) . '%';
        $stmt = $this->pdo->prepare('SELECT * FROM filter_sets_by_user(:username) where lower(set_name) like :searchString');
        $stmt->bindParam(':username', $_SESSION['user_id'], \PDO::PARAM_STR);
        $stmt->bindParam(':searchString', $searchString, \PDO::PARAM_STR);
        $stmt->execute();
        $sets = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $sets;
    }

    public function editSet(string $name, Set $set): bool{

        $cpuId = $this->addCpu($set->getCpu(), $set->getCpuPrice());
        $gpuId = $this->addGpu($set->getGpu(), $set->getGpuPrice());
        $motherboardId = $this->addMotherboard($set->getMotherboard(), $set->getMotherboardPrice());
        $ramId = $this->addRam($set->getRam(), $set->getRamPrice());
        $storageId = $this->addStorage($set->getStorage(), $set->getStoragePrice());
        $coolerId = $this->addCooler($set->getCooler(), $set->getCoolerPrice());
        $caseId = $this->addCase($set->getCase(), $set->getCasePrice());
        $psuId = $this->addPsu($set->getPsu(), $set->getPsuPrice());

        $componentsId = $this->isThereComponentsSet($cpuId, $gpuId, $motherboardId, $ramId, $storageId, $coolerId, $caseId, $psuId);

        if(!$componentsId){
            $stmt = $this->pdo->prepare('INSERT INTO set_components (cpu_id, gpu_id, motherboard_id, ram_id, storage_id, cooler_id, case_id, psu_id) VALUES (:cpu_id, :gpu_id, :motherboard_id, :ram_id, :storage_id, :cooler_id, :case_id, :psu_id)');
            $stmt->bindParam(':cpu_id', $cpuId, \PDO::PARAM_INT);
            $stmt->bindParam(':gpu_id', $gpuId, \PDO::PARAM_INT);
            $stmt->bindParam(':motherboard_id', $motherboardId, \PDO::PARAM_INT);
            $stmt->bindParam(':ram_id', $ramId, \PDO::PARAM_INT);
            $stmt->bindParam(':storage_id', $storageId, \PDO::PARAM_INT);
            $stmt->bindParam(':cooler_id', $coolerId, \PDO::PARAM_INT);
            $stmt->bindParam(':case_id', $caseId, \PDO::PARAM_INT);
            $stmt->bindParam(':psu_id', $psuId, \PDO::PARAM_INT);
            $stmt->execute();
            $componentsId = (int)$this->pdo->lastInsertId();
        }

        $stmt = $this->pdo->prepare('UPDATE sets SET set_components_id = :comp_id, total_price = :total_price, username = :username, preferences = :preferences, priority = :priority, ram = :ram, storage = :storage, name = :newName WHERE name = :name');
        $stmt->bindParam(':comp_id', $componentsId, \PDO::PARAM_INT);
        $stmt->bindParam(':name', $name);
        $newName = $set->getName();
        $stmt->bindParam(':newName', $newName);
        $total = $set->getTotal();
        $stmt->bindParam(':total_price', $total, \PDO::PARAM_INT);
        $creatorName = $set->getCreatorName();
        $stmt->bindParam(':username', $creatorName, \PDO::PARAM_INT);
        $preferences = $set->getPreferences();
        $stmt->bindParam(':preferences', $preferences, \PDO::PARAM_INT);
        $priority = $set->getPriority();
        $stmt->bindParam(':priority', $priority, \PDO::PARAM_INT);
        $ram = $set->getRamSize();
        $stmt->bindParam(':ram', $ram, \PDO::PARAM_INT);
        $storage = $set->getStorageSize();
        $stmt->bindParam(':storage', $storage, \PDO::PARAM_INT);
        $stmt->execute();

        return true;
    }

    public function filterSets($minPrice, $maxPrice, $preferences, $priority, $ram, $storage ): array{
        $stmt = $this->pdo->prepare('select * from filter_sets(:minPrice,:maxPrice,:preferences, :priority, :ram, :storage)');

        if($minPrice < 0)
            $stmt->bindParam(':minPrice', $minPrice, \PDO::PARAM_NULL);
        else
            $stmt->bindParam(':minPrice', $minPrice, \PDO::PARAM_STR);

        if($maxPrice == 0)
            $stmt->bindParam(':maxPrice', $maxPrice, \PDO::PARAM_NULL);
        else
            $stmt->bindParam(':maxPrice', $maxPrice, \PDO::PARAM_STR);

        if($preferences == NULL)
            $stmt->bindParam(':preferences', $preferences, \PDO::PARAM_NULL);
        else
            $stmt->bindParam(':preferences', $preferences);
        if($priority == NULL)
            $stmt->bindParam(':priority', $priority, \PDO::PARAM_NULL);
        else
            $stmt->bindParam(':priority', $priority);

        if($ram == NULL)
            $stmt->bindParam(':ram', $ram, \PDO::PARAM_NULL);
        else
            $stmt->bindParam(':ram', $ram);

        if($storage == NULL)
            $stmt->bindParam(':storage', $storage, \PDO::PARAM_NULL);
        else
            $stmt->bindParam(':storage', $storage);

        $stmt->execute();
        $sets = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $result = [];
        foreach ($sets as $set) {
            $result[] = new Set(
                    $set['set_name'],
                    "",
                    $set['total_price'],
                    $set['cpu_name'],
                    $set['cpu_price'],
                    $set['gpu_name'],
                    $set['gpu_price'],
                    $set['motherboard_name'],
                    $set['motherboard_price'],
                    $set['ram_name'],
                    $set['ram_price'],
                    $set['storage_name'],
                    $set['storage_price'],
                    $set['cooler_name'],
                    $set['cooler_price'],
                    $set['case_name'],
                    $set['case_price'],
                    $set['psu_name'],
                    $set['psu_price'],
                    "",
                    "",
                    $set['ram_size'],
                    $set['storage_size']
                );

        }

        return $result;

    }

    public function deleteSet($name)
    {

        $stmt = $this->pdo->prepare('DELETE FROM sets WHERE name = :name');
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();

    }

    public function getSet($name)
    {
        $stmt = $this->pdo->prepare('SELECT
            s.name::TEXT AS set_name,
            c.name::TEXT AS cpu_name, c.price AS cpu_price,
            g.name::TEXT AS gpu_name, g.price AS gpu_price,
            m.name::TEXT AS motherboard_name, m.price AS motherboard_price,
            r.name::TEXT AS ram_name, r.price AS ram_price,
            co.name::TEXT AS cooler_name, co.price AS cooler_price,
            p.name::TEXT AS psu_name, p.price AS psu_price,
            st.name::TEXT AS storage_name, st.price AS storage_price,
            ca.name::TEXT AS case_name, ca.price AS case_price,
            s.total_price AS total_price,
            s.preferences::TEXT AS preferences,
            s.priority::TEXT AS priority,
            s.ram::TEXT AS ram_size,
            s.storage::TEXT AS storage_size
        FROM
            sets s
            JOIN set_components sc ON s.set_components_id = sc.set_id
            LEFT JOIN cpus c ON sc.cpu_id = c.id
            LEFT JOIN gpus g ON sc.gpu_id = g.id
            LEFT JOIN motherboards m ON sc.motherboard_id = m.id
            LEFT JOIN rams r ON sc.ram_id = r.id
            LEFT JOIN coolers co ON sc.cooler_id = co.id
            LEFT JOIN psus p ON sc.psu_id = p.id
            LEFT JOIN storages st ON sc.storage_id = st.id
            LEFT JOIN cases ca ON sc.case_id = ca.id
        WHERE s.name = :name');

        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();
        $set = $stmt->fetch(\PDO::FETCH_ASSOC);

        return new Set(
            $set['set_name'],
            $_SESSION['user_id'],
            $set['total_price'],
            $set['cpu_name'],
            $set['cpu_price'],
            $set['gpu_name'],
            $set['gpu_price'],
            $set['motherboard_name'],
            $set['motherboard_price'],
            $set['ram_name'],
            $set['ram_price'],
            $set['storage_name'],
            $set['storage_price'],
            $set['cooler_name'],
            $set['cooler_price'],
            $set['case_name'],
            $set['case_price'],
            $set['psu_name'],
            $set['psu_price'],
            $set['preferences'],
            $set['priority'],
            $set['ram_size'],
            $set['storage_size']
        );



    }


}