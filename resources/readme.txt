this is intended to take vanilla font awesome and vanilla bootstrap so we can do anything, and break nothing.
bootstrap-3.3.4
normalize-3.0.2
font-awesome-4.3.0
directories are renamed to normalize, bootstrap, and font-awesome.

styles and js can be added to the files funtoo.css funtoo.js & print.css for printer specific css.

under the hood, this skin is 99% of this:
https://www.mediawiki.org/wiki/Manual:Skinning

upstreams page's "2.2 Adding skin elements" section needs redone  for more information on how it needs redone see skinstructure.readme.txt

bootstrap comes with a theme.  to use it: edit /funtoo/funtoo.php 

change this line from this:
		'funtoo/resources/bootstrap/dist/css/bootstrap.min.css',
to this:
		'funtoo/resources/bootstrap/dist/css/bootstrap-theme.min.css',
