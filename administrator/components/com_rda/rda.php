<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_rda')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// require helper file
JLoader::register('rdaHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'rda.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by rda
$controller = JController::getInstance('rda');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
