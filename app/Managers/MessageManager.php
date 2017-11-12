<?php

namespace App\Managers;

use App\Message;
use App\Events\NewMessage;
use App\Managers\Traits\ProjectTrait;

class MessageManager extends BaseManager
{
	use ProjectTrait;

	/**
	 * The message that the manager is working with.
	 * @var App\Message
	 */
	protected $message;

	/**
	 * Return the message that the manager has been working on.
	 * 
	 * @return App\Message
	 */
	public function message() { return $this->message; }

	/**
	 * Create a new message for a project.
	 * 
	 * @param  array 		$data
	 * @return App\Message
	 */
	public function create($data)
	{
		if ( $this->hasError() ) return false;

		if ( !$this->setData($data)->insert() ) return false;

		$this->setSuccess('Successfully inserted the message into storage.', 201);

		// Broadcast that there is a new message that has been created.
		event(new NewMessage($this->message));

		return true;
	}

	/**
	 * Insert the message into storage.
	 * 
	 * @return boolean
	 */
	protected function insert()
	{
		try {
			$this->message = Message::create([
				'project_id' => $this->project->id,
				'user_id' => $this->user->id,
				'message' => $this->data('message')
			]);
			// Attach the user to the message.
			$this->message->user = $this->user;
		} catch (\Exception $e) {
			$this->setError('Could not insert the message into storage.', 500);
			return false;
		}

		return true;
	}

}