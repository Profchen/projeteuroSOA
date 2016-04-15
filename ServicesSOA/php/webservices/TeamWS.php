<?php
/**
 * Created by PhpStorm.
 * User: gomel_000
 * Date: 15/04/2016
 * Time: 11:06
 */

require_once 'IWebService.php';
require_once 'database/db_connect.php';

session_start();
const ADD_TEAM = "addTeam";

class TeamWS implements IWebService
{

    public function DoGet()
    {
        if (!isset($_GET[PARAM_ACTION]))
            Helper::ThrowAccessDenied();

        switch ($_GET[PARAM_ACTION])
        {
            case ADD_TEAM:
                return $this->addTeam();


            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }

    private function addMatch(){

        if (!isset($_GET['tm_name']))
            Helper::ThrowAccessDenied();

        $sql = "INSERT INTO TEAMS(tm_name) VALUES ('" .$_GET['tm_name']. "')";

        MySQL::Execute($sql);

        return true;

    }



    public function DoPost()
    {
        Helper::ThrowAccessDenied();
    }

    public function DoPut()
    {
        Helper::ThrowAccessDenied();
    }

    public function DoDelete()
    {
        Helper::ThrowAccessDenied();
    }

}