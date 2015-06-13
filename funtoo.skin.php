<?php
/**
 * Skin file for skin funtoo.
 *
 * @file
 * @ingroup Skins
 */
/**
 * SkinTemplate class for funtoo skin
 * @ingroup Skins
 */
class Skinfuntoo extends SkinTemplate {
	var $skinname = 'funtoo', $stylename = 'funtoo',
		$template = 'funtooTemplate', $useHeadElement = true;
 
	/**
	 * Add JavaScript via ResourceLoader
	 *
	 * Uncomment this function if your skin has a JS file or files.
	 * Otherwise you won't need this function and you can safely delete it.
	 *
	 * @param OutputPage $out
	 */
	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
		$out->addModules( 'skins.funtoo.js' );
	}
 
	/**
	 * Add CSS via ResourceLoader
	 *
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
			'mediawiki.skinning.interface', 'skins.funtoo'
		) );
	}
}
/**
 * BaseTemplate class for Foo Bar skin
 *
 * @ingroup Skins
 */
class funtooTemplate extends BaseTemplate {
	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {
		$this->html( 'headelement' ); ?>
<!--your fun stuff-->

<article>
<!--page title-->
<?php if ( !empty( $this->data['title'] ) ) { ?>
<h1 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ) ?></h1>
<?php } ?>
<!--end of page title-->

<!--brought to you by funtoo.org-->
<h1 class="coffeetin center">brought to you by funtoo.org</h1>

<!--user message new talk-->
<?php if ( $this->data['newtalk'] ) { ?>
<h3 class="newtalk">
<?php $this->html( 'newtalk' );?>
</h3>
<?php } ?>
<!--end of user message new talk-->

<!--body text-->
<?php $this->html( 'bodytext' ) ?>
<!--end of body text-->

<!--categories-->
<?php $this->html( 'catlinks' ); ?>
<!--end of categories-->
</article>

<!--data after content-->
<?php $this->html( 'dataAfterContent' ); ?>
<!--end of data after content-->

<!--language links-->
<?php
	// Language links are often not present, so this if-statement allows you to add a conditional <ul> around the language list
	if ( $this->data['language_urls'] ) {
		echo "<ul>";
		foreach ( $this->data['language_urls'] as $key => $langLink ) {
			echo $this->makeListItem( $key, $langLink );
		}
		echo "</ul>";
	} 
?>
<!--end of language links-->

<!--subtitles-->
<?php $this->html( 'subtitle' ); ?>
<?php $this->html( 'undelete' ); ?>
<?php if ( $this->data['subtitle'] ) { ?>
<div id="contentSub"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
<?php $this->html( 'subtitle' ); ?>
</div>
<?php } ?>
<?php if ( $this->data['undelete'] ) { ?>
<div id="contentSub2"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
<?php $this->html( 'undelete' ); ?>
</div>
<?php } ?>
<!--end of subtitles-->

<!--start of nav-->
<!--start of logo/minify menu button-->
<div class="nav fixed container-fluid nopad">
<nav class="navbar navbar-default shadow">
<!--properly terminated tags to end of logo/min-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-smile-o fa-2x"></i>
      </button>
<a class="navbar-brand"	href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] );	?>"	<?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>>
	<img class="logo" width="65" height="65" src="<?php 
		 		 $this->text( 'logopath' ); 	
		 		 // This outputs the path your logo's image
		 		 // You can also use  $this->data['logopath'] to output the raw URL of the image. Remember to HTML-escape if you're using this method, because the text() method does it automatically.
			?>"
		alt="<?php $this->text( 'sitename' ) ?>"
	/></a>
<!--<img src="<?php echo $this->getSkin()->getSkinStylePath( 'resources/images/funtoo.png'); 
?>" alt="logo" class="logo"></img></a>-->
</div>
<!--end of logo/minify menu button-->

 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav">
<!--start of sidebar-->
<li class="horiz">
<ul class="nav nav-pills navbar-nav">
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
     <i class="fa fa-wrench"></i> Site Tools<span class="caret"></span>
    </a>
<ul class="dropdown-menu" role="nav menu">
<?php
foreach ( $this->getSidebar() as $boxName => $box ) { ?>

<?php
	if ( is_array( $box['content'] ) ) { ?>
<?php
		foreach ( $box['content'] as $key => $item ) {
			echo $this->makeListItem( $key, $item );
		}
?>
<?php
	} else {
		echo $box['content'];
	}
} ?>
</ul>
</li>
</ul>
</li>
<!--end of sidebar-->

<!--start ofcontent actions-->
<li class="horiz">
<ul class="nav nav-pills navbar-nav">
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
     <i class="fa fa-newspaper-o"></i> Page Tools<span class="caret"></span>
    </a>
<ul class="dropdown-menu" role="menu">
<?php
	foreach ( $this->data['content_actions'] as $key => $tab ) {
		echo $this->makeListItem( $key, $tab );
	}
?>
</ul>
</li>
</ul>
</li>
<!--end of content actions-->

<!--start of user tools-->
<li class="horiz">
<ul class="nav nav-pills navbar-nav">
<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
     <i class="fa fa-user"></i> User Tools<span class="caret"></span>
    </a>
<ul class="dropdown-menu" role="nav menu">
<?php
	foreach ( $this->getPersonalTools() as $key => $item ) {
		echo $this->makeListItem( $key, $item );
	}
?>
</ul>
</li>
</ul>
</li>
<!--end of user tools-->

<!--start of search-->
<form class="navbar-form navbar-right" role="search" action="<?php $this->text( 'wgScript' ); ?>">
  <div class="input-group">
    <input type="hidden" name="title" class="" placeholder="Search" value="<?php $this->text( 'searchtitle' ) ?>"></input>
<?php echo $this->makeSearchInput( array( 'id' => 'searchInput', 'type' => 'text', 'class' => 'form-control' ) ); ?>

	<span class="input-group-btn">
  <button type="submit" class="btn btn-default"><i class="fa fa-binoculars"></i></button>
	</span>
  </div>
</form>
<!--end of search-->

</div>
</nav>
</div>

<footer>
<!--footer icons-->
<?php
	foreach ( $this->getFooterIcons( 'icononly' ) as $blockName => $footerIcons ) { ?>
	<div class="center">
<?php
		foreach ( $footerIcons as $icon ) {
			echo $this->getSkin()->makeFooterIcon( $icon );
		}
?>
	</div>
<?php
	} ?>

<!--footer links flat array-->
<div class="center">
<?php foreach ( $this->getFooterLinks( 'flat' ) as $key ) { ?>
<?php $this->html( $key ) ?>
 
<?php } ?>
</div>

</footer>
<!--end of your fun stuff-->

<div class="footbar center shadow fixed">
<ul>
<li class="horiz">
<a href="//www.funtoo.org/">wiki</a>
</li>
<li class="horiz">
<a href="//bugs.funtoo.org/">bugs</a>
</li>
<li class="horiz">
<a href="//forums.funtoo.org/">forums</a>
</li>
</ul>
</div>

<?php $this->printTrail(); ?>
</body>
</html><?php
	}
}
