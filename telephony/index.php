<?php

	
		
	// now greet the caller
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
	<Say>Hello User.</Say>
	<Gather numDigits="1" action="reroute.php" method="POST">
		<Say>
			To use the PM system, press 1.
	  	</Say>
	  	<Say>
	  		To use the Loadouts help desk, press 2.
	  	</Say>
	  	<Say>
	  		To Quit, press 3.
	  	</Say>
	</Gather>
</Response>