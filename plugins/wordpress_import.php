<?php

/**
 *
 * This imports Wordpress pages, posts, categories and comments to Zenpage
 *
 * NOTE: Requires MySQLi enabled as the database handler.
 *
 * @author Malte Müller (acrylian) made plugin compliant by Stephen Billard
 * @package plugins/wordpress_import
 * @pluginCategory development
 * @deprecated since 2.00.02 and will be moved to DevTools repository
 */
$plugin_is_filter = 5 | ADMIN_PLUGIN;
$plugin_description = gettext("Import Wordpress pages, posts, categories, and comments to Zenpage.");

npgFilters::register('admin_tabs', 'wordpress_import_admin_tabs', -400);

function wordpress_import_admin_tabs($tabs) {
	if (npg_loggedin(ADMIN_RIGHTS)) {
		if (!isset($tabs['development'])) {
			$tabs['development'] = array('text' => gettext("development"),
					'link' => getAdminLink(USER_LUGIN_FOLDER . '/wordpress_import/admin_tab.php') . '?tab=wordpress',
					'subtabs' => NULL);
		}
		$tabs['development']['subtabs'][gettext("wordpress importer")] = USER_PLUGIN_FOLDER . '/wordpress_import/admin_tab.php?tab=wordpress';
	}
	return $tabs;
}

?>