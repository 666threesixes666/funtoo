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

<!--user message new talk-->
<?php $this->html( 'newtalk' ); ?>

<?php if ( $this->data['newtalk'] ) { ?>
<div class="usermessage"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
<?php $this->html( 'newtalk' );?>
</div>
<?php } ?>

<!--site notice-->
<?php $this->html( 'sitenotice' ); ?>

<?php if ( $this->data['sitenotice'] ) { ?>
<div id="siteNotice"> <!-- The CSS class used in Monobook and Vector, if you want to follow a similar design -->
<?php $this->html( 'sitenotice' ); ?>
</div>
<?php } ?>

<!--site name-->
<?php $this->text( 'sitename' ); ?>

<!--logo and main page link-->

<a
	href="<?php echo htmlspecialchars( $this->data['nav_urls']['mainpage']['href'] ) ?>"
	<?php echo Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( 'p-logo' ) ) ?>
>
	<img
		src="<?php $this->text( 'logopath' ) ?>"
		alt="<?php $this->text( 'sitename' ) ?>"
	/>
</a>

<!--title-->

<?php $this->html( 'title' ); ?>

<h1 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ) ?></h1>

<?php if ( !empty( $this->data['title'] ) ) { ?>
<h1 id="firstHeading" class="firstHeading"><?php $this->html( 'title' ) ?></h1>
<?php } ?>

<!--body content-->
<h1>derp fuck you</h1>
<?php $this->html( 'bodytext' ) ?>
<div id="bodyContent" class="mw-body-content">
<div id="content">
<div id="bodyContent">
<div class="mw-body">
<h1> end of derp fuck you</h1>
<!--tagline-->
<?php $this->msg( 'tagline' ); ?>
<div id="siteSub"><?php $this->msg( 'tagline' ); ?></div>
<?php if ( $this->data['isarticle'] ) { ?>...<?php } ?>

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

<!--body text-->
<?php $this->html( 'bodytext' ) ?>

<!--categories-->
<?php $this->html( 'catlinks' ); ?>

<!-- data after content-->

<?php $this->html( 'dataAfterContent' ); ?>

<!--personal tools-->

<ul>
<?php
	foreach ( $this->getPersonalTools() as $key => $item ) {
		echo $this->makeListItem( $key, $item );
	}
?>
</ul>

<!--content actions-->

<ul>
<?php
	foreach ( $this->data['content_navigation']['namespaces'] as $key => $tab ) {
		echo $this->makeListItem( $key, $tab );
	}
?>
</ul>

<?php foreach ( $this->data['content_navigation'] as $category => $tabs ) { ?>
<ul>
<?php
	foreach ( $tabs as $key => $tab ) {
		echo $this->makeListItem( $key, $tab );
	}
?>
</ul>
<?php } ?>

<ul>
<?php
	foreach ( $this->data['content_navigation'] as $category => $tabs ) {
		foreach ( $tabs as $key => $tab ) {
			echo $this->makeListItem( $key, $tab );
		}
	}
?>
</ul>

<ul>
<?php
	foreach ( $this->data['content_actions'] as $key => $tab ) {
		echo $this->makeListItem( $key, $tab );
	}
?>
</ul>

<!--sidebar-->
<?php
foreach ( $this->getSidebar() as $boxName => $box ) { ?>
<div id="<?php echo Sanitizer::escapeId( $box['id'] ) ?>"<?php echo Linker::tooltip( $box['id'] ) ?>>
	<h5><?php echo htmlspecialchars( $box['header'] ); ?></h5>
<?php
	if ( is_array( $box['content'] ) ) { ?>
	<ul>
<?php
		foreach ( $box['content'] as $key => $item ) {
			echo $this->makeListItem( $key, $item );
		}
?>
	</ul>
<?php
	} else {
		echo $box['content'];
	}
} ?>

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

<!--toolbox-->
<ul>
<?php
	foreach ( $this->getToolbox() as $key => $tbitem ) {
		echo $this->makeListItem( $key, $tbitem );
	}
	wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this ) );
?>
</ul>

<!--search-->

<form action="<?php $this->text( 'wgScript' ); ?>">
	<input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
<?php echo $this->makeSearchInput( array( 'id' => 'searchInput' ) ); ?>
<?php echo $this->makeSearchButton( 'go' ); ?>
</form>

<!--footer links flat array-->

<ul>
<?php foreach ( $this->getFooterLinks( 'flat' ) as $key ) { ?>
	<li><?php $this->html( $key ) ?></li>
 
<?php } ?>
</ul>

<!--footer links--
<?php
foreach ( $this->getFooterLinks() as $category => $links ) { ?>
<ul>
<?php
	foreach ( $links as $key ) { ?>
	<li><?php $this->html( $key ) ?></li>
 
<?php
	} ?>
</ul>
<?php
} ?>-->

<!--footer icons-->
<ul>
<?php
	foreach ( $this->getFooterIcons( 'icononly' ) as $blockName => $footerIcons ) { ?>
	<li>
<?php
		foreach ( $footerIcons as $icon ) {
			echo $this->getSkin()->makeFooterIcon( $icon );
		}
?>
	</li>
<?php
	} ?>
</ul>

<!--end of your fun stuff-->

<?php $this->printTrail(); ?>
</body>
</html><?php
	}
}
