<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="text" />
<input type="submit" id="searchsubmit" value="Search" class="submit" />
</div>
</form>
