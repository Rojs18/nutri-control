<?php

namespace App\Services\Patients\Entities;


class PatientEntity
{
    /** @var string */
    protected string $first_name;
    
    /** @var string */
    protected string $last_name;
    
    /** @var string */
    protected string $birth_date;
    
    /** @var string */
    protected string $gender;
    
    /** @var string|null */
    protected string|null $medical_history;

    /** @var int */
    protected int $user_id;
    
    /** 
     * @return string
     */
    public function getFisrtName(): string
    {
        return $this->first_name;
    }
    
    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }
    
    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }
    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }
    
    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birth_date;
    }
    
    /**
     * @param string $birth_date
     */
    public function setBirthDate(string $birth_date): void
    {
        $this->birth_date = $birth_date;
    }
    
    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }
    
    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @param string|null
     */ 
        public function getMedicalHistory(): string|null
    {
        return $this->medical_history;
    }
    
    /**
     * @param string|null $medical_history
     */
    public function setMedicalHistory(string|null $medical_history): void
    {
        $this->medical_history = $medical_history;
    }
    
    /**
     * @return int 
     */
    public function getUserId(): int    
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }
}