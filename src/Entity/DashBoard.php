<?php


namespace App\Entity;


class DashBoard
{
    private $openPercent ;
    private $closePercent ;
    private $reopenPercent ;

    /**
     * @return mixed
     */
    public function getOpenPercent()
    {
        return $this->openPercent;
    }

    /**
     * @return mixed
     */
    public function getClosePercent()
    {
        return $this->closePercent;
    }

    /**
     * @return mixed
     */
    public function getReopenPercent()
    {
        return $this->reopenPercent;
    }

    public function calcolatePercent (){

    }
}