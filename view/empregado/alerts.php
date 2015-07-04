<?php 
	  if(isset($result)!=NULL&&!is_array($result)) :
	  		echo "<p class='flash bg-primary'>".$result."</p>";
	  else :
	  	if ((isset($result)!=NULL&&is_array($result))) :
	  		echo "<div class='flash bg-primary'>";
	  		
	  		foreach ($result as $key => $value) :
	  			echo "<p>".$value."</p>";
	  		endforeach; 

	  		echo "</div>";
		elseif (!empty(view::view_flash())) :
		  	echo "<p class='flash bg-primary'>".view::view_flash()."</p>";
		endif;
	  endif;
?>