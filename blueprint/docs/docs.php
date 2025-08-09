<?php

#####################################################
##### BLUEPRINT - THEME DOCUMENTATION 
#####################################################

function blueprint_add_docs_page () {

	add_submenu_page( 'option_tree', 'Village Documentation', 'Documentation', 'level_8', 'blueprint_init_docs_page', 'blueprint_init_docs_page' );

}

#####################################################
##### BLUEPRINT - SIDEBARS PAGE CONFIG
#####################################################

function blueprint_init_docs_page () {

if (!defined('OT_VERSION')) exit('No direct script access allowed'); 

?>

<div id="framework_wrap" class="wrap">

	<div id="header">
    <h3>Documentation</h3>
    <span class="icon">&nbsp;</span>
    <div class="version">
      <?php echo OT_VERSION; ?>
    </div>
	</div>
  
  <div id="content_wrap">
            
    <div id="content">
      <div id="options_tabs">
        <ul class="options_tabs">
          <li><a href="#creating_menu">Creating the Main Menu</a><span></span></li>
          <li><a href="#setting_up_homepage">Setting Up the Homepage</a><span></span></li>
          <li><a href="#slideshows">Slideshows</a><span></span></li>
          <li><a href="#galleries">Galleries</a><span></span></li>
          <li><a href="#portfolio_items">Portfolios</a><span></span></li>
          <li><a href="#wall_items">Walls</a><span></span></li>
          <li><a href="#backgrounds">Backgrounds</a><span></span></li>
          <li><a href="#adding_a_sidebar">Sidebars</a><span></span></li>
          <li><a href="#shortcodes">Shortcodes</a><span></span></li>
          <li><a href="#contact_form">Contact</a><span></span></li>
        </ul>
                 
        <div id="setting_up_homepage" class="block has-table">
          <form method="post" action="admin.php?page=blueprint_init_sidebars_page">
            <h2>Setting Up The Homepage</h2>

            <h3>Setting Up The Homepage</h3>
			<iframe src="http://player.vimeo.com/video/23123192?byline=0&amp;portrait=0" width="590" height="425" frameborder="0"></iframe>           
          
          </form> 
        </div>
                
        <div id="creating_menu" class="block">
          <h2>Type The Name Of Your Sidebar & Press Remove Sidebar</h2>
          
          <h3>Creating The Main Menu</h3>
          
          To create the main menu you simply go to Appearance > Menus.
          
          You then create the menu you want.
          
          In the Theme Locations box in the top left of the Menus page set the Primary Navigation to the menu you have created.
         
        </div>
        
        <div id="slideshows" class="block">
          <h2>Click the button below to remove all custom sidebars</h2>

            <h3>Creating A Slideshow</h3>
          
		<iframe src="http://player.vimeo.com/video/23123362?byline=0&amp;portrait=0" width="590" height="425" frameborder="0"></iframe>          
          
        </div>

        <div id="portfolio_items" class="block">
          <h3>Portfolios</h3>
          
          Portfolio posts operate exactly the same as slides, but they have the post editor included. The options are also different for the portfolio items.
          
        </div>

        <div id="wall_items" class="block">
          <h2>Click the button below to remove all custom sidebars</h2>

          <h3>Creating A Wall</h3>
          
          <iframe src="http://player.vimeo.com/video/23122760?byline=0&amp;portrait=0" width="590" height="425" frameborder="0"></iframe>
          
        </div>

        <div id="adding_a_sidebar" class="block">
          <h2>Click the button below to remove all custom sidebars</h2>

          <h3>Creating A New Sidebar</h3>
          
          Too add a new custom sidebar simply go to Theme Options > Custom Sidebars. <br /><br />Then add the sidebar on the first panel. <br /><br />When your on a page/post/portfolio item scroll down to the page settings box and you will see you can select the sidebar you created from the dropdown box.
          
        </div>
        
        <div id="shortcodes" class="block">
          <h2>Adding a contact form is as easy this: When your creating or editing a page, select the Contact page. You can edit the contact form settings here.</h2>
         
          <h3>Using the Shortcode Generator</h3>

          <iframe src="http://player.vimeo.com/video/23124295?byline=0&amp;portrait=0" width="590" height="425" frameborder="0"></iframe>
          
        </div>        

        <div id="backgrounds" class="block">
          <h2>Adding a contact form is as easy this: When your creating or editing a page, select the Contact page. You can edit the contact form settings here.</h2>
          
          <h3>Backgrounds</h3>
        
          <iframe src="http://player.vimeo.com/video/23123247?byline=0&amp;portrait=0&amp;hd=1" width="590" height="425" frameborder="0"></iframe>
          
        </div>  
        
        <div id="galleries" class="block">
          <h2>This video will show you how to </h2>

            <h3>Galleries</h3>
          
          <iframe src="http://player.vimeo.com/video/27628731?byline=0&amp;portrait=0" width="590" height="425" frameborder="0"></iframe>
          
        </div>  

        <div id="contact_form" class="block">
        
          <h3>Creating a Contact Form</h3>

          Adding a contact form is as easy as this: When your creating or editing a page, select the Contact page template. You can edit the contact form settings <a href="<?php echo get_bloginfo('url')."/wp-admin/admin.php?page=option_tree#option_contact_form_settings"; ?>">here</a>.
                    
        </div>  
                                        
        <br class="clear" />
      </div>
    </div>
    <div class="info bottom">
      <input type="hidden" name="action" value="save" />
    </div>   
  </div>

</div>
<!-- [END] framework_wrap -->

<?php

}

add_action("admin_menu", "blueprint_add_docs_page");

?>