<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>Multimedia Info</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/minfo.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
	<script type="text/javascript">
	
	
		$(window).load(function () {
			$('#cargando').hide();
			$('#cargado').show();
		});
	</script>

	<?php include("api.php");?>
	<?php include("util.php");?>
	
	<?php
		$films = getMultimedia();
		$errFilms = "";
	?>
			
  </head>

	<body>
	
		<div class="container">
			<br />
			<div class="row">
				<div class="panel panel-success">
					<div class="panel-heading"><strong>Contenidos Multimedia</strong></div>
					<div class="panel-body">
						<div id="cargando">
							<div class="row">
								<p class="text-center">
									<br /><br /><br />
									Por favor, espere mientras se carga todo el contenido multimedia.<br /><br />
									<img src="img/loading.gif" />
									<br /><br /><br />
								</p>
							</div>
						</div>
						
						<div id="cargado">
							<div class="panel-group" id="accordionFiltro" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingFiltros">
									  <h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionFiltro" href="#collapseFiltros" aria-expanded="false" aria-controls="collapseFiltros">
										  <strong>Aplicar filtros</strong> 
										</a>
									  </h4>
									</div>
									
									<div id="collapseFiltros" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFiltros">
									  <div class="panel-body">
										<strong>Acciones:</strong><br />
										<button class="btn btn-default active" id="all">
											<img src="img/<?php echo ico('borrar') ?>.png"/>
										</button>
										
										<button type="button" class="btn btn-default" data-toggle="modal" data-target="#infoIco">
											<img src="img/<?php echo ico('info') ?>.png"/>
										</button>
										<br /><br/>
										
										<strong>Tipo:</strong><br />
										<button class="btn btn-default" id="Película"><img src="img/<?php echo ico('Película') ?>.png"/></button>
										<button class="btn btn-default" id="Serie"><img src="img/<?php echo ico('Serie de TV') ?>.png"/></button>
										<button class="btn btn-default" id="Documental"><img src="img/<?php echo ico('Documental') ?>.png"/></button>
										<br/><br/>
										
										<strong>Géneros:</strong><br />
										<button class="btn btn-default" id="Acción"><img src="img/<?php echo ico('Acción') ?>.png"/></button>
										<button class="btn btn-default" id="Animación"><img src="img/<?php echo ico('Animación') ?>.png"/></button>
										<button class="btn btn-default" id="Aventuras"><img src="img/<?php echo ico('Aventuras') ?>.png"/></button>
										<button class="btn btn-default" id="Bélico"><img src="img/<?php echo ico('Bélico') ?>.png"/></button>
										<button class="btn btn-default" id="Ciencia"><img src="img/<?php echo ico('Ciencia ficción') ?>.png"/></button>
										<button class="btn btn-default" id="Cine"><img src="img/<?php echo ico('Cine negro') ?>.png"/></button>
										<button class="btn btn-default" id="Comedia"><img src="img/<?php echo ico('Comedia') ?>.png"/></button>
										<button class="btn btn-default" id="Desconocido"><img src="img/<?php echo ico('Desconocido') ?>.png"/></button>
										<button class="btn btn-default" id="Drama"><img src="img/<?php echo ico('Drama') ?>.png"/></button>
										<button class="btn btn-default" id="Fantástico"><img src="img/<?php echo ico('Fantástico') ?>.png"/></button>
										<button class="btn btn-default" id="Infantil"><img src="img/<?php echo ico('Infantil') ?>.png"/></button>
										<button class="btn btn-default" id="Intriga"><img src="img/<?php echo ico('Intriga') ?>.png"/></button>
										<button class="btn btn-default" id="Musical"><img src="img/<?php echo ico('Musical') ?>.png"/></button>
										<button class="btn btn-default" id="Romance"><img src="img/<?php echo ico('Romance') ?>.png"/></button>
										<button class="btn btn-default" id="Terror"><img src="img/<?php echo ico('Terror') ?>.png"/></button>
										<button class="btn btn-default" id="Thriller"><img src="img/<?php echo ico('Thriller') ?>.png"/></button>
										<button class="btn btn-default" id="Western"><img src="img/<?php echo ico('Western') ?>.png"/></button>
																	
											<!-- Modal -->
											<div class="modal fade" id="infoIco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">¿Qué es cada imagen?</h4>
												  </div>
												  <div class="modal-body">
													<strong>Acciones:</strong>
													<ul>
														<li><img src="img/<?php echo ico('borrar') ?>.png"/> :: Mostrar Todo</li>
														<li><img src="img/<?php echo ico('info') ?>.png"/> :: Mostrar Ayuda</li>
													</ul>
													
													<strong>Tipo:</strong>
													<ul>
														<li><img src="img/<?php echo ico('Película') ?>.png"/> :: Películas</li>
														<li><img src="img/<?php echo ico('Serie de TV') ?>.png"/> :: Series</li>
														<li><img src="img/<?php echo ico('Documental') ?>.png"/> :: Documentales</li>
													</ul>
													
													<strong>Géneros:</strong>
													<ul>
														<li><img src="img/<?php echo ico('Acción') ?>.png"/> :: Acción</li>
														<li><img src="img/<?php echo ico('Animación') ?>.png"/> :: Animación</li>
														<li><img src="img/<?php echo ico('Aventuras') ?>.png"/> :: Aventuras</li>
														<li><img src="img/<?php echo ico('Bélico') ?>.png"/> :: Bélico</li>
														<li><img src="img/<?php echo ico('Ciencia ficción') ?>.png"/> :: Ciencia Ficción</li>
														<li><img src="img/<?php echo ico('Cine negro') ?>.png"/> :: Cine Negro</li>
														<li><img src="img/<?php echo ico('Comedia') ?>.png"/> :: Comedia</li>
														<li><img src="img/<?php echo ico('Desconocido') ?>.png"/> :: Desconocido</li>
														<li><img src="img/<?php echo ico('Drama') ?>.png"/> :: Drama</li>
														<li><img src="img/<?php echo ico('Fantástico') ?>.png"/> :: Fantástico</li>
														<li><img src="img/<?php echo ico('Infantil') ?>.png"/> :: Infantil</li>
														<li><img src="img/<?php echo ico('Intriga') ?>.png"/> :: Intriga</li>
														<li><img src="img/<?php echo ico('Musical') ?>.png"/> :: Musical</li>
														<li><img src="img/<?php echo ico('Romance') ?>.png"/> :: Romance</li>
														<li><img src="img/<?php echo ico('Terror') ?>.png"/> :: Terror</li>
														<li><img src="img/<?php echo ico('Thriller') ?>.png"/> :: Thriller</li>
														<li><img src="img/<?php echo ico('Western') ?>.png"/> :: Western</li>
													</ul>
												  </div>
												</div>
											  </div>
											</div>								
									  </div>
									</div>
								</div>
							</div>

							<div class="row">
								<div id="filter-tv">
								
									<?php
										$index = -1;
										foreach ($films as $f) {
											if (is_numeric($f)) {
												$index++;
												$film = getFilmInfo($f, false);
											}else {
												if ($f != "") {
													$saga = strpos($f, "zzz-");												
													if ($saga === false) {
														$errFilms = $errFilms . ' | ' . $f;
													} 									
												}
												continue;
											}
									?>
									
									<div class="col-md-4 <?php echo $film->tipo ?> <?php getGeneros($film->genere) ?>">
										<div class="panel panel-default">
										  <div class="panel-heading"><strong><?php echo $film->titleSmall ?></strong></div>
										  <div class="panel-body">
											<img class="poster img-rounded center-block" src="<?php echo $film->poster ?>" title="<?php echo $film->title ?>"  />
										  </div>
											<div class="panel-footer">
												<p class="text-center">
													<?php
														$panel = "danger";  
														$puntuacion = $film->average;
														if ($puntuacion <= 3){
															$panel = "default";
														}
														
														if ($puntuacion > 3 && $puntuacion < 6){
															$panel = "warning";
														}

														if ($puntuacion >= 6 && $puntuacion < 8){
															$panel = "info";
														}

														if ($puntuacion >= 8){
															$panel = "success";
														}
													?>
													
													<span class="label label-<?php echo $panel ?>"><?php echo $film->average?></span>
													&nbsp;
													<span class="label label-primary"><?php echo $film->running?></span> 
													
												</p>

												<div class="panel-group" id="accordion_<?php echo $index ?>" role="tablist" aria-multiselectable="true">
													<div class="panel panel-default">

														<div class="panel-heading" role="tab" id="headingFicha_<?php echo $index ?>">
															<h4 class="panel-title">
																<a role="button" data-toggle="collapse" data-parent="#accordion_<?php echo $index ?>" href="#collapseFicha_<?php echo $index ?>" aria-expanded="true" aria-controls="collapseFicha_<?php echo $index ?>">
																	<strong>Ficha</strong>
																</a>
															</h4>
														</div>
														<div id="collapseFicha_<?php echo $index ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFicha">
															<div class="panel-body">
																<ul>
																	<li>
																		<strong>Tipo: </strong>
																		<?php echo $film->tipo ?>
																	</li>
																	<li>
																		<strong>Título: </strong>
																		<?php echo $film->title ?> 
																	</li>
																	<li>
																		<strong>País: </strong>
																		<?php echo $film->country ?> 
																		<img src="<?php echo $film->flag ?>" /> 
																	</li>
																	<li><strong>Año: </strong><?php echo $film->year ?></li>
																	<li><strong>Puntuación: </strong><?php echo $film->average ?></li>
																	<li><strong>Votos: </strong><?php echo $film->votes ?></li>
																	<li>
																		<strong>FilmAffinity: </strong>
																		<a target="_blank" href="<?php echo $film->link ?>">
																			Abrir ficha
																		</a>
																	</li>			     			
																</ul>
														  </div>
														</div>
													</div>

													<div class="panel panel-default">
														<div class="panel-heading" role="tab" id="headingSinopsis_<?php echo $index ?>">
															<h4 class="panel-title">
																<a role="button" data-toggle="collapse" data-parent="#accordion_<?php echo $index ?>" href="#collapseSinopsis_<?php echo $index ?>" aria-expanded="true" aria-controls="collapseSinopsis_<?php echo $index ?>">
																	<strong>Sinopsis</strong>
																</a>
															</h4>
														</div>
														<div id="collapseSinopsis_<?php echo $index ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSinopsis">
															<div class="panel-body">
																<?php echo $film->synopsis ?>
														  </div>
														</div>
													</div>

													<div class="panel panel-default">
														<div class="panel-heading" role="tab" id="headingGeneros_<?php echo $index ?>">
															<h4 class="panel-title">
																<a role="button" data-toggle="collapse" data-parent="#accordion_<?php echo $index ?>" href="#collapseGeneros_<?php echo $index ?>" aria-expanded="true" aria-controls="collapseGeneros_<?php echo $index ?>">
																	<strong>Géneros</strong></a>
																<?php getIcons($film->genere); ?>
															</h4>
														</div>
														<div id="collapseGeneros_<?php echo $index ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingGeneros">
															<div class="panel-body">
																<?php echo $film->genere ?>
														  </div>
														</div>
													</div>

													<div class="panel panel-default">
														<div class="panel-heading" role="tab" id="headingDireccion_<?php echo $index ?>">
															<h4 class="panel-title">
																<a role="button" data-toggle="collapse" data-parent="#accordion_<?php echo $index ?>" href="#collapseDireccion_<?php echo $index ?>" aria-expanded="true" aria-controls="collapseDireccion_<?php echo $index ?>">
																	<strong>Dirección & Producción</strong>
																</a>
															</h4>
														</div>
														<div id="collapseDireccion_<?php echo $index ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDireccion">
															<div class="panel-body">
																<p><strong>Dirección: </strong> <?php echo $film->director ?></p>
																
																<p><strong>Producción: </strong><?php echo $film->producer ?></p>
														  </div>
														</div>
													</div>

													<div class="panel panel-default">
														<div class="panel-heading" role="tab" id="headingCasting_<?php echo $index ?>">
															<h4 class="panel-title">
																<a role="button" data-toggle="collapse" data-parent="#accordion_<?php echo $index ?>" href="#collapseCasting_<?php echo $index ?>" aria-expanded="true" aria-controls="collapseCasting_<?php echo $index ?>">
																	<strong>Reparto</strong>
																</a>
															</h4>
														</div>
														<div id="collapseCasting_<?php echo $index ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCasting">
															<div class="panel-body">
																<?php echo $film->cast ?>
														  </div>
														</div>
													</div>										  	

												</div>
												
											</div>
										</div>
									</div>
									<?php } ?>

								</div> <!-- filter-tv -->
							</div> <!-- row -->
						</div> <!-- panel body -->
					
						<div class="panel-footer">
							<ul class="list-group">
								<li class="list-group-item list-group-item-info">Total: <?php echo count($films)-1; ?></li>
								<?php 
									if ($errFilms != "") {
										echo "<li class=\"list-group-item list-group-item-danger\">Errores: " . $errFilms . "</li>";
									}
								?>
						</ul>
						</div>
					</div><!-- cargado -->
				</div>
			</div>
		</div>

    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/filter-tv.js"></script>
	</body>
</html>
