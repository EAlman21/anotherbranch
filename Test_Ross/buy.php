<?php 
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
?>
  <!-- Content of page -->
  <div class="col-md-9 col-sm-9 col-xs-12" >
    <div class= "panel panel-primary">
      <div class="panel-heading">
       <h3> Ready for a new book? Buy it today!</h3>
      </div>
  	  <!--
	  <li class="list-group-item">
        <p>
          |<a href="">Science-Fiction</a>
          |<a href="">Non-Fiction</a>
          |<a href="">Romantic</a>
          |<a href="">Adventure</a> 
        </p>
  	  </li>
	  -->
  	  <li class="list-group-item">
	    <div class="row">
<?php
$books_table = mysql_query("select * from books");
while ($row = mysql_fetch_array($books_table, MYSQL_NUM) )
{
?>
			<div class="col-md-3 col-sm-3"> <!--this is the size of the box of the image--> 
				<a href="bookpage.php" class="thumbnail">
					<img src="image/rec_book1.png"  height = "150px" width = "150px"> <!--get image and size-->
						<span><?php echo $row[2];?></span><br><!--this is meant to type the author's name--> 
					<span class="text-muted"><?php echo $row[3];?></span> <!-- this is for genre etc.--> 
				</a>
			</div>
			
<?php
}
?>
        </div>   
	</li>

		  </tbody>
		</table>
  	  </li>
      <br>
    </div>
	  <?php include 'includes/widgets/topRating.php';?>
  </div> 
  <div class="col-md-3 col-sm-3 col-xs-12">
  	<?php include 'includes/widgets/side_recommendation.php';?>
  </div> 

<?php include 'includes/overall/footer.php';?>