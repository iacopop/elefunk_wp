<?php
    
function mywebblog_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    
    <li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID() ?>">
    
        <div id="comment-<?php comment_ID(); ?>" class="clearfix">
            <div class="comment-author vcard">
                <?php echo get_avatar($comment,$size='72',$default='<path_to_url>' ); ?>
              </div>
            
            <div class="comment-text clearfix">
                
                <div class="clearfix">
                    <div class="reply alignright">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                    <h3 class="alignleft"><?php echo get_comment_author_link(); ?> on <?php echo get_comment_date(); ?></h3>
                </div>
                
                <?php if ($comment->comment_approved == '0') : ?>
                    <p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
                <?php endif; ?>
    
                <?php comment_text() ?>
    
            </div>
        </div>
<?php
}
