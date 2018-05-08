<?php

namespace Models;

/**
 * Result generic model
 *
 */
abstract class Result
{
	/**
	 * @author	Juanjo Lainez Reche
	 * @var		string	$title	Title of the result
	 */
	protected $title;

    /**
     * @author	Juanjo Lainez Reche
     * @var		string	$link	Link in the result
     */
    protected $link;

    /**
     * @author	Juanjo Lainez Reche
     * @var		string	$provider	Search result provider (Google, Yahoo, Bing, ...)
     */
    protected $provider;

	/**
	 * Get the title of the result
	 *
	 * @author	Juanjo Lainez
	 * @return	string
	 */
	
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set the title of the result to $title
	 *
	 * @author	Juanjo Lainez
	 *
	 * @param string $title New title 
	 * @return	void
	 */
	
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * Get the title of the picture
	 *
	 * @author	Juanjo Lainez
	 * @return	string
	 */

	public function getLink()
	{
        return $this->link;
	}

	/**
	 * Set the title of the picture to $title
	 *
	 * @author	Juanjo Lainez
	 *
	 * @param string $title New title
	 * @return	void
	 */

	public function setLink($link)
	{
		$this->link = $link;
	}

	/*
	 * Get the provider of the result
	 *
	 * @author	Juanjo Lainez
	 * @return	string
	 */
	
	public abstract function getProvider();
}
