<style type="text/css">

.related_article {
float:left;
overflow:hidden;
padding:15px 10px 20px;
width:320px;
}


.related_article_left {
float:left;
width:75px;
}

#related_article_left img.hi {
width: 50px;
}

.related_article_right {

float:right;
text-align:left;
width:212px;
}

.related_article_right a{

font-size:16px;
color:#2A88B2;
text-decoration:none;
}


h2.related_article_right{

font-weight:normal;
}

.related_article p {
display:block;
font-size:12px;
line-height:17px;
padding-bottom:10px;
margin-top:5px;
}


.related_article_left img {
width:95px;

}


.related_article_right ul.article_info li {
-moz-background-clip:border;
-moz-background-inline-policy:continuous;
-moz-background-origin:padding;
background:transparent none repeat scroll 0 0;
list-style-image:none;
list-style-position:outside;
list-style-type:none;
font-size:10px;
}


#related_article h3{
font-weight: normal;
line-height: 90%;
}

#related_article h4{
margin-top: 10px;
margin-bottom: 10px;
}



</style>

 <div class="widget">

     <div class="widget-title">
 
         <h2 class="h1"><?php echo $title; ?> </h2>

     </div>

 <div class="content-widget"> 


<?php

global $user_ID, $wpdb, $post, $current_category;
        $url = get_option('siteurl');
        $magazine = get_mag($url);
        $thePostID = $post->ID;
        $order = "&orderby=post_date";
        $showposts = get_option('trans_other_entries');
	$counter=0;
 
	while(have_posts()) : the_post();  $do_not_duplicate = $post->ID;
	$authorID = $post->post_author;

        if($counter<7 && $thePostID !=$post->ID){

?>
	
  	<div class="related_article"> 
           
        	<div class="related_article_left">
            
    			<div class="img">	<a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_image("thumbnail","hi");?></a></div>
            
          
                          </div>
                <div class="related_article_right">
                                    
                <h2 class="title">
                       
                            <a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                      
                </h2> 
                 
           
                    <ul class="article_info">
                    <li class="first">
                                        <?php the_time('Y/m/d'); ?> 
                                        <?php comments_number('',' | 1 comment', ' | % comments'); ?>
                    </li>
                </ul>

    
           </div>
           
			
		</div><!--/article-->

     <?php $counter++;
                } ?>


	<?php endwhile; ?>
   
      </div>

    </div>	
