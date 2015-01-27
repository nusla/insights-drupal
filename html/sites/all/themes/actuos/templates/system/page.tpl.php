<div class="container">
	<div class="row">
		<div class="col-md-3" id="left-panel">
		  	<div class="row">
				<?php if ($logo): ?>
					<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
						<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
					</a>
				<?php endif; ?>
			</div>
			<div class="row">Portfolio manager</div>
			<div class="row input-group">
				<span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control" type="text" placeholder="Search">
			</div>
			<div class="row">
				<?php print render($main_menu); ?>
			</div>
		</div>
	  <div class="col-md-9"><?php print $messages; ?><?php print render($page['content']); ?></div>
	</div>
</div>

