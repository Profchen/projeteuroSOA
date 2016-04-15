<?php
/**
 * Created by PhpStorm.
 * User: gomel_000
 * Date: 15/04/2016
 * Time: 11:11
 */

require_once 'IWebService.php';
require_once 'database/db_connect.php';

session_start();
const ADD_BET = "addBet";

class BetWS implements IWebService
{

    public function DoGet()
    {
        if (!isset($_GET[PARAM_ACTION]))
            Helper::ThrowAccessDenied();

        switch ($_GET[PARAM_ACTION])
        {
            case ADD_BET:
                return $this->addBet();


            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }

    private function addBet(){

        if (!isset($_GET['be_score1']) || !isset($_GET['be_score2']) || !isset($_GET['ma_id']) || !isset($_GET['us_id']))
            Helper::ThrowAccessDenied();

        $sql = "INSERT INTO bets(be_score1, be_score2, ma_id, us_id) VALUES('" .$_GET['be_score1']. "', '".$_GET['be_score2']. "', '" .$_GET['ma_id']. "' '" .$_GET['us_id']. "')";

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