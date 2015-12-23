<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use RandomLib\Factory as RandomLib;

class Random {

	protected $factory;
	protected $generator;

	public function __construct()
	{
		$this->factory = new RandomLib;
		$this->generator = $this->factory->getMediumStrengthGenerator();
	}

	public function generateString($length)
	{
		return $this->generator->generateString($length);
	}

}