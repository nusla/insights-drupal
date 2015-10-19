<section id="container" >


<div class="row">
	<div class="container">
	  <div class="row">
		<div class="col-md-8 protfolio-title">PORTFOLIO INSIGHTS TOOL</div>
		<div class="col-md-4 protfolio-logo"><img src="<?php print $logo; ?>" /></div>
  	  </div>
	</div>
</div>
<div class="row main-menu-container">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<?php print render($main_menu); ?>
			<?php print render($user_menu); ?>
			<div class="menu-pipe"></div>
		  </div>
		</div>
	</div>
</div>
<div class="row sub-menu-container">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
			<?php print render($submenu); ?>
		</div>
  	  </div>
	</div>
</div>
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->



    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    
    <section id="main-content">
        <section class="wrapper">
          <section class="sub-wrapper">

          	<div class="row">
				<div class="container">
            		<div class="content-dashboard"><?php print $messages; ?><?php print render($page['content']); ?>
				</div>
			</div>
          </section>
        </section>
    </section>
</section>
