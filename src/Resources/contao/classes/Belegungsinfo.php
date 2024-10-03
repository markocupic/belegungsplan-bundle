<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) Jan Karai
 *
 * @license LGPL-3.0-or-later
 *
 * @author Jan Karai <https://www.sachsen-it.de>
 */
namespace Mailwurm\Belegung;
use Contao\System;
/**
 * Class Belegungsinfo
 *
 */
class Belegungsinfo extends \Backend implements \executable
{
	/**
	 * Return true if the module is active
	 *
	 * @return boolean
	 */
	public function isActive()
	{
		return false;
	}

	/**
	 * Generate the module
	 *
	 * @return string
	 */
	public function run()
	{
		$objTemplate = new \BackendTemplate('be_belegungsinfo_main');
		$objTemplate->headline = $GLOBALS['TL_LANG']['tl_beleginfo']['headline'];
		$objTemplate->version = $GLOBALS['TL_LANG']['tl_beleginfo']['version'];
		$objTemplate->thanks = $GLOBALS['TL_LANG']['tl_beleginfo']['thanks'];
		$objTemplate->website = $GLOBALS['TL_LANG']['tl_beleginfo']['website'];
		$objTemplate->websiteurl = $GLOBALS['TL_LANG']['tl_beleginfo']['websiteurl'];
		$objTemplate->websitegithub = $GLOBALS['TL_LANG']['tl_beleginfo']['websitegithub'];
		$objTemplate->websitegithuburl = $GLOBALS['TL_LANG']['tl_beleginfo']['websitegithuburl'];
		$objTemplate->stars = $GLOBALS['TL_LANG']['tl_beleginfo']['stars'];
		$objTemplate->isActive = $this->isActive();

		return $objTemplate->parse();
	}
}

class_alias(Belegungsinfo::class, 'Belegungsinfo');