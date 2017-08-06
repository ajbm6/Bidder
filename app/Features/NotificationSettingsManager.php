<?php

namespace App\Features;

use App\NotificationSettings;

class NotificationSettingsManager
{

	/**
	 * Get the notification settings for a user.
	 * 
	 * @param  App\User 	$user
	 * @return collection
	 */
	public function forUser($user)
	{
		$settings = NotificationSettings::where('user_id', $user->id)->first();

		return $settings;
	}

}
