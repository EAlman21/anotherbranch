<?php
 
$button = $_GET ['submit'];
$search = $_GET ['search'];
 
if(!$button)
	echo "you didn't submit a keyword";
else
{
	if(strlen($search)<=1)
		echo "Search term too short";
	else{
		echo "You searched for <b>$search</b> <hr size='1'></br>";
		mysql_connect('localhost','csc322','123') or die ($connect_error);
		mysql_select_db('csc322') or die ($connect_error);
		 
		$search_exploded = explode (" ", $search);
		 
		foreach($search_exploded as $search_each){
			$x++;
			if($x==1)
			$construct .="keywords LIKE '%$search_each%'";
			else
			$construct .="AND keywords LIKE '%$search_each%'";		 
		}
		 
		$construct ="SELECT * FROM books WHERE $construct";
		$run = mysql_query($construct);
		 
		$foundnum = mysql_num_rows($run);
		 
		if ($foundnum==0)
			echo "Sorry, there are no matching result for <b>$search</b>.</br></br>1.
			Try more general words. for example: If you want to search 'how to create a website'
			then use general keyword like 'create' 'website'</br>2. Try different words with similar
			meaning</br>3. Please check your spelling";
		else{
			echo "$foundnum results found !<p>";
			 
			while($runrows = mysql_fetch_assoc($run))
			{
				$title = $runrows ['title'];
				$author = $runrows ['author'];
				$genre = $runrows ['genre'];
				$price = $runrows ['price'];
				$book_condition = $runrows ['book_condition'];
				$book_cover = $runrows ['book_cover'];
				$rating = $runrows ['rating'];

				echo "
				<table><tr>
				<td><img ref='$book_cover'/></td>
				<td><p>'$title'</p></td>				
				<td><p>'$author'</p></td>				
				<td><p>'$genre'</p></td>				
				<td><p>'$price'</p></td>				
				<td><p>'$book_condition'</p></td>				
				<td><p>'$rating'</p></td>				
				</tr></table>
				";
			}
		}
	 
	}
}
 
?>