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
	'url' => 'https://github.com/666threesixes666',
	'author' => '[https://github.com/666threesixes666 666threesixes666]',
	'descriptionmsg' => 'funtoo-desc',
	'license' => 'GPL-2.0+',
);
$wgValidSkinNames['funtoo'] = 'funtoo';
 
$wgAutoloadClasses['Skinfuntoo'] = __DIR__ . '/funtoo.skin.php';
$wgMessagesDirs['funtoo'] = __DIR__ . '/i18n';
$wgResourceModules['funtoo'] = array(
	'styles' => array(
		'resources/funtoo.css' => array( 'media' => 'screen' ),
		'resources/print.css' => array( 'media' => 'print' ),
	),
	'remoteSkinPath' => 'funtoo',
	'localBasePath' => __DIR__,
);
