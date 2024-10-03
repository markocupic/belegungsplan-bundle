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
 * Class ModuleBelegungsinfo
 *
 */
class ModuleBelegungsinfo extends \BackendModule
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_belegungsinfo';

	/**
	 * Generate the module
	 *
	 * @throws \Exception
	 */
	protected function compile()
	{
		System::loadLanguageFile('tl_beleginfo');

		$this->Template->content = '';
		$this->Template->href = $this->getReferer(true);
		$this->Template->title = \StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']);
		$this->Template->button = $GLOBALS['TL_LANG']['MSC']['backBT'];

		foreach ($GLOBALS['TL_BELEGUNGSINFO'] as $callback)
		{
			$this->import($callback);

			if (!$this->$callback instanceof \executable)
			{
				throw new \Exception("$callback is not an executable class");
			}

			$buffer = $this->$callback->run();

			if ($this->$callback->isActive())
			{
				$this->Template->content = $buffer;
				break;
			}

			$this->Template->content .= $buffer;
		}
	}
}

class_alias(ModuleBelegungsinfo::class, 'ModuleBelegungsinfo');