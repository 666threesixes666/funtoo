This is 666threesixes666' funtoo mediawiki skin.  It is designed to take vanilla normalize, vanilla font awesome, and vanilla bootstrap and implement them correctly within mediawiki.  This skin provides excellent examples of mobile friendly css, arbitrary fonts, background images, arbitrary font awesome icons, arbitrary css entries, print exclusion css entries, and arbitrary javascript entries.

to install add to your wiki's LocalSettings.php
mediawiki v 1.25 and greater:
require_once( "$IP/skins/FooBar/funtoo.php" );
mediawiki less than v 1.25:
require_once "$IP/skins/funtoo/funtoo.php";

navigate to example.com/wiki/Special:Version

to activate the skin temporarily:
example.com/wiki/Main_Page?useskin=funtoo

to activate the skin permenently, edit your wiki's LocalSettings.php:
$wgDefaultSkin = "funtoo";

to add powerd by funtoo, add this to LocalSettings.php:  (notice please only use this if you're running the operating system from funtoo.org)
$wgFooterIcons['poweredby']['funtoo'] = array(
	'src' => "$wgStylePath/funtoo/resources/images/funtoopowered.png",
	'url' => '//www.funtoo.org/',
	'alt' => 'Powered by funtoo',
);

to have the funtoo logo be your brand add this to LocalSettings.php:
$wgLogo = $wgScriptPath . "/skins/funtoo/resources/images/funtoosquare.png";

another readme is to be found within the resources directory regarding development and further tweaking by hand.  to remove "brought to you by funtoo.org" delete lines 61 & 62 from funtoo.skin.php
to remove the bottom bar funtoo infra links, remove lines 248-260


my development environment to produce this skin was:
server side:
funtoo linux
mariadb
php-fpm
xcache
tengine
nginx was installed but not used to dev
client side:
firefox
browser cache driven down to zero, local files purged, so elements show changes immediately, and firefox has good mobile development tiny sizes.  firebug plugin used to decypher css elements.
