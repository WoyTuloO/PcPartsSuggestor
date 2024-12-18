<?php

namespace App\models;

class Set
{
    private $id;
    private $name;
    private $creatorId;
    private $total;
    private $cpu;
    private $cpuPrice;
    private $gpu;
    private $gpuPrice;
    private $motherboard;
    private $motherboardPrice;
    private $ram;
    private $ramPrice;
    private $storage;
    private $storagePrice;
    private $cooler;
    private $coolerPrice;
    private $case;
    private $casePrice;
    private $psu;
    private $psuPrice;
    private $preferences;
    private $priority;
    private $ramSize;
    private $storageSize;

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatorName(): string
    {
        return $this->creatorId;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getCpu(): string
    {
        return $this->cpu;
    }

    public function getCpuPrice(): float
    {
        return $this->cpuPrice;
    }

    public function getGpu(): string
    {
        return $this->gpu;
    }

    public function getGpuPrice(): float
    {
        return $this->gpuPrice;
    }

    public function getMotherboard(): string
    {
        return $this->motherboard;
    }

    public function getMotherboardPrice(): float
    {
        return $this->motherboardPrice;
    }

    public function getRam(): string
    {
        return $this->ram;
    }

    public function getRamPrice(): float
    {
        return $this->ramPrice;
    }


    public function getStorage(): string
    {
        return $this->storage;
    }

    public function getStoragePrice(): float
    {
        return $this->storagePrice;
    }

    public function getCooler(): string
    {
        return $this->cooler;
    }

    public function getCoolerPrice(): float
    {
        return $this->coolerPrice;
    }

    public function getCase(): string
    {
        return $this->case;
    }

    public function getCasePrice(): float
    {
        return $this->casePrice;
    }

    public function getPsu(): string
    {
        return $this->psu;
    }

    public function getPsuPrice(): float
    {
        return $this->psuPrice;
    }

    public function getPreferences(): string
    {
        return $this->preferences;
    }

    public function getPriority(): string
    {
        return $this->priority;
    }

    public function getRamSize(): string
    {
        return $this->ramSize;
    }

    public function getStorageSize(): string
    {
        return $this->storageSize;
    }


    public function __construct(
        string $name,
        string $username,
        float $total,
        string $cpu,
        float $cpuPrice,
        string $gpu,
        float $gpuPrice,
        string $motherboard,
        float $motherboardPrice,
        string $ram,
        float $ramPrice,
        string $storage,
        float $storagePrice,
        string $cooler,
        float $coolerPrice,
        string $case,
        float $casePrice,
        string $psu,
        float $psuPrice,
        string $preferences,
        string $priority,
        string $ramSize,
        string $storageSize
    ) {
        $this->name = $name;
        $this->creatorId = $username;
        $this->total = $total;
        $this->cpu = $cpu;
        $this->cpuPrice = $cpuPrice;
        $this->gpu = $gpu;
        $this->gpuPrice = $gpuPrice;
        $this->motherboard = $motherboard;
        $this->motherboardPrice = $motherboardPrice;
        $this->ram = $ram;
        $this->ramPrice = $ramPrice;
        $this->storage = $storage;
        $this->storagePrice = $storagePrice;
        $this->cooler = $cooler;
        $this->coolerPrice = $coolerPrice;
        $this->case = $case;
        $this->casePrice = $casePrice;
        $this->psu = $psu;
        $this->psuPrice = $psuPrice;
        $this->preferences = $preferences;
        $this->priority = $priority;
        $this->ramSize = $ramSize;
        $this->storageSize = $storageSize;
    }





}