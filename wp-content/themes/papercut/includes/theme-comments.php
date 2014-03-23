<?php

// Custom comment loop
function custom_comment($comment, $args, $depth) {	
       $GLOBALS['comment'] = $comment; ?>

<li id="comment-<?php comment_ID() ?>" class="clearfix">
    <div class="comment-author">
        <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?><br /><br />
        <p><a href="<?php comment_author_url(); ?>">Visit My Website</a></p>
        <p><?php comment_date('F j, Y') ?></p>
        <p><a href="#comment-<?php comment_ID() ?>" title="">Permalink</a></p>
    </div>
    <div class="comment-text<?php echo $oddcomment; ?>">
        <?php if ($comment->comment_approved == '0') : ?>
            <p><em class="bold georgia">Your comment is awaiting moderation.</em></p>
        <?php endif; ?>
        <p class="large verdana bold pink block"><?php comment_author(); ?> <span class="light">said:</span></p><br />
        <?php comment_text() ?>
	    <?php echo comment_reply_link(array('before' => '<span class="reply" style="font-weight:normal">', 'after' => '</span>', 'reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ));  ?>

   </div>

<?php $oddcomment = ( empty( $oddcomment ) ) ? '-alt' : '';	?>   
         
<?php } ?>