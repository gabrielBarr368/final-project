<!--
Gabriel Barr
Last Modified: Tuesday, November 12th, 2013
Purpose: The purpose of this page is to receive the search term that the user entered and search the database for it
Algorithm: Accepts the search term that the user enters, queries the database, displays the name of every law along with the search term if it is
	found and 40 positions to either side
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

	<head>
	
		<title>Search Page</title>
		
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
		<p><div id="navbar">  <!--provides links to all of the pages on this website-->
			<ul>
				<li style="width:50px"><a href="home.htm">Home</a></li>
				<li style="width:100px"><a href="compareLaw.htm">Compare Laws</a></li>
				<li><a href="americanLaw.htm">List of American Federal Computer Laws</a></li>
				<li><a href="australianLaw.htm">List of Australian Federal Computer Laws</a></li>
				<li style="width:65px"><a href="glossary.htm">Glossary<br /></a></li>
				<li style="width:70px"><a href="feedback.htm">Feedback<br /></a></li>
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
				<li style="width:800px"><a><input type="text" id="Search2" size="25" onKeyPress="return submitenter(this,event)" /><input type="button" value="Search" onclick = "find('Search2')" /></a></li>
			</ul>
		</div></p>
		
		<p><div id="navbar">  <!--provides links to other relevant websites-->
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
			//this section of code gets the term that the user wants to search for, displays it on the screen, and then connects to the database
			$search = $_GET['q'];
			echo ("<div  align='center'><b><h1>The search term is ". $search . "</div></b> .</h1>");
			$link = mysql_connect('localhost', 'root', 'ithacamysql') or die ('Could not connect: ' . mysql_error());
			mysql_query("USE ComputerLaws");
			
			//This section stores the required queries into variables
			$americanQuery = mysql_query('select * from AmericanLaw', $link) or die ('Query failed: ' . mysql_error());
			$australianQuery = mysql_query('select * from AustralianLaw', $link) or die ('Query failed: ' . mysql_error());
			
			//creating and initilizing the variables that are used
			$times = 0;
			$found = 0;
			$count = 0;
			
			while($row = mysql_fetch_row($americanQuery))  //Fetches a row of the AmericanLaw table
			{
				// print the name of the law
				echo "<p><b>Law:  ".$row[1]."</b><br /></p>";
				$position = stripos($row[3], $search); //Stores the position of the search term in the row summeryOfAmericanLaw in a variable
			
				if ($position > 9) //Checks the position of the search term to see if it is greater then 9.  If it is, then it sets found to equal 1
				{
					$found = 1;
				
					//Records the search term along with 10 positions in each direction, displays the result and then gets the position of the next occuerance of the search term
					while ($position > 0)
					{
						$count++;
						if ($postion < 40){
							$start = $position;
						}
						else{
							$start = stripos($row[3], " ", $position - 40);
						}
						if ($position + 40 < strlen($row[3])){
							$stop = stripos($row[3], " ", $position + 40);
						}
						else{
							$stop = stripos($row[2], " ", strlen($row[2]) - 2);
						}
						$americanSubstring = substr($row[3], $start, ($stop - $start + 1)) . "<p>";
						echo $americanSubstring;
						$position = stripos($row[3], $search,  $position + 1);
					} 
				}
				else if ($position > 0)  //Checks the position of the search term to see if it is greater then 0.  If it is, then it sets found to equal 1
				{
					$found = 1;
				
					//Records the search term along with 10 positions in each direction, displays the result and then gets the position of the next occuerance of the search term
					while ($position > 0)
					{
						$count++;
						if ($postion < 40){
							$start = $position;
						}
						else{
							$start = stripos($row[3], " ", $position - 40);
						}
						if ($position + 40 < strlen($row[3])){
							$stop = stripos($row[3], " ", $position + 40);
						}
						else{
							$stop = stripos($row[2], " ", strlen($row[2]) - 2);
						}
						$position = stripos($row[3], $search,  $position + 1);
						$americanSubstring = substr($row[3], $start, ($stop - $start + 1)). "<p>";
					echo $americanSubstring;
					} 
				}

				$position = stripos($row[2], $search);  //Stores the position of the search term in the row textOfAmericanLaw in a variable

				if ($position > 9)  //Checks the position of the search term to see if it is greater then 9.  If it is, then it sets found to equal 1
				{
					$found = 1;
					
					//Records the search term along with 10 positions in each direction, displays the result and then gets the position of the next occuerance of the search term
					while ($position > 0)
					{
						$count++;
						if ($postion < 40){
							$start = $position;
						}
						else{
							$start = stripos($row[2], " ", $position - 40);
						}
						if ($position + 40 < strlen($row[2])){
							$stop = stripos($row[2], " ", $position + 40);
						}
						else{
							$stop = stripos($row[2], " ", strlen($row[2]) - 2);
						}
						$americanSubstring = substr($row[2], $start, ($stop - $start + 1)). "<p>";
						echo $americanSubstring;
						$position = stripos($row[2], $search,  $position + 1);
					}
				}
				else if ($position > 0)  //Checks the position of the search term to see if it is greater then 0.  If it is, then it sets found to equal 1
				{
					$found = 1;
				
					//Records the search term along with 10 positions in each direction, displays the result and then gets the position of the next occuerance of the search term
					while ($position > 0)
					{
						$count++;
						if ($postion < 40){
							$start = $position;
						}
						else{
							$start = stripos($row[2], " ", $position - 40);
						}
						if ($position + 40 < strlen($row[2])){
							$stop = stripos($row[2], " ", $position + 40);
						}
						else{
							$stop = stripos($row[2], " ", strlen($row[2]) - 2);
						}
						$position = stripos($row[2], $search,  $position + 1);
						$americanSubstring = substr($row[2], $start, ($stop - $start + 1)). "<p>";
						echo $americanSubstring;
					} 
				}
			}
			
			while($row = mysql_fetch_row($australianQuery))  //Fetches a row of the AmericanLaw table
			{
				// print the name of the law
				echo "<p><b>Law:  ".$row[1]."</b><br /></p>";
				$position = stripos($row[3], $search);  //Stores the position of the search term in the row summeryOfAmustralianLaw in a variable

				if ($position > 9)  //Checks the position of the search term to see if it is greater then 9.  If it is, then it sets found to equal 1
				{
					$found = 1;
				
					//Records the search term along with 10 positions in each direction, displays the result and then gets the position of the next occuerance of the search term
					while ($position > 0)
					{
						$count++;
						if ($postion < 40){
							$start = $position;
						}
						else{
							$start = stripos($row[3], " ", $position - 40);
						}
						if ($position + 40 < strlen($row[3])){
							$stop = stripos($row[3], " ", $position + 40);
						}
						else{
							$stop = stripos($row[2], " ", strlen($row[2]) - 2);
						}
						$australianSubstring = substr($row[3], $start, ($stop - $start + 1)). "<p>";
						echo $australianSubstring;
						$position = stripos($row[3], $search,  $position + 1);
					} 
				}
				else if ($position > 0)  //Checks the position of the search term to see if it is greater then 0.  If it is, then it sets found to equal 1
				{
					$found = 1;
				
					//Records the search term along with 10 positions in each direction, displays the result and then gets the position of the next occuerance of the search term
					while ($position > 0)
					{
						$count++;
						if ($postion < 40){
							$start = $position;
						}
						else{
							$start = stripos($row[3], " ", $position - 40);
						}
						if ($position + 40 < strlen($row[3])){
							$stop = stripos($row[3], " ", $position + 40);
						}
						else{
							$stop = stripos($row[2], " ", strlen($row[2]) - 2);
						}
						$position = stripos($row[3], $search,  $position + 1);
						$australianSubstring = substr($row[3], $start, ($stop - $start + 1)). "<p>";
						echo $australianSubstring;
					} 
				}
			
				$position = stripos($row[2], $search);  //Stores the position of the search term in the row textOfAustralianLaw in a variable
			
				if ($position > 9)  //Checks the position of the search term to see if it is greater then 9.  If it is, then it sets found to equal 1
				{
					$found = 1;
				
					//Records the search term along with 10 positions in each direction, displays the result and then gets the position of the next occuerance of the search term
					while ($position > 0)
					{
						$count++;
						if ($postion < 40){
							$start = $position;
						}
						else{
							$start = stripos($row[2], " ", $position - 40);
						}
						if ($position + 40 < strlen($row[2])){
							$stop = stripos($row[2], " ", $position + 40);
						}
						else{
							$stop = stripos($row[2], " ", strlen($row[2]) - 2);
						}
						$australianSubstring = substr($row[2], $start, ($stop - $start + 1)) . "<p>";
						echo $australianSubstring;
						$position = stripos($row[2], $search,  $position + 1);
					} 
				}
				else if ($position > 0)  //Checks the position of the search term to see if it is greater then 0.  If it is, then it sets found to equal 1
				{
					$found = 1;
				
					//Records the search term along with 10 positions in each direction, displays the result and then gets the position of the next occuerance of the search term
					while ($position > 0)
					{
						$count++;
						if ($postion < 40){
							$start = $position;
						}
						else{
							$start = stripos($row[2], " ", $position - 40);
						}
						if ($position + 40 < strlen($row[2])){
							$stop = stripos($row[2], " ", $position + 40);
						}
						else{
							$stop = stripos($row[2], " ", strlen($row[2]) - 2);
						}
						$position = stripos($row[2], $search,  $position + 1);
						$australianSubstring = substr($row[2], $start, ($stop - $start + 1)). "<p>";
						echo $australianSubstring;
					} 
				}
			}
			
			if ($found == 0)  //Displays an error message if the search term was not found
			{
			  echo ("Couldn't find text " . $search . ".");
			}
			else  //Displays the number of times that the search term was found
			{
			  echo ("Found " . $count . " instances of the string " . $search . "<p>");
			}
		?>

	</body>
	
</html>