<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->


    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar-mobile" class="nav-collapse visible-xs">
        	<div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
        	
        </div>
        <div id="sidebar"  class="nav-collapse hidden-xs">
            <!-- sidebar menu start-->

                <div class="centered"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" class="dashlogo center-block img-responsive"></a></div>
                <h5 class="centered portfolio_m">Portfolio Manager</h5>
				<div class="input-group search">
					<span class="input-group-addon search-field-container"><i class="fa fa-search"></i></span><input id="search-field" class="form-control" type="text" placeholder="Search">
				</div>
                <h3 class="menu_ttl">Main</h3>
                <?php print render($main_menu); ?>
               
           
                <h3 class="menu_ttl">System</h3>
            
            
            <?php print render($user_menu); ?>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
          <section class="sub-wrapper">

            <!--header start-->
            <header class="header <?php print $page_color; ?>-bg">

                <section class="leftarea">
                    <i class="fa header_icon <?php print $header_icon; ?>"></i>
                    <h3 class="header_ttl"><?php print $title; ?></h3>
                </section>

                <section class="ritearea">
                    <h3 class="header_subttl hidden-xs">Actuos Portfolio Insights</h3>
                </section>

            </header>
            <!--header end-->

            <nav class="navbar navbar-default navbar-left dashnav">
                   
                    <ul class="nav submenu <?php print $page_color; ?>menu">
                   
                         <?php print render($submenu); ?>
                    </ul>
                   
            </nav>

			<div class="content-dashboard"><?php print $messages; ?><?php print render($page['content']); ?>
			
		
			</div>         

          </section>
        </section>
    </section>
</section>
<script>
jQuery( document ).ready(function() {
	jQuery("#sidebar").css({"margin-top": "-" + jQuery("body").css("padding-top"), "padding-top": jQuery("body").css("padding-top")});
	jQuery("#sidebar").niceScroll({styler:"fb",cursorcolor:"#4ECDC4", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: ''});
});


</script>