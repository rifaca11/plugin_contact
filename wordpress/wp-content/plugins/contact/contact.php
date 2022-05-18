<?php

/**
 * Plugin Name: contact_form
* Description: this is a contact plugin 
*/


add_action('admin_menu', 'admin_menu');

function admin_menu () {
    
	  add_menu_page("plugin_contact","plugin_contact","manage_options","PLUGIN_MENU","examplemenu","dashicons-shield",2 );
		add_submenu_page("PLUGIN_MENU","index","index","manage_options","PLUGIN_MENU","examplemenu");
		add_submenu_page("PLUGIN_MENU","General information","General information","manage_options","PLUGIN_SubMENU","Description_admin_page");
		
}


function Description_admin_page () {
  include_once('display.php');
}   

function  examplemenu() {
    include_once('index.php');
  }


  add_shortcode('example','examplemenu');


/*

            foreach($result as $res){

              '<tr>
              <td>' echo $res['id'] '</td>'
              '<td>' echo $res['username'] '</td>'
              '<td>' echo $res['fname'] '</td>'
              '<td>' echo $res['email'] '</td>'
              '<td>'  echo $res['subjecte'] '</td>'
              '<td>' echo $res['message'] '</td>'
        '</tr>'

            } 

'</table>';
}

*/ 