
    
    <?php
	
	extract($_POST);
	
	?>
    <hr />
    <div style="margin-left:20%; margin-right:20%; padding-top:5px; padding-left:40px; background:url(images/wallback.png) bottom center;  border-radius:10px;">
    <h2> Make Report Entries:</h2>
    	<form action="" method="post" style=" position: static" name="regForm">
        	<div class="dynamiclabel">        	
            <input type="text" name="username" id="username" placeholder="Username" readonly="readonly" value="<?php echo $_SESSION["user"]; ?>"/>
            <label for="username">Username</label>
            </div>
            <div class="dynamiclabel" title="Select Report Type"> 
            <select name="reptype" id="reptype">
            	<option>Select Report Type</option>
            	<option>Malfunction</option>
                <option>broken Links</option>
                <option>recommendations</option>
                <option>Others</option>
            </select>
            <label for="reptype">Report Type</label>
            </div>
            <div class="dynamiclabel">            
            <input type="text" name="reptitle" id="reptitle" placeholder="Report Title" />
            <label for="reptitle">Report Title</label>
            </div>
            <div class="dynamiclabel">            
            <input type="text" name="email" id="email" placeholder="Prefered Email" />
            <label for="email">Prefered Email</label>
            </div>
            <div class="dynamiclabel">            
            <textarea name="reptxt" id="reptxt" placeholder="Report here"></textarea>
            <label for="reptxt">Report here</label>
            </div>
            <div class="dynamicbutton" style="margin-right:10%"><input type="submit" name="sub_rep" id="sub_rep" value="Send Report"/><input type="reset" /></div>
        </form>
    </div>