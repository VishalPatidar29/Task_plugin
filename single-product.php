<?php 
// die("the single.php test casev3");
get_header();
?>


<div class="w3-container" style="padding:60px 16px" id="about">
<h2 ><?php the_title(); ?></h2>

<div class="w3-container" style="padding:5px 16px">
  <div class="leftcolumn">
    <div class="card">
   
    <h5><?php echo get_the_date(); ?></h5>
      <h2 ><?php  the_post_thumbnail(array(600,1000)); ?></h2>
      
    </div>
    </div>
    </div>
    <p><?php the_content(); ?></p>
    <?php comments_template(); ?>
    </div>



<?php 
get_footer();
?>