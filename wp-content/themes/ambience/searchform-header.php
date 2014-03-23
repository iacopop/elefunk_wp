<form method="get" id="header-search" action="<?php bloginfo('url'); ?>/">
	<input type="text" class="search-box" value="Search Keywords" onblur="if (this.value == '') {this.value = 'Search Keywords';}"  onfocus="if (this.value == 'Search Keywords') {this.value = '';}" name="s" id="s" />
	<input type="image" src="<?php bloginfo('template_directory'); ?>/styles/<?php global $style_path; echo $style_path; ?>/search-button.jpg" class="search-button" value="Search" />
</form>