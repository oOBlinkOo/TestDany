<?php /* Template Name: Productos Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
<script type="text/javascript">
	function changeimages(element , myvar) {
	// alert ("pasa x la funcion"  + myvar);

		jQuery('.listaCategorias').removeClass('active');
		jQuery(element).addClass('active');
		// jQuery('.productborder').hide();
		
		if(myvar=='ALL')		
			jQuery('.productborder').show()
		else
		{
			jQuery('.productborder').hide()
			jQuery('.'+myvar).show();
		}




	}
	
	function cargarvalueInit(){
		var ul_id = document.getElementById('ul_id');
		var lis = ul_id.getElementsByTagName('li');
		lis[0].className += " active";
	}
	

	</script>

		<section>
<div class="container">
	
		<?php if( have_rows('producto') ): ?>
				<ul>
        <?php 
        $arreglo =null;
        $flag = false;
 
        
        while( have_rows('producto') ): the_row(); 
          $u =0;
                $categoria = get_sub_field('categoria');
                $nombre = get_sub_field('nombre');
                $description = get_sub_field('description');
                $image = get_sub_field('image');
                $precio = get_sub_field('precio');
                // echo "paso" + var_dump($categoria);
              ?>
			<?php 
				$flag = false;
			
				if (!is_null($categoria)) {
					# code...
					if (is_null($arreglo)) {

						$arreglo[] = $categoria;
						// var_dump($arreglo);
						// echo "paso x aqui <br>";

					}else{
					
					for ($i=0; $i < count($arreglo); $i++) { 
						# code...
						// echo "1 $arreglo[$i] <br>";
						// 	echo "2 $categoria<br>";
						if($arreglo[$i] == $categoria){
							$flag =false;
							break;
						}else {
							$flag = true;
						}
					}
					// echo "<p >end del for "  ;
					// echo $flag; 
					// var_dump($arreglo);
					// echo "</p>"  ;

					if($flag == true){
						$arreglo[] = $categoria;	

					}
							// echo "<p >end del for "  ;
							// var_dump($arreglo);
							// 	echo "</p>"  ;


					}

				}


			 ?>
			

              <?php endwhile; ?>
              </ul>

			<?php endif; ?>	
			<div class="col-xs-6 col-md-3">
				

			
			<?php 	echo "<ul class='list-group' id='ul_id'>"; ?>
				<li class="list-group-item list-group-item-success listaCategorias" onclick="changeimages(this,'ALL')" >
				   		ALL
				 </li>

					<?php 


				   for ($i=0; $i < count($arreglo); $i++) { 
				   	# code...
				   	?>
				   	

				   	<li class="list-group-item list-group-item-success listaCategorias" onclick="changeimages(this,'<?php echo "data-".str_replace(" ","-",$arreglo[$i]); ?>')">
				   			<?php echo "$arreglo[$i]"; ?>
				   	</li>
				   	<?php	
				   }
				   

				   echo "<ul>";
			?>
			</div>

			<?php 
				echo "<script>";
				echo "cargarvalueInit();";
				echo "</script>";
			 ?>










</div>



		<div class="container">
			
<div class="row divscrollproductos">


			<?php if( have_rows('producto') ): ?>
				<?php while( have_rows('producto') ): the_row(); 
		            $categoria = get_sub_field('categoria');
		            $nombre = get_sub_field('nombre');
		            $description = get_sub_field('description');
		            $image = get_sub_field('image');
		            $precio = get_sub_field('precio');
            		// echo "paso" + var_dump($categoria);
            	?>
            	
            	<div class="bg-warning col-xs-6 col-md-3 data-<?php echo str_replace(' ','-',$categoria);?> productborder " >
            	<!-- <div class="thumbnail"> -->
            		<div class="col-md-6 bg-success" ><div class="row"><p class="nombre"> <?php echo "$nombre";?></p></div>
            			<div class="row"> <img src="<?php echo $image['url']; ?>" alt="Chania"></div>
            		</div>
            		<div class="col-md-6   descripcion"><p class=""> <?php echo "$description";?></p></div>
            	<!-- </div> -->
				</div>


             	<?php endwhile; ?>
			<?php endif; ?>	
 	

</div><!-- /row de las filas principales -->


		</div><!-- /container -->
		</section>
		<!-- /section -->
	</main>



<?php get_footer(); ?>
