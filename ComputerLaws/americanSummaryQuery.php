<!--
Gabriel Barr
Last Modified: Monday, May 7th, 2012
Purpose: The purpose of this page is to display the summary of the American law that the user requested
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
			$title_query = 'SELECT americanLawName FROM AmericanLaw WHERE americanLawID =' . $number;
			$title_result = mysql_query($title_query, $link) or die ('Query failed: ' . mysql_error());
			$title_print = mysql_result($title_result, 0);
			echo ("<div  align='center'><b><h1> Summary of ". $title_print . "</div></h1></b>");
			
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
			//$replaceWith = " <a href='glossary.htm'>criminal negligence</a>" ;
			$searchResult = preg_replace ($searchString, $replaceWith, $searchResult);
			
			if (number == 'all')  //if the user asked to see all sections of one title, then show them all of them
			{
				$summary_query = 'SELECT summeryOfAmericanLaw FROM AmericanLaw';
				$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());
			}
			
			//stores the query into a variable and then sends the value of that variable to the database
			$summary_query = 'SELECT summeryOfAmericanLaw FROM AmericanLaw WHERE americanLawID =' . $number;
			$summary_result = mysql_query($summary_query, $link) or die ('Query failed: ' . mysql_error());
			
			//stores the result of the query into a variable
			$searchResult = mysql_result($summary_result, 0);
			
			if ($searchResult == false)
			{
				echo "<p><b>no results</b> <p>";
			}
			else
			{
				echo $searchResult;
			}
						
			$numRows = mysql_num_rows ($summary_result);
		?>
		
	</body>
	
</html>
