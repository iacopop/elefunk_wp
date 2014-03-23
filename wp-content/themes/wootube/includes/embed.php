<?php if (get_option('woo_embed') == "true") { ?>
<div id="embed">
    <h3>Embed</h3>
    <textarea cols="10" name="embed" onclick="this.select()" onfocus="this.select()"><?php echo htmlentities(get_post_meta($post->ID, "embed", true)); ?></textarea>
    <div class="fix"></div>
</div>	
<?php } ?>