This is 666threesixes666' funtoo mediawiki skin.  It is designed to take vanilla normalize, vanilla font awesome, and vanilla bootstrap and implement them correctly within mediawiki.  This skin provides excellent examples of mobile friendly css, arbitrary fonts, background images, arbitrary font awesome icons, arbitrary css entries, and arbitrary javascript entries.

this is release 1.0 in the special version, but ignore that...  its really v0.1.1

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

another readme is to be found within the resources directory regarding development and further tweaking by hand.  


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

sometimes less is more, but not in this case..  MOAR IS MOAR...  (i dont know how to use git so i copy working ok paste then test on funtoo.php and funtoo.skin.php then copy and paste.  then edit more.  copy 1 is oldest revision, copy 2 is newest, and live will become copy 3.)
