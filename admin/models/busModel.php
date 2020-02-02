<?php
namespace BTRS;
include '../lib/Session.php';
Session::checkSession();
include '../config/config.php';
include '../lib/Database.php';
include '../helpers/Format.php';
$db = new Database();
$fm = new Format();


class busModel
{
    /**
     * to get the country record set
     *
     * @return array result record
     */
    public function getAllCompany()
    {
        $query = "SELECT * FROM company";
        $result = $db->select($query);
        return $result;
    }
    
    /**
     * to get the state record based on the country_id
     *
     * @param string $C_ID
     * @return array result record
     */
    public function BusByCompany($C_ID)
    {
        $query = "SELECT * FROM bus WHERE C_ID = ?";
        $paramType = 'd';
        $paramArray = array(
            $C_ID
        );
        $result = $this->ds->select($query, $paramType, $paramArray);
        return $result;
    }
}