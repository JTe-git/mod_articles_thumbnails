<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_thumbnails
 *
 * @copyright	Copyright © 2016 - All rights reserved.
 * @license		GNU General Public License v2.0
 * @author 		Sergio Iglesias (@sergiois)
 */

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\ArticlesThumbnails\Site\Helper\ArticlesThumbnailsHelper;

defined('_JEXEC') or die;

$items = ArticlesThumbnailsHelper::getItems($params);

if (!count($items))
{
	return;
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx') ?? '', ENT_COMPAT, 'UTF-8');
$layout = $params->get('layout', 'default');
switch((int)$params->get('templateframework', 1))
{
    case 2: $layout .= '_bootstrap3'; break;
    case 3: $layout .= '_uikit'; break;
    case 4: $layout .= '_uikit3'; break;
    case 5: $layout .= '_slide'; break;
    case 6: $layout .= '_bootstrap5'; break;
    case 7: $layout .= '_slide5'; break;
}

require ModuleHelper::getLayoutPath('mod_articles_thumbnails', $layout);
