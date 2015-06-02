<?php
/**
 * funtoo skin
 *
 * @file
 * @ingroup Skins
 * @author 666threesixes666 (http://www.funtoo.org/)
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is an extension to the MediaWiki package and cannot be run standalone.' );
}
 
$wgExtensionCredits['skin'][] = array(
	'path' => __FILE__,
	'name' => 'funtoo',
	'namemsg' => 'skinname-funtoo',
	'version' => '1.0',
	'url' => 'http://www.funtoo.org/',
	'author' => '[https://github.com/666threesixes666 666threesixes666]',
	'description' => 'An easily maintainable bootstrap & font awesome skin from http://www.funtoo.org',
	'license-name' => 'GPLv2+',
);
$wgValidSkinNames['funtoo'] = 'funtoo'; 
$wgAutoloadClasses['Skinfuntoo'] = __DIR__.'/funtoo.skin.php';
$wgMessagesDirs['funtoo'] = __DIR__.'/i18n';
$wgResourceModules['skins.funtoo'] = array(
	'styles' => array(
		'funtoo/resources/bootstrap/dist/css/bootstrap.min.css',
		'funtoo/resources/font-awesome/css/font-awesome.min.css',
		'funtoo/resources/funtoo.css' => array( 'media' => 'screen' ),
		'funtoo/resources/print.css' => array( 'media' => 'print' ),
	),
    'remoteBasePath' => &$GLOBALS['wgStylePath'],
    'localBasePath'  => &$GLOBALS['wgStyleDirectory']
);
$wgResourceModules['skins.funtoo.js'] = array(
	'scripts' => array(
		'funtoo/resources/funtoo.js',
		'funtoo/resources/bootstrap/dist/js/bootstrap.min.js',
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);
