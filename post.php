<?php include 'inc/header.php'; ?>

 <?php
 
 if (!isset($_GET['id'])||$_GET['id']==NULL) {

 	header("Location: 404.php");
 }else
 {
 	$id=$_GET['id'];
 }

 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

			    <?php
                 $query="select * from tbl_post where id=$id";
                 $post= $db->select($query);
                 if($post)
                 {
                 	while($result=$post->fetch_assoc())
                 	{
			    ?>
                <!--TITLE-->
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
				<!--TITLE-->

                 <!--DATE-->
				<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
                 <!--DATE-->
                  
                  <!--IMAGES-->
				 <a href="#"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a> 
                  <!--IMAGES-->

                  <!--BODY-->
				  <?php echo $result['body']; ?>
                  <!--BODY--> 
				
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php

                     $catid =  $result['cat_id'];

                     $queryrel="select * from tbl_post where id= '$catid' order by rand() limit 6";
                     $relpost= $db->select($queryrel);
                    if($relpost)
                      {
                 	    while($relresult=$relpost->fetch_assoc())
                 	{

					?>
					<a href="post.php?id=<?php echo $relresult['id']; ?>">

					<img src="admin/upload/<?php echo $relresult['image'];?>" alt="post image"/>

					</a>

					<?php } } else{ echo "No Related Post Available";}?>

				</div>
				<?php  } } else { header("Location:404.php"); } ?>
	</div>
	</div>

        <?php include 'inc/sidebar.php'; ?>
		<?php include 'inc/footer.php'; ?>