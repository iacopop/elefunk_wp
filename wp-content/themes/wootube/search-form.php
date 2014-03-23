<div id="search_main" class="block">
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
        <div>
        <input type="text" class="field" name="s" id="s"  value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" />
        <input type="hidden" class="submit" name="submit" />
        </div>
    </form>
</div>
