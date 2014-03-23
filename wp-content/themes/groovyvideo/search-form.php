<form id="topSearch" class="search" method="get" action="<?php bloginfo('url'); ?>">
    <p class="fields">
        <input type="text" value="search" name="s" id="s" onfocus="if (this.value == 'search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'search';}" />
        <button class="replace" type="submit" name="submit"></button>
    </p>
</form>
