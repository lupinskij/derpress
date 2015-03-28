<?php
	
	/* <<<< HELPERS >>>> */
	function mytheme_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <div class="comment-single comment-<?php comment_ID() ?>">
	      <p>"<?php echo get_comment_text() ?>"</p>

	      <div class="author">
	         <?php echo get_comment_author(); ?>
	      </div>

	      <?php if ($comment->comment_approved == '0') : ?>
	         <em><?php _e('Your comment is awaiting moderation.') ?></em>
	         <br />
	      <?php endif; ?>
	<?php }

	function new_excerpt_more( $excerpt ) {
		$cropped = str_replace( '[...]', '', $excerpt );
		return substr($cropped, 0, 369).' <a class="ellipse" href="'. get_permalink($post->ID) . '">...</a>';
	}

	function pagination($pages = '', $jump = false, $range = 1) {
		$showitems = ($range * 2)+1;  

		global $paged;
		if(empty($paged)) $paged = 1;

		if($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}   

		if(1 != $pages)	{
			echo "<div class='large-12 columns pagination'>";
				if ($jump === true) {
					if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='btn' href='".get_pagenum_link(1)."'>&laquo;</a>";
				}

				if($paged > 1 && $showitems < $pages) echo "<a class='btn left' href='".get_pagenum_link($paged - 1)."'><span class='text'>Previous Page</span><span class='less'><</span></a>";

				for ($i=1; $i <= $pages; $i++) {
					if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
						echo ($paged == $i)? "<span class='btn current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='btn inactive' >".$i."</a>";
					}
			 	}

			 	if ($paged < $pages && $showitems < $pages) echo "<a class='btn right' href='".get_pagenum_link($paged + 1)."'><span class='text'>Next Page</span><span class='less'>></span></a>";  
			 	
			 	if ($jump === true) {
			 		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='btn' href='".get_pagenum_link($pages)."'>&raquo;</a>";
			 	}
		 	echo "</div>\n";
		}
	}

	function to_slug($string){
	    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
	}

?>