<div class="module">
	<h2 class="module-title">Search</h2>
	
	<form method="get" id="search" action="<?php bloginfo('url'); ?>">
		<label for="keywords">Search:</label>
		<input type="text" name="s" value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}"id="keywords" />
		<input type="submit" value="Search the site &raquo;" />
	</form>
</div><!-- end module -->