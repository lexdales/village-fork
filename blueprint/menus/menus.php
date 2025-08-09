<?php

#####################################################
##### BLUEPRINT - MENUS 
#####################################################

global $blueprint_menu_array;

if ($blueprint_menu_array[0]) :

	foreach ($blueprint_menu_array as $menu_count => $menu) :
		
		register_nav_menu($menu["menu_location"], $menu["menu_name"]);
	
	endforeach;

endif;
