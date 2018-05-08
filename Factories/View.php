<?php

namespace Factories;

/**
 * Factory to render views.
 *
 * @author	Juanjo Lainez
 */
class View
{

	/**
	 * Render the view attaching data to it.
	 *
	 * @author	Juanjo Lainez
	 * @param	string	$view
	 * @param	array	$data
	 * @return	string
	 * @throws \Exception
	 */
	public static function make($view, $data = [])
	{
		$file_name = __DIR__ . "/../Views/{$view}.php";
		if( ! file_exists($file_name))
		{
			throw new \Exception("The view [$view] has not been found.");
		}

		extract($data);

		include $file_name;
	}

}
