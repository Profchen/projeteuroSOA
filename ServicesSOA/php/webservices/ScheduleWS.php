<?php
/**
 * Created by PhpStorm.
 * User: gomel_000
 * Date: 15/04/2016
 * Time: 10:42
 */

    require_once 'IWebService.php';
    require_once 'database/db_connect.php';

    session_start();
    const GET_SCHEDULE = "getSchedule";

    class ScheduleWS implements IWebService
    {

        public function DoGet()
        {
            if (!isset($_GET[PARAM_ACTION]))
                Helper::ThrowAccessDenied();

            switch ($_GET[PARAM_ACTION])
            {
                case GET_SCHEDULE:
                    return $this->getSchedule();

                default:
                    Helper::ThrowAccessDenied();
                    break;
            }
        }

        private function getSchedule(){

            $sql = "SELECT SUM(be_point) AS TOTAL, us_name FROM bets INNER JOIN USERS us ON us.us_id = bets.us_id GROUP BY bets.us_id";

            MySQL::Execute($sql);

            return MySQL::GetResult()->fetchAll();
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