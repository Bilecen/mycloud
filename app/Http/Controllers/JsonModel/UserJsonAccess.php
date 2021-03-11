<?php


namespace App\Http\Controllers\JsonModel;


class UserJsonAccess
{
    private $key = "";
    private $startdate = "";
    private $enddate = "";

    /**
     * UserJsonAccess constructor.
     * @param string $key
     * @param string $startdate
     * @param string $enddate
     */
    public function __construct($key, $startdate, $enddate)
    {
        $this->key = $key;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @param string $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return string
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * @param string $enddate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }


}
