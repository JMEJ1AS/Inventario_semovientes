<?php $paginator = $this->Paginator; ?>

<div class="paging">

	<?php

		echo $paginator->first("<< Inicio");

		if($paginator->hasPrev()){
	
			echo $paginator->prev("< Anterior");
		
		}

		echo $paginator->numbers(array(
				
				'modulus' => 2

			)
		
		);

		if($paginator->hasNext()){
	
			echo $paginator->next("Siguiente >");
		
		}

		echo $paginator->last("Final >>");

		?>

</div>