<?php

namespace App\Services\Appointments\Entities;


class AppointmentEntity
{
    /** @var string */
    protected string $notes;
    
    /** @var float */
    protected float $weight;
    
    /** @var float */
    protected float $height;

    /** @var int */
    protected int $patient_id;
    
    /** 
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }
    
    /**
     * @param string $notes
     */
    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }
    
    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }
    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }
    
    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }
    
    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }
    
    
    /**
     * @return int 
     */
    public function getPatientId(): int    
    {
        return $this->patient_id;
    }

    /**
     * @param int $patient_id
     */
    public function setPatientId(int $patient_id): void
    {
        $this->patient_id = $patient_id;
    }
}