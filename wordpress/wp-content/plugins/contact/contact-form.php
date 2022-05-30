<?php
/**
 * Plugin Name: Contact Form
 * Description: Just another contact form plugin. Simple but flexible.
 * Author: koala
 * Version: 0.1
 */

    // global $wpdb;

    function btp_styles() {
        wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
    }
    add_action('wp_enqueue_scripts', 'btp_styles');

    //creation de la table en data base
    register_activation_hook(__FILE__,'create_table');

    function create_table(){

        $connection = mysqli_connect('localhost','root','');
        mysqli_select_db($connection,"plugin");

        $query = "CREATE TABLE wp_contact_form(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, first_name varchar(255) NULL, last_name varchar(255) NULL, email varchar(55) NULL, phone varchar(15) NULL, subject varchar(55) NULL, message varchar(255) NULL)";
        // $result = $wpdb->query($query);
        $result = mysqli_query($connection, $query);
        return $result;
    }
    //creation de la table en data base
    register_deactivation_hook(__FILE__,'drop_table');
    
    function drop_table(){

        $connection = mysqli_connect('localhost','root','');
        mysqli_select_db($connection,"plugin");

        $query = "DROP TABLE `wp_contact_form`";
        // $result = $wpdb->query($query);
        $result = mysqli_query($connection, $query);
        return $result;
    }

     function contact_form()
     {
        include_once('formDesign.php');
     }
     
     add_shortcode('contact_form_all','contact_form');
    function admin_dashboard(){
        add_menu_page('forms','Contact','manage_options','contact-dashboard','dashboard_admin_contact','dashicons-email',4);
    }

    add_action('admin_menu','admin_dashboard');
    
    function dashboard_admin_contact(){
        // require_once('dash_Plugin.php');
        require_once('Setting.php');
    }




?>