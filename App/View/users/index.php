<div class="container">
	<?php
		if(isset($this->msg)){
			echo $this->msg;

		}
	?>
	<h1>Bienvenue <?php if (isset($this->username)) echo $this->username;?></h1>

</div>