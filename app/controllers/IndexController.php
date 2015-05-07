<?php

class IndexController extends BaseController {

	public function getIndex()
	{
		return View::make('index');
	}

	public function checkExist()
	{
		/*
		* Get the name in the email
		*/
		$split = explode('@', Input::get('username'));
		$name = $split[0];

		/*
		* Check if the username is already existing
		*/
		$user = DB::select('
			SELECT count(username) as count
			FROM users
			WHERE username = "'. $name .'"
		');
		
		/*
		* Loop in the result
		* @result int Count
		*/
		foreach ($user as $u) {
			$count = $u->count;
		}

		/*
		* If more than zero, it means it exist.
		* @return string Display an error message.
		*/

		if ( $count > 0 ) {
			echo "exists";
		}		
	}

	public function suggest()
	{
		$username = Input::get('username');

		/*
		* Get the name in the email
		*/
		$split = explode('@', $username);
		$name = $split[0];
	
		/*
		* Check if what we are suggesting is not yet existing in the db
		*/
		$queries = DB::select('
			SELECT username
			FROM users
			WHERE username REGEXP "'. $name .'[0-9]{0,2}"
		');
		
		$results = array();
		foreach ($queries as $query) {
			$results[] = $query->username;
		}

		$suggestions 	= array();
		$count 			= 0;
		$suggest 		= 5;
		
		while ($count <= $suggest):
			$count++;
			
			if (!in_array($username . $count, $results)) {
				
				$split = explode('@', $username);
				$name = $split[0];

			    $suggestions[] = $name . $count;
			    $suggest--;
			}
		endwhile;
		
		echo json_encode($suggestions);
	}
}