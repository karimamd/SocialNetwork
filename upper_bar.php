<?php
	function upper_bar(){
		echo"<ul>
  <li><a class='active' href='homepage.php' >Home</a></li>
  <li><a href='#' onclick='showStuff()'>News</a><span id='notify_news'class='notification-counter'>15</span></li>
  <li><a href='friendsReq.php'>Friend Requests</a></li>
  <li><a href='#about'>About</a></li>

 <li>
<form  id='search_form' action='search.php' method='post'>
<div><input type='text' name='result' ID='result' placeholder='Search'>
<input type='submit' name='do_search' ID='do_search' value='OK' onClick='window.location = 'search.php''>
</div>
</form>
</li>
<li style='float:right'><a  href='index.php'>Log out</a></li>
</ul>
";
	}
      //
    //
?>
