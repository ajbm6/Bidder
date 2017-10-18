<?php

namespace App\Features;

use App\ProjectHistory;

class ProjectHistoryManager
{

	/**
	 * The Id of the project to insert a history record for.
	 * @var null
	 */
	protected $projectId = null;

	/**
	 * The different history entries.
	 * @var array
	 */
	protected $entries = [
		'created' => ['type' => 'info', 'message' => 'Projektet skapades.'],
		'cancelled' => ['type' => 'critical', 'message' => '{user} accepterade inte projektets start.'],
		'updateDetails' => ['type' => 'warning', 'message' => '{user} uppdaterade projektets detaljer.'],
	];

	
	/**
	 * Set the projectId
	 * 
	 * @param  integer 	$projectId
	 * @return ProjectHistoryManager
	 */
	public function forProject($projectId)
	{
		$this->projectId = $projectId;

		return $this;
	}

	/**
	 * Add a project history entry.
	 * 
	 * @param 	integer 	$projectId
	 * @param 	string 		$action
	 * @throws  Exception
	 * @return  boolean
	 */
	public function add($action, $data = [])
	{
		if ( !$this->entries[$action] ) {
			throw new Exception('Not an allowed action.');
		}

		if ( is_null($this->projectId) ) {
			throw new Exception('You need to set a projectId');
		}

		return $this->insert($this->entries[$action]['type'], $action, $this->message($action, $data));
	}

	/**
	 * Insert an history entry.
	 * 
	 * @param  string 	$type
	 * @param  string 	$action
	 * @param  string 	$message
	 * @return boolean
	 */
	protected function insert($type, $action, $message)
	{
		$projectHistory = ProjectHistory::create([
							'project_id' => $this->projectId,
							'type' => $type,
							'action' => $action,
							'message' => $message
						]);

		return $projectHistory->id ? $projectHistory : false;
	}

	/**
	 * Parse the action text if there are some placeholders that needs to be switched out.
	 * 
	 * @param  string 	$action
	 * @param  array 	$data
	 * @return string
	 */
	protected function message($action, $data)
	{
		if ( empty($data) ) return $this->entries[$action]['message'];

		$parsedMessage = $this->entries[$action]['message'];
		foreach ($data as $key => $value) {
			$parsedMessage = str_replace('{'.$key.'}', $value, $parsedMessage);
		}

		return $parsedMessage;
	}
}