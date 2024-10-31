<?php
/*
Plugin Name:category widget w/ thumbnail
Plugin URI: http://wordpress.org/extend/plugins/related-post-by-cat/
Description:Returns a list of the related Post n same category. 
Author: Gaurav Kumar|Bonnier Corporation
Version: 1
Author URI:http://www.linkedin.com/in/gkumar25 
*/

global $cat, $cat_query, $title;

function related_by_cat_widget($args) {
 
        extract($args);
        $options = get_option("related_by_cat_widget_options");
        $title=$options['title'];
        $cat=$options['cat'];
        get_post_by_cat($cat,$title);
 }



function related_by_cat_widget_control()
    {
        //Just about everything in WordPress is saved in options
        $options = get_option('related_by_cat_widget_options');
        if (!is_array($options))
        {
            $options = array('title'=>'Tilte','cat'=>'Category');
            update_option('related_by_cat_widget_options', $options);
        }
        //If the form is saving then store the new values in
        //widgets options array
        if ($_POST['related_by_cat_widget_pb'])
        {
           
            $options['title'] = strip_tags(stripslashes($_POST['related_by_cat_widget_title']));
            $options['cat'] = strip_tags(stripslashes($_POST['related_by_cat_widget_cat']));
            update_option('related_by_cat_widget_options', $options);
        }
            
        $title = htmlspecialchars($options['title'], ENT_QUOTES);
        $cat = htmlspecialchars($options['cat'], ENT_QUOTES);  
            
        echo '<p style="text-align:left;"><label for="related_by_cat_widget_title">Title:<br/> <input style="width: 200px;" id="related_by_cat_widget_title" name="related_by_cat_widget_title" type="text" value="'.$title.'" /></label></p>';


        echo '<p style="text-align:left;"><label for="related_by_cat_widget_cat">Category:<br/> <input style="width: 200px;" id="related_by_cat_widget_cat" name="related_by_cat_widget_cat" type="text" value="'.$cat.'" /></label></p>';   

        echo '<input type="hidden" id="related_by_cat_widget_pb" name="related_by_cat_widget_pb" value="1" />';
 }



function init_related_by_cat(){
	register_sidebar_widget("category widget w/ thumbnail", "related_by_cat_widget");
        register_widget_control("category widget w/ thumbnail", "related_by_cat_widget_control");
}
add_action("plugins_loaded", "init_related_by_cat");

   function get_post_by_cat($cat,$title)
    {
        $cat_id= get_cat_ID($cat);    
        $cat_query='cat='.$cat_id.'';        
        query_posts($cat_query);
        show_post_by_cat($title);    
     }  

function show_post_by_cat($title){
    include('related-post-by-cat-layout.php'); 
  }
?>
