<?php

function custom_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; 
   $auth_link = get_comment_author_link();
   if($auth_link !=''){
   $start = strpos($auth_link, "'");
   $end = strpos($auth_link, "'", $start + 1 );
   $before_gravatar = '<a href="'.substr($auth_link, $start + 1, $end-$start-1).'">'; $after_gravatar = '</a>';
   }   
   ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
     
     <div class="comment_wrap">
      
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php echo get_option_tree('setting_cmudmdrt'); ?></em>
         <br />
      <?php endif; ?>
      
   	  <div class="comment_left">
   	  
   	  <div class="comment_gravatar">
        
	  <?php echo $before_gravatar.get_avatar( $comment,  40).$after_gravatar; ?>      
      
      </div>
      	  
	  </div> 	  
	  
	  <div class="comment_right">
      
      <?php echo $auth_link; ?>
	  
	  <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo get_comment_date(); ?></a><?php edit_comment_link(__('(Edit)'),'  ',''); echo " &middot; "; comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?> </div>
	  
	  <div class="comment_body">
	  
      <?php comment_text(); ?>
     
      </div>
      
      </div>      
     	  
	  </div>
     </div>
<?php } ?>