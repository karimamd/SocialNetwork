<?php
	function upper_bar(){
		echo"<ul class='nav'>
    <li id='settings'>
       
    </li>
    <li>
        <a href='#'>Application</a>
    </li>
    <li>
        <a href='#'>Board</a>
    </li>
    <li id='search'>
        <form action='' method='get'>
            <input type='text' name='search_text' id='search_text' placeholder='Search'/>
            <input type='button' name='search_button' id='search_button'></a>
        </form>
    </li>
    <li id='options'>
        <a href='#'>Options</a>
        <ul class='subnav'>
            <li><a href='#'>Settings</a></li>
            <li><a href='#'>Application</a></li>
            <li><a href='#'>Board</a></li>
            <li><a href='#'>Options</a></li>
        </ul>
    </li>
</ul>";
	}
?>

