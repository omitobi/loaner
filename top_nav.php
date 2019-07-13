<!-- This is the top navigation section -->
<div id="top_wrapper">

  
  <div class="css3splitmenu" style="margin-left:0px; margin-top:7px;">
<a href="userdetails.php?action=view&alert_msg=View%20Account!">Welcome: <u><?php echo namegetter($conn); ?></u></a> <input type="checkbox" />

<ul id="t">
<li><a href="userdetails.php?action=view&alert_msg=View Account!">My Account</a></li>
<li><a href="userdetails.php?action=edit&alert_msg=Editing Profile">Edit Profile</a></li>
<li><a href="myactions.php?alert_msg=My All Actions">View All Actions</a></li>
<li><a href="procs2.php?aact=o&n=u&l=t&u=auto">Logout!</a></li>
</ul>
</div>

<!-- Script below should follow all split menus -->

<script type="text/javascript">

( function(){ // local scope

	if (!document.querySelectorAll || !document.addEventListener)
		return
	var uls = document.querySelectorAll('div.css3splitmenu > ul'),
			docbody = document.documentElement || document.body,
			checkboxes = document.querySelectorAll('div.css3splitmenu > input[type="checkbox"]'),
			zindexvalue = 100

	for (var i=0; i<uls.length; i++){
		( function(x){ // closure to capture each i value
			checkboxes<i>.addEventListener('click', function(e){
				uls[x].style.zIndex = ++zindexvalue
				for (var y=0; y<uls.length; y++){ // loop through checkboxes other than current and uncheck them (since Chrome doesn't respond to onblur event on checkboxes)
					if (y != x)
						checkboxes[y].checked = false
				}
				e.cancelBubble = true
			})
			checkboxes<i>.addEventListener('blur', function(e){
				setTimeout(function(){checkboxes[x].checked = false}, 100) // delay before menu closes, for Opera's sake (otherwise links are un-navigatable)
				e.cancelBubble = true
			})
		}) (i)
	}

	docbody.addEventListener('click', function(e){
		for (var i=0; i<uls.length; i++){
			checkboxes<i>.checked = false
		}
	})

})();


</script>


<div class="menulist" style="float:left; margin-left:30%; margin-right:5px;">
    <ul >
    	<li>ONLINE: {<?php echo select_all($conn, "loglog","time_out","0000-00-00 00:00:00","lognum");?>}</li>
  		<li><b>.::NOTIFICATION::.</b> <?php if($_GET["alert_msg"])echo ($_GET["alert_msg"]); else echo ""; ?></li>
		<li><a href="home.php?alert_msg=No Operation!">Home</a></li>
        <li><a href="updater.php?alert_msg=No Operation!">Updater</a></li>
        <li><a href="restorer.php?alert_msg=No Operation!">Restorer</a></li>
        <li><a href="helper.php?alert_msg=No Operation!">Help</a></li>
        <li><a href="abouter.php?alert_msg=No Operation!">About</a></li>
    </ul>
    </div>
 
</div>
<!-- The top menu space ends here -->
