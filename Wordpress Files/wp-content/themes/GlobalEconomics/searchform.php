<?php $sq = get_search_query() ? get_search_query() : 'Enter search terms&hellip;'; ?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>" class="search">
	<fieldset>
		<div class="row">
			<input type="text" name="s" class="text" value="Search" />
			<input type="submit" value="search" class="btn" />
		</div>
	</fieldset>
</form>