<div class="wrappa">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-3"></div>
			<div class="col-md-6 col-sm-6 logoholder hidden-xs">
				<img src="<?php print base_path() . drupal_get_path('theme', 'actuos'); ?>/assets/images/main_logo.png"
					class="actuos_logo bounceInDown">
			</div>
			<div class="col-md-3 col-sm-3"></div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3"></div>
			<div class="col-md-6 col-sm-6 loginform_holder bounceInRight">
				<div class="login-form-wrapper">
  					<?php print $login_content; ?>
				</div>
				<div class="clearfix"></div>
				<?php print $messages; ?>
			</div>
			<div class="col-md-3 col-sm-3"></div>
		</div>
		<!-- Row END -->

	</div>
</div>
