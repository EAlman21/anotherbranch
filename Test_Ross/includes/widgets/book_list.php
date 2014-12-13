  <!-- Content of page -->
  <div class="col-md-12 col-xs-12 ">
    <div class= "panel panel-default">
      <div class="panel-heading">
       <h2><strong><em><?php $book_data['title']?></em></strong>(<-TODO)</h2>
		 <small>by <?php $book_data['author']; ?></small>
      </div>
	  <li class="list-group-item">
	  Rating: 
			<form action="" method="post"> 
				<label class="radio-inline">
				  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 1
				</label>
				<label class="radio-inline">
				  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 2
				</label>
				<label class="radio-inline">
				  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 3
				</label> 
				<label class="radio-inline">
				  <input type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option3"> 4
				</label>
				<label class="radio-inline">
				  <input type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option3"> 5
				</label>
				<button class="btn btn-sm btn-default pull-right" type="submit">Submit </button>
			</form>
	  </li>
	  <li class="list-group-item">
		Description: <?php echo $book_data['description'];?>
	  </li>
	  <li class="list-group-item">
		Price: <?php echo $book_data['price']; ?>
	  </li>
	  <li class="list-group-item">
		Condition: <?php echo $book_data['condition'];?>
	  </li>
	  <li class="list-group-item">
		<p class="text-right">
		<button action="" method="" class="btn btn-sm btn-danger" type="submit">Add <span class="glyphicon glyphicon-shopping-cart"> </span></button>
		<button action="" method="" class="btn btn-sm btn-primary" type="submit">Buy it</button>	  
		</p>
	  </li>
	  <li class="list-group-item">
		Comments for <?php echo $book_data['title']; ?> from user:<br>
		<?php echo $book_data['comments']; ?>
		</li>
	  <li class="list-group-item">
		Comment:
		<form action="" method="post">
			<textarea class="form-control" rows="3" placeholder="Free feel to leave your thought about this book."></textarea>
			<button class="btn btn-sm btn-default" type="submit">Submit </button>
		</form>
	  </li>
    </div>
  </div>