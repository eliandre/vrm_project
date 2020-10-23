<?php

namespace App\Entity;

use App\Repository\BookingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingsRepository::class)
 */
class Bookings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="firstName", type="string", length=40, nullable=false)
     */
    private $firstName;

    /**
     * @ORM\Column(name="lastName", type="string", length=40, nullable=false)
     */
    private $lastName;

    /**
     * @ORM\Column(name="phone", type="string", length=10, nullable=false)
     */
    private $phone;

    /**
     * @ORM\Column(name="email", type="string", length=20, nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(name="birthday", type="date", nullable=false)
     */
    private $birthday;

    /**
     * @ORM\Column(name="startDate", type="date", nullable=false)
     */
    private $startDate;

    /**
     * @ORM\Column(name="endDate", type="date", nullable=false)
     */
    private $endDate;

    /**
     * @ORM\Column(name="arrivalTime", type="time", nullable=true)
     */
    private $arrivalTime;

    /**
     * @ORM\Column(name="additionalInformation", type="text")
     */
    private $additionalInformation;

    /**
     * @ORM\Column(name="nrOfPeople", type="integer", nullable=false)
     */
    private $nrOfPeople;

    /**
     * @ORM\Column(name="payingMethod", type="string", length=10, nullable=false)
     */
    private $payingMethod;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * @return mixed
     */
    public function getAdditionalInformation()
    {
        return $this->additionalInformation;
    }

    /**
     * @return mixed
     */
    public function getNrOfPeople()
    {
        return $this->nrOfPeople;
    }

    /**
     * @return mixed
     */
    public function getPayingMethod()
    {
        return $this->payingMethod;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @param mixed $arrivalTime
     */
    public function setArrivalTime($arrivalTime)
    {
        $this->arrivalTime = $arrivalTime;
    }

    /**
     * @param mixed $additionalInformation
     */
    public function setAdditionalInformation($additionalInformation)
    {
        $this->additionalInformation = $additionalInformation;
    }

    /**
     * @param mixed $numberOfPeople
     */
    public function setnrOfPeople($nrOfPeople)
    {
        $this->nrOfPeople = $nrOfPeople;
    }

    /**
     * @param mixed $payingMethod
     */
    public function setPayingMethod($payingMethod)
    {
        $this->payingMethod = $payingMethod;
    }
}
