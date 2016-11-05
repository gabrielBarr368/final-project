<!--
Gabriel Barr
Last Modified: Monday, May 7th, 2012
Purpose: The purpose of this page is to display the summary of the Australian law that the user requested
Algorithm: Accepts the law id of the requested Australian law and queries the database to get the corresponding summary
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	</head>
	
	<body>	
	
		<?php
			//this section of code gets the id of the law that the user wants to search for, uses that to find the name of the law, displays it on the screen, and then connects to the database		
			$number = $_GET['q'];
			$link = mysql_connect('localhost', 'root', 'ithacamysql') or die ('Could not connect: ' . mysql_error());
			mysql_query("USE ComputerLaws");
			$title_query = 'SELECT australianLawName FROM AustralianLaw WHERE australianLawID =' . $number;
			$title_result = mysql_query($title_query, $link) or die ('Query failed: ' . mysql_error());
			$title_print = mysql_result($title_result, 0);
			echo ("<div  align='center'><b><h1> Summary of ". $title_print . "</div></h1></b>");
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(intention)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='faultElements'>intention</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(knowledge)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='faultElements'>knowledge</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(recklessness)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='<a href='glossary.htm#faultElements'>recklessness</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			//sets what is being searched for as well as what the search term will be replaced with
			$searchString = "*(negligence)*";
			//$replacement = "(a)";
			//$searchCharactor = "a";
			$position = preg_match($searchString, $searchResult);
			$replaceWith = " <a href='<a href='glossary.htm#faultElements'>negligence</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			//stores the query into a variable and then sends the value of that variable to the database
			$summary_query = 'SELECT *	 FROM AustralianLaw WHERE australianLawID =' . $number;
			$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());
			
			//stores the result of the query into a variable
			$searchResult = mysql_result($summary_result, 0, 'summeryOfAustralianLaw');
		
			while($row = mysql_fetch_row($summary_result))  //loops through and prints each row of the requested summary
			{ 
				echo "<p><b>First Field:</b></p><p>" . $row[0] . "<p><b>Second Field:</b></p><p>" . $row[1] . "<p><b>Third Field:</b></p><p>" . $row[2];
			}
			
			//now send formatted response to the browser
			echo $searchResult;
		?>
		
	</body>
	
</html>
