<!--
Gabriel Barr
Last Modified: Tuesday, November 12th, 2013
Purpose: The purpose of this page is to display the law(s) that the user requested
Algorithm: Checks to see which menu item(s) are selected and then displays the corresponding law(s)
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >

	<head>

		<title>Display Law(s)</title>

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
	
		<?php  //Connects to the database
			$link = mysql_connect('localhost', 'root', 'ithacamysql') or die ('Could not connect: ' . mysql_error());
			mysql_query("USE ComputerLaws");
		?>
		
		<p> <div id="navbar">  <!--provides links to all of the pages on this website-->
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
				<li style="width:800px"><a><input type="text" id="Search2" size="25" onKeyPress="return submitenter(this,event)" /> <input type="button" value="Search" onclick = "find('Search2')" /></a></li>
			</ul>
		</div></p>
		
	 <p> <div id="navbar"> <!--provides links to other relevant websites-->
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
		
		<h1 align="center">Display Law(s)</h1>

			<div style="width: 95%; float: right;">
				<div style="float: left; width: 46%; border:solid #630063; margin:8pt; padding:8pt">
				
					<?php
						if ($_POST[choice1]=="overview1" && $_POST[menu1]=="australian1") //Checks to see if the first choice is an Australian summary.  If it is, then it creates and sends the query
						{
							$summary_query = 'SELECT summeryOfAustralianLaw FROM AustralianLaw';
							$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());

							// Use result
							// Attempting to print $result won't allow access to information in the resource
							// One of the mysql result functions must be used
							// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
							while ($row = mysql_fetch_assoc($summary_result))  //Finds each row of the summary and prints it
							{
								$searchResult = $row['summeryOfAustralianLaw'];
								echo $searchResult;
							}
						}
						else if ( $_POST[choice1]=="text1" && $_POST[menu1]=="australian1")  //Checks to see if the first choice is the text of an Australian law.  If it is, then it creates and sends the query
						{
							$summary_query = 'SELECT textOfAustralianLaw FROM AustralianLaw';
							$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());

							// Use result
							// Attempting to print $result won't allow access to information in the resource
							// One of the mysql result functions must be used
							// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
							while ($row = mysql_fetch_assoc($summary_result))  //Finds each row of the law
							{
								$searchResult = $row['textOfAustralianLaw'];

								$searchString = "(a)";
								$searchCharactor = "a";
								$position = strpos ($searchResult, $searchString);	
				
								do
								{
									$replaceWith = "</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $searchString;
		
									$searchResult = str_replace ($searchString, $replaceWith, $searchResult);
									$number = ord($searchCharactor);
									$number = $number + 1;
									$searchCharactor = chr($number);
									$searchString = "(" . $searchCharactor . ")";
									$position = strpos($searchResult, $searchString);
						
									//now send formatted response to the browser
								} while ($position);
								// now display the result
								echo $searchResult;
							}
						}
						else if ($_POST[choice1]=="overview1" && $_POST[menu1]=="american1") //Checks to see if the first choice is an American summary.  If it is, then it creates and sends the query
						{
							$summary_query = 'SELECT summeryOfAmericanLaw FROM AmericanLaw';
							$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());

							// Use result
							// Attempting to print $result won't allow access to information in the resource
							// One of the mysql result functions must be used
							// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
							while ($row = mysql_fetch_assoc($summary_result))  //Finds each row of the summary and prints it
							{
								$searchResult = $row['summeryOfAmericanLaw'];
								echo $searchResult;
							}
						}
						else if ( $_POST[choice1]=="text1" && $_POST[menu1]=="american1") //Checks to see if the first choice is the text of an Australian law.  If it is, then it creates and sends the query
						{
							$summary_query = 'SELECT textOfAmericanLaw FROM AmericanLaw';
							$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());

							// Use result
							// Attempting to print $result won't allow access to information in the resource
							// One of the mysql result functions must be used
							// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
							while ($row = mysql_fetch_assoc($summary_result))  //Finds each row of the law
							{
								$searchResult = $row['textOfAmericanLaw'];
								//echo "<p>search result is: </p>";
								//echo $searchResult;
								
								// format it
								$searchString = "(a)";
								$searchCharactor = "a";
								$position = strpos ($searchResult, $searchString);	
				
								do{
									$replaceWith = "</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $searchString;
	
									$searchResult = str_replace ($searchString, $replaceWith, $searchResult);
									$number = ord($searchCharactor);
									$number = $number + 1;
									$searchCharactor = chr($number);
									$searchString = "(" . $searchCharactor . ")";
									$position = strpos($searchResult, $searchString);
								} while ($position) ;
								// now display the result
								echo $searchResult;
							}
						}
					?>
				</div><!--end div float left --> 

				<div style="float: right; width: 46%; border:solid #630063;  margin: 8px; padding:8pt">
					<?php
						if ($_POST[choice2]=="overview2" && $_POST[menu2]=="australian2") //Checks to see if the second choice is an Australian summary.  If it is, then it creates and sends the query
						{
							$summary_query = 'SELECT summeryOfAustralianLaw FROM AustralianLaw';
							$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());

							// Use result
							// Attempting to print $result won't allow access to information in the resource
							// One of the mysql result functions must be used
							// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
							while ($row = mysql_fetch_assoc($summary_result))  //Finds each row of the summary and prints it
							{
								$searchResult = $row['summeryOfAustralianLaw'];
								echo $searchResult;
							}
						}
						else if ( $_POST[choice2]=="text2" && $_POST[menu2]=="australian2") //Checks to see if the second choice is the text of an Australian law.  If it is, then it creates and sends the query
						{
							$summary_query = 'SELECT textOfAustralianLaw FROM AustralianLaw';
							$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());
							
							// Use result
							// Attempting to print $result won't allow access to information in the resource
							// One of the mysql result functions must be used
							// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
							while ($row = mysql_fetch_assoc($summary_result))  //Finds each row of the law
							{
								$searchResult = $row['textOfAustralianLaw'];
								
								// format it
								$searchString = "(a)";
								$searchCharactor = "a";
								$position = strpos ($searchResult, $searchString);	
				
								$count = 0;
								do
								{
									$replaceWith = "</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $searchString;
		
									$searchResult = str_replace ($searchString, $replaceWith, $searchResult);
									$number = ord($searchCharactor);
									$number = $number + 1;
									$searchCharactor = chr($number);
									$searchString = "(" . $searchCharactor . ")";
									$position = strpos($searchResult, $searchString);
						
									//now send formatted response to the browser
								} while($position);
								// now display the search
								echo $searchResult;
							}
						}
						else if ($_POST[choice2]=="overview2" && $_POST[menu2]=="american2") //Checks to see if the second choice is an American summary.  If it is, then it creates and sends the query
						{
							$summary_query = 'SELECT summeryOfAmericanLaw FROM AmericanLaw';
							$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());

							// Use result
							// Attempting to print $result won't allow access to information in the resource
							// One of the mysql result functions must be used
							// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
							while ($row = mysql_fetch_assoc($summary_result))  //Finds each row of the summary and prints it
							{
								$searchResult = $row['summeryOfAmericanLaw'];
								echo $searchResult;
							}
						}
						else if ( $_POST[choice2]=="text2" && $_POST[menu2]=="american2")  //Checks to see if the second choice is the text of an American law.  If it is, then it creates and sends the query
						{
							$summary_query = 'SELECT textOfAmericanLaw FROM AmericanLaw';
							$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());

							while ($row = mysql_fetch_assoc($summary_result))  //Finds each row of the law
							{
								$searchResult = $row['textOfAmericanLaw'];
								
								// format it
								$searchString = "(a)";
								$searchCharactor = "a";
								$position = strpos ($searchResult, $searchString);	
				
								do
								{
									$replaceWith = "</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $searchString;
	
									$searchResult = str_replace ($searchString, $replaceWith, $searchResult);
									$number = ord($searchCharactor);
									$number = $number + 1;
									$searchCharactor = chr($number);
									$searchString = "(" . $searchCharactor . ")";
									$position = strpos($searchResult, $searchString);
								} while ($position);
								// now display the result
								echo $searchResult;
							}
						}
					?>
				</div><!--end div float right --> 
		</div><!--end div wrap-->

	</body>

</html>