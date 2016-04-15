<?php

	require_once('IWebService.php');
	require_once('database/db_connect.php');
        const PARAM_NAME = 'name';
        const PARAM_DESCRIPTION = 'description';
        const PARAM_ACTION = 'action';
	const PARAM_SURVEY_ID = 'idSurvey';
	const PARAM_ANSWERS = 'answers';
	const GET_STATS = 'stats';
	const GET_ALL_SURVEY = 'listing';
	const ADD_ANSWERS = 'addAnswers';
	const GET_SURVEY_BY_ID = 'find';
    const ACTION_EDIT_SURVEY = 'edit';
	const GET_SURVEY_QUESTION_BY_ID = 'questions';
  	const FIELD_STATS_PERCENT = '(counter1 + counter2 + counter3 + counter4) * 100';
	const SQL_GET_STATISTIQUES_BY_SURVEY = 'SELECT title, IFNULL(counter1 / %s,0) AS A, IFNULL(counter2 / %s,0) AS B, IFNULL(counter3 / %s,0) AS C, IFNULL(counter4 / %s,0) as D FROM questionAnswer WHERE idSurvey =';
	const SQL_GET_ANSWER_STAT = 'SELECT counter%d FROM questionanswer WHERE idQuestion = %d';
	const SQL_UPDATE_ANSWER_STAT = 'UPDATE questionanswer SET counter%d = %d WHERE idQuestion = %d';
	const SQL_GET_ALL_SURVEY = "SELECT idSurvey, name, description FROM survey";
	const SQL_GET_SURVEY_BY_ID = "SELECT name, description FROM survey WHERE idSurvey =";
	const SQL_GET_SURVEY_QUESTION_BY_ID = "SELECT idQuestion, title, 'order', titleResponse1, titleResponse2, titleResponse3, titleResponse4 FROM questionanswer WHERE idSurvey =";
	const ACTION_ADD ='add';
    const ACTION_NEW_SURVEY ='new';
    const SQL_INSERT_SURVEY='INSERT INTO survey (name, description) VALUES ("%s", "%s" )';
    const SQL_EDIT_SURVEY = 'UPDATE survey SET name="%s",description="%s" WHERE idSurvey="%d"';


	class SurveyWS implements IWebService
	{
		public function DoGet()
		{
			return $this->DoPost();
		}

		public function DoPost()
		{
			//Helper::CheckLogin();

			if (!isset($_GET[PARAM_ACTION]))
				Helper::ThrowAccessDenied();

			switch ($_GET[PARAM_ACTION])
			{
				case GET_STATS:
					return $this->getStatsBySurvey();
				case GET_SURVEY_BY_ID:
					return $this->getSurveyById();
				case GET_SURVEY_QUESTION_BY_ID:
					return $this->getSurveyQuestionsById();
				case GET_ALL_SURVEY:
					return $this->getAllSurvey();
				case ADD_ANSWERS:
					return $this->addAnswers();
				case ACTION_NEW_SURVEY:
                    return $this->createSurvey();
                case ACTION_EDIT_SURVEY:
                    return $this->editSurvey();
				default:
					Helper::ThrowAccessDenied();
					break;
			}
		}

		private function addAnswers()
    	{
	    	if(!isset($_POST[PARAM_ANSWERS]))
	        	Helper::ThrowAccessDenied();

	        //$answers = array(1, 2, 2, 4);
	        $answers = json_decode($_POST[PARAM_ANSWERS]);

	        // Pour chaque question, on obtient la stat associée à la réponse donnée et on ajoute + 1.
	        for ($i = 0; $i < count($answers);) 
	        {
	        	$answerId = $answers[$i++];
	        	$answerNumber = $answers[$i++];

	        	if (!MySQL::Execute(sprintf(SQL_GET_ANSWER_STAT, $answerNumber, $answerId)))
	        		return false; 

	        	$count = MySQL::GetResult()->fetch(PDO::FETCH_BOTH)[0] + 1;

	        	if (!MySQL::Execute(sprintf(SQL_UPDATE_ANSWER_STAT, $answerNumber, $count, $answerId)))
	        		return false;

	        	MySQL::GetResult();
	        }

	      	return true;
		}

    	private function getStatsBySurvey()
    	{
	    	if(!isset($_GET[PARAM_SURVEY_ID]))
	        	Helper::ThrowAccessDenied();

	      	MySQL::Execute(
	      		sprintf(SQL_GET_STATISTIQUES_BY_SURVEY.$_GET[PARAM_SURVEY_ID], 
	      			FIELD_STATS_PERCENT,
	      			FIELD_STATS_PERCENT,
	      			FIELD_STATS_PERCENT,
	      			FIELD_STATS_PERCENT));

	      	return MySQL::GetResult()->fetchAll();
		}

		private function getAllSurvey()
		{
			MySQL::Execute(SQL_GET_ALL_SURVEY);

			return MySQL::GetResult()->fetchAll();
		}

		private function getSurveyById()
		{
			if(!isset($_GET['idSurvey']))
				Helper::ThrowAccessDenied();

			MySQL::Execute(SQL_GET_SURVEY_BY_ID.$_GET['idSurvey']);

			return MySQL::GetResult()->fetchAll();
		}

		private function getSurveyQuestionsById()
		{
			if(!isset($_GET['idSurvey']))
				Helper::ThrowAccessDenied();

			MySQL::Execute(SQL_GET_SURVEY_QUESTION_BY_ID.$_GET['idSurvey']);

			return MySQL::GetResult()->fetchAll();
		}

		public function DoPut()
		{
			Helper::ThrowAccessDenied();
		}

		public function DoDelete()
		{
			Helper::ThrowAccessDenied();
		}

		private function createSurvey()
		{
			if (!isset($_REQUEST[PARAM_NAME]) ||
                            !isset($_REQUEST[PARAM_DESCRIPTION]) )
			{
				Helper::ThrowRequestError();
			}
			
                        MySQL::Execute(
                                sprintf (SQL_INSERT_SURVEY,
                                $_GET[PARAM_NAME],
                                $_GET[PARAM_DESCRIPTION]
				));
                        
                        return MySQL::GetLastInsertId();
		}

        private function editSurvey()
        {
            if (!isset($_REQUEST[PARAM_NAME]) ||
                !isset($_REQUEST[PARAM_DESCRIPTION]) ||
                !isset($_REQUEST[PARAM_SURVEY_ID]))
            {
                Helper::ThrowRequestError();
            }

            MySQL::Execute(
                sprintf (SQL_EDIT_SURVEY,
                    $_GET[PARAM_NAME],
                    $_GET[PARAM_DESCRIPTION],
                    $_REQUEST[PARAM_SURVEY_ID]
                ));
        }
	}
