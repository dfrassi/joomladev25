<?php

// No direct access to this file
defined('_JEXEC') or die;

/**
 * rda component helper.
 */
abstract class rdaHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(JText::_('COM_RDA_SUBMENU_MESSAGES'), 'index.php?option=com_rda', $submenu == 'messages');
		JSubMenuHelper::addEntry(JText::_('COM_RDA_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_rda', $submenu == 'categories');
		// set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-rda {background-image: url(../media/com_rda/images/tux-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_RDA_ADMINISTRATION_CATEGORIES'));
		}
	}
	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($messageId)) {
			$assetName = 'com_rda';
		}
		else {
			$assetName = 'com_rda.message.'.(int) $messageId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}
