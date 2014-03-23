<form method="get" action="<?php bloginfo( 'url' ); ?>" class="clearfix" >
		<input type="text" id="s" name="s" value="Search..." onblur="if (this.value == '') {this.value = 'Search...';}"  onfocus="if (this.value == 'Search...') {this.value = '';}" />
		<input type="submit" id="go" value="Search" />
</form><!-- End search -->