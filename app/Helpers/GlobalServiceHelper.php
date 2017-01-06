<?php 

	/**
	 * Set current language
	 * @return String The current language
	 */
	function language()
	{
		// Default language
		$language = 'en';

		// Set language
		if (\Session::has('locale')) {
	       	$language = \Session::get('locale');
	    }

	    return $language;
	}

	function listLanguages()
	{
		return array(
			'jp' => 'Japanese',
			'en' => 'English',
			'vi' => 'Vietnamese',
			'cns' => 'Chinese(Simplified)',
			'cnt' => 'Chinese(Traditional)',
			'th' => 'Thai',
			'kr' => 'Korean',
			'sp' => 'Spanish'
		);
	}
?>

