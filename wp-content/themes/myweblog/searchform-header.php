<form method="get" id="search" action="<?php bloginfo( 'url' ); ?>" class="clearfix" >
	<input type="text" id="s" name="s" value="Search..." onblur="if (this.value == '') {this.value = 'Search...';}"  onfocus="if (this.value == 'Search...') {this.value = '';}" />
	<input type="image" src="<?php bloginfo( 'template_directory' ); ?>/styles/<?php global $style_path; if($style_path == ''){echo 'default';}{echo $style_path;} ?>/search.gif" id="go" alt="Search" title="Search" />
</form><!-- End search -->