<?php

class FrontController extends BaseController {

	public function home()
	{
		return View::make('home');
	}

	public function check()
	{
		//VALIDATE FIELDS
		$rules = array(
			'username'	=>'required|email'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			$split = explode('@', Input::get('username'));
			$name = $split[0];

			$username = User::where('username', $name)->count();

			if (count($username) > 0 ) {
				
				$users = User::whereRaw(DB::raw('username REGEXP "'. $name .'[0-9]{0,2}"'))->get();

				$usernames = array();
				foreach ($users as $user) {
					$usernames[] = $user->username;
				}

				//IF WE GET ANY RESULT
				$results = array();
				if (!empty($usernames)) {
					for ($i=1; $i < 10; $i++) {
						if (!in_array($name.$i, $usernames)) {
							$results[] = $name.$i;
						}
					}
				}

				if (empty($results)) {
					return Response::json(array("$name"));
				}else{
					return Response::json($results);
				}
			}

		}else{
			return Redirect::route('home')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}		
	}
}