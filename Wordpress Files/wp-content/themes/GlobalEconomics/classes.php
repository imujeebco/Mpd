<?php 
class Walker_Custom_Menu extends Walker {
	var $tree_type = array( 'post_type', 'taxonomy', 'custom' );
	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}

	function end_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		
		$item_output .= '<a'. $attributes . '>';
		if($depth==1):
			$item_output .= $args->link_before .'<span>'.apply_filters( 'the_title', $item->title, $item->ID ) .'</span>'. $args->link_after;
		else:
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		endif; 

		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el(&$output, $item, $depth) {
		$output .= "</li>\n";
	}
}
/*
**
*/
function theme_get_search_form(){
?>
	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>" class="search-form">
		<fieldset>
			<div class="row">
				<label for="specialty">By Specialty</label>
				<select id="specialty" onchange="document.location.href=this.options[this.selectedIndex].value;">
					<option title="title" value="#">Select</option>
					<?php $_parent = get_term_by('name','Experts', 'experts-category'); ?>
					<?php $terms = get_terms('experts-category','hide_empty=&child_of='.$_parent->term_id); ?> 
					<?php foreach($terms as $term): ?>
						<option <?php if($_REQUEST['experts-category'] ==  $term->slug) echo 'value="#" selected="selected"'; else echo 'value="'.get_term_link($term,'experts-category').'"'; ?>><?php echo $term->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="row">
				<label for="name">By Name</label>
				<select id="name" onchange="document.location.href=this.options[this.selectedIndex].value;">
					<option title="title" value="#">Select</option>
					<?php query_posts('post_type=experts&post_status=publish&posts_per_page=-1'); while(have_posts()): the_post(); global $post;?>
						<option <?php if($_REQUEST['experts'] ==  $post->post_name) echo 'value="#" selected="selected"'; else echo 'value="'. get_permalink() . '"'; ?>><?php the_title(); ?></option>
					<?php endwhile; wp_reset_query(); ?> 
				</select>
			</div>
			<div class="row">
				<label for="search">By Keyword</label>
				<div class="input-box">
					<input type="text" id="search" value="Search" name="s" class="text" />
					<input type="hidden" name="exp" value="1" />
					<input type="submit" value="search" class="btn" />
				</div>
			</div>
		</fieldset>
	</form>
<?php
}
?>