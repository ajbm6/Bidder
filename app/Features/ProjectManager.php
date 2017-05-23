<?php

namespace App\Features;

use App\Project;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectManager 
{

	/**
	 * The amount of days after a project is created that users have to accept the project.
	 * With 8 it will technically be 7 because it ends on midnight between 7-8
	 * 
	 * @var integer
	 */
	protected $acceptDays = 8;

	/**
	 * Create a project.
	 * 
	 * @param  array $data 	[The data for the project]
	 * @return boolean
	 */
	public function create($data) 
	{
		// The end time for acccepting the project is at midnight $this->acceptDays from now.
		$data['accept_end'] = Carbon::now('Europe/Stockholm')->addDays($this->acceptDays)->setTime(00,00,00);

		$project = new Project($data);

		return ($project->save()) ? true : false;
	}

	/**
	 * Show a users projects.
	 * 
	 * @param  App\User 	$user
	 * @return collection
	 */
	public function byUser($user) 
	{
		$projects = Project::with('serviceUser', 'bidUser')
							->where('service_user', $user->id)
							->orWhere('bid_user', $user->id)
							->orderBy('created_at', 'desc')
							->get();

		return $this->parseProjects($projects);
	}

	/**
	 * Get the messages for a project.
	 * 
	 * @param  App\Project 	$project
	 * @return collection
	 */
	public function messages($project) 
	{
		$messages = Message::where('project_id', $project->id)->get();
		$messages->load('user');

		return $messages;
	}

	/**
	 * Create a message for a project.
	 * 
	 * @param  App\Project 	$project
	 * @param  App\User 	$user
	 * @param  string 		$message
	 * @return boolean
	 */
	public function createMessage($project, $user, $message) 
	{
		$message = new Message([
			'project_id' => $project->id,
			'user_id' => $user->id,
			'message' => $message
		]);

		if ( !$message->save() ) return false;

		$message->user = $user;

		return $message;
	}

	/**
	 * Update the title for a project according to what role the user has on the project.
	 * 
	 * @param  App\User 	$user
	 * @param  App\Project 	$project
	 * @param  string 		$title
	 * @return boolean
	 */
	public function updateTitle($user, $project, $title)
	{
		if ( $user->id === $project->service_user ) {
			$project->service_user_title = $title;
		} else {
			$project->bid_user_title = $title;
		}

		return $project->update() ? true : false;
	}

	/**
	 * Need to parse the projects in order to set the users correctly.
	 * 
	 * @param  collection 	$projects
	 * @return collection
	 */
	private function parseProjects($projects)
	{
		foreach ($projects as $project) {
			$service_user = Auth::user()->id === $project->service_user ? true : false;

			$project->me = $service_user ? $project->serviceUser : $project->bidUser;
			$project->me->accepted =  $service_user ? $project->service_user_accept : $project->bid_user_accept;
			$project->other = $service_user ? $project->bidUser : $project->serviceUser;
			$project->other->accepted = $service_user ? $project->bid_user_accept : $project->service_user_accept;

			unset($project->serviceUser);
			unset($project->service_user_accept);
			unset($project->bidUser);
			unset($project->bid_user_accept);
		}

		return $projects;
	}

}