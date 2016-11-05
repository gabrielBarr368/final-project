<!--
Gabriel Barr
Last Modified: Tuesday, November 12th, 2013
Purpose: The purpose of this page is to display the text of the American law that the user requested
Algorithm: Accepts the law id of the requested Australian law and queries the database to get the corresponding text of the law
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

	<head>
	
		<title>American Text Query </title>
		
		<link href="css/horizontal_menu.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript">
				
			function find(searchName)  //Retrieves the search term that the user typed in and sends it to the php script that performs the search
			{
				searchString = document.getElementById(searchName).value;
				window.location = "search.php?q=" + searchString;
			}
			
		</script>
		
	</head>
	
	<body>
	
			<p> <div id="navbar">  <!--provides links to all of the pages on this website-->
			<ul>
				<li style="width:50px"><a href="home.htm">Home</a></li>
				<li style="width:100px"><a href="compareLaw.htm">Compare Laws</a></li>
				<li><a href="americanLaw.htm">List of American Federal Computer Laws</a></li>
				<li><a href="australianLaw.htm">List of Australian Federal Computer Laws</a></li>
				<li style="width:65"><a href="glossary.htm">Glossary<br /></a></li>
				<li style="width:70"><a href="feedback.htm">Feedback<br /></a></li>
				<li style="width:250px">
					<a>
						<select name="tags" id="Search">
							<option value=" " selected="selected">Categories</option>
							<option value="strict liability" onmouseup ="find('Search')">Strict Liability</option>
							<option value="absolute liability" onmouseup ="find('Search')">Absolute Liability</option> 
							<option value="fine" onmouseup ="find('Search')">Fine</option>
							<option value="imprisonment" onmouseup ="find('Search')">Imprisonment </option>
							<option value="knowingly" onmouseup ="find('Search')">Knowingly</option>
							<option value="intentionally" onmouseup ="find('Search')">Intentionally</option> 
							<option value="recklessly" onmouseup ="find('Search')">Recklessly</option>
							<option value="fraud" onmouseup ="find('Search')">Fraud </option>
							<option value="child pornography" onmouseup ="find('Search')">Child Pornography</option>
							<option value="protected computer" onmouseup ="find('Search')">Protected Computer</option>
							<option value="commonwealth computer" onmouseup ="find('Search')">Commonwealth Computer </option>
							<option value="authorization" onmouseup ="find('Search')">Authorization </option>
							<option value="authorized" onmouseup ="find('Search')">Authorized</option>
							<option value="unauthorised" onmouseup ="find('Search')">Authorised</option> 
							<option value="damage" onmouseup ="find('Search')">Damage</option>
							<option value="foreign commerce" onmouseup ="find('Search')">Foreign Commerce</option> 
							<option value="investigate" onmouseup ="find('Search')">Investigate</option>
							<option value="possession" onmouseup ="find('Search')">Possession</option>
						</select>
					</a>
				</li>
				<li style="width:800px"><a><input type="text" id="Search2" size="25" onKeyPress="return submitenter(this,event)" /> <input type="button" value="Search" onclick = "find('Search2')" /></a></li>
			</ul>
		</div></p>
		
	 <p> <div id="navbar">  <!--provides links to other relevant websites-->
			<ul>
				<li style="width:170px; display:block; font-size:12px; color:#ffc100; height:30px; border:1px solid #000000; border-width:1px 0 1px 1px; background:#630063; padding-left:10px; line-height:29px; font-weight:bold;">List of other relevant sites.</li>
				<li style="width:40px"><a href="http://www.fbi.gov/">FBI</a>
					<ul>
						<li><a href="http://www.fbi.gov/">The FBI, or the Federal Bureau of Information, is the main federal police force in America.  They are responsible for investigating most federal crimes</a></li>
					</ul>
				<li style="width:100px"><a href="http://www.secretservice.gov/">Secret Service</a>
					<ul>
						<li><a href="http://www.secretservice.gov/">The Secret Service is responsible for protecting important federal officials as well as investigating fraud and counterfeiting.</a></li>
					</ul>
				<li style="width:80px"><a href="http://www.senate.gov/">US Senate</a>
					<ul>
						<li><a href="http://www.senate.gov/">One of the two parts of the legislative branch of the U.S. Government.  Along with the U. S. House of Representatives, the U. S. Senate is responsible for creating federal laws.</a></li>
					</ul>
				<li style="width:180px"><a href="http://www.house.gov/">US House of Representatives</a>
					<ul>
						<li><a  href="http://www.house.gov/">One of the two parts of the legislative branch of the U.S. Government.  Along with the U. S. Senate, the U. S. House of Representatives is responsible for creating federal laws.</a></li>
					</ul>
				<li style="width:210px"><a href="http://www.law.cornell.edu/">Cornell Legal Information Institute</a>
					<ul>
						<li><a href="http://www.law.cornell.edu/">Cornell University site that allows you to view most U. S. Federal laws.</a></li>
					</ul>
				<li style="width:40px"><a href="http://www.afp.gov.au/">AFP</a>
					<ul>
						<li><a href="http://www.afp.gov.au/">The Australian Federal police.  The AFP is responsible for enforcing most Australian Federal Laws.</a></li>
					</ul>
				<li style="width:140px"><a href="http://www.aph.gov.au/">Australian Parliament</a>
					<ul>
						<li><a href="http://www.aph.gov.au/">The branch of the Australian Government that creates all Australian Federal laws.</a></li>
					</ul>
				<li style="width:80px"><a href="http://www.comlaw.gov.au/">Com Law</a>
					<ul>
						<li><a href="http://www.comlaw.gov.au/">An Australian Federal Government Website that allows you to view any Australian Federal Law.</a></li>
					</ul>
			</ul>
		</div></p>
	
		<?php			
			//this section of code connects to the database
			$link = mysql_connect('localhost', 'root', 'ithacamysql') or die ('Could not connect: ' . mysql_error());
			mysql_query("USE ComputerLaws");

			$number = $_GET['q'];
			if ($number == 'all')  //if the user asked to see all section(\(*?\))s of one title, then show them all of them
			{
				echo ("<div  align='center'><b><h1> All relevant sections of Title 18</div></h1></b>");
				$text_query = 'SELECT americanLawName, textOfAmericanLaw FROM AmericanLaw WHERE americanLawID LIKE \'0102%\'';
				$text_result = mysql_query($text_query, $link) or die ('Query failed: ' . mysql_error());
				
				// get the next row from the result object.  The query will find every row in the table
				$row = mysql_fetch_row($text_result);
				// row has two items, the first is the law name, the second the law text
				while($row)
				{
				  $searchResult = $searchResult . "<hr><p><b>" . $row[0]. "</b></p>";
				  $searchResult = $searchResult . "<p>" . $row[1]. "</p>";
				  // get the next row from the query result
				  $row = mysql_fetch_row($text_result);
				}
			}
			
			if ($number == 'total')  //if the user asked to see all section(\(*?\))s of one title, then show them all of them
			{
				echo ("<div  align='center'><b><h1> All relevant sections of Title 15</div></h1></b>");
				$text_query = 'SELECT americanLawName, textOfAmericanLaw FROM AmericanLaw WHERE americanLawID LIKE \'0101%\'';
				$text_result = mysql_query($text_query, $link) or die ('Query failed: ' . mysql_error());
				
				// get the next row from the result object.  The query will find every row in the table
				$row = mysql_fetch_row($text_result);
				// row has two items, the first is the law name, the second the law text
				while($row)
				{
				  $searchResult = $searchResult . "<hr><p><b>" . $row[0]. "</b></p>";
				  $searchResult = $searchResult . "<p>" . $row[1]. "</p>";
				  // get the next row from the query result
				  $row = mysql_fetch_row($text_result);
				}
			}
			
			else  //this section of code gets the id of the law that the user wants to search for, uses that to find the name of the law, displays it on the screen,
			{
				$title_query = 'SELECT americanLawName FROM AmericanLaw WHERE americanLawID =\'' . $number . '\'';
				$title_result = mysql_query($title_query, $link) or die ('Query failed: ' . mysql_error());
				$row = mysql_fetch_row($title_result);
				$title_print = $row[0];
				echo ("<div  align='center'><b><h1> Text of ". $title_print . "</div></h1></b>");
				$summary_query = 'SELECT textOfAmericanLaw FROM AmericanLaw WHERE americanLawID =' . $number;
				$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());
				//stores the result of the querry into a variable
				$searchResult = mysql_result($summary_result, 0);
			}
						
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(affirmative defense)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='glossary.htm#defenses'>affirmative defense</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);

			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(intentionally)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='glossary.htm#mentalStates'>intentionally</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(knowingly)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='glossary.htm#mentalStates'>knowingly</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(recklessly)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='glossary.htm#mentalStates'>recklessly</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(criminal negligence)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='glossary.htm#mentalStates'>criminal negligence</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*[^(aragraph/s{2})|((ection)(/s{2}))]\(a\)[^(\(\w\)|(or/s)|(and/s))]*";
			$replacement = "(a)";
			$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			
			while ($position != 0)  //as long as the end of the string has not been reached, keep searching for matches, replacing them and then storing the position of the next match in a variable
			{
				$replaceWith = " </p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>  " . $replacement . " </b>&nbsp;&nbsp;";
				$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
				$number = ord($searchCharactor);
				$number = $number + 1;
				$searchCharactor = chr($number);
				$replacement = "(".$searchCharactor.")";
				//$searchString = "*\(" . $searchCharactor . "\)" . "[^(\(\w\)|(or/s)|(and/s))]*";
				$position = preg_match($searchString, $searchResult);
			}
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*[^((aragraph/s{2})|((ection)(/s{2}))(\(\w\))]\(1\)[^(\(\w\)|(or/s)|(and/s))]*";
			$replacement = "(1)";
			$searchCharactor = "1";
			$position = preg_match($searchString, $searchResult);
				
			while ($position != 0)  //as long as the end of the string has not been reached, keep searching for matches, replacing them and then storing the position of the next match in a variable
			{
				$replaceWith = " </p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>  " . $replacement ." </b>&nbsp;&nbsp;";
				$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
				$number = ord($searchCharactor);
				$number = $number + 1;
				$searchCharactor = chr($number);
				$replacement = "(".$searchCharactor.")";
				$searchString = "*[^(((aragraph)/s{2})|((ection)(/s{2}))|(\(\w\)))]\(" . $searchCharactor . "\)" . "[^((\(\w\))|(or/s)|(and/s))]*";
				$position = preg_match($searchString, $searchResult);
			}
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*[^((aragraph\)/s{2})|((ection)(/s{2}))(\(\w\))]\(A\)[^(\(\w\)|(or/s)|(and/s))]*";
			$replacement = "(A)";
			$searchCharactor = "A";
			$position = preg_match($searchString, $searchResult);
		
			while ($position != 0)  //as long as the end of the string has not been reached, keep searching for matches, replacing them and then storing the position of the next match in a variable
			{
				$replaceWith = " </p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>  " . $replacement . " </b>&nbsp;&nbsp;";
				$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
				$number = ord($searchCharactor);
				$number = $number + 1;
				$searchCharactor = chr($number);
				$replacement = "(".$searchCharactor.")";
				$searchString = "*[^((aragraph\)/s{2})|((ection)(/s{2}))(\(\w\))]\(" . $searchCharactor . "\)" . "[^(\(\w\)|(or/s)|(and/s))]*";
				$position = preg_match($searchString, $searchResult);
			}
		
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*[^((aragraph\)/s{2})|((ection)(/s{2}))(\(\w\))](\([i]+\))([^(\(\w\)|(or/s)|(and/s))])*";
			$replacement = "$1";
			$replaceWith = "</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>" . $replacement . " </b>&nbsp;&nbsp;";
			$count = 0;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult, -1, $count);

			//prints the formatted response to the browser
			echo $searchResult;
			echo "<p><hr /></p>";
		?>

	</body>
	
</html>