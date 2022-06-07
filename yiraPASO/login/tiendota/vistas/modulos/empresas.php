    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('vistas/img/bg-04.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Empresas
		</h2>
	</section>	

	<div class="sec-banner bg0 p-t-40 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-xl-3 p-b-20">
					<!-- Block1 -->
					<?php $empresas = ctrBTEmpresas::ctrgetEmpresas();
					foreach ($empresas as $empresa){
					?>
					<div class="block1 wrap-pic-w">
						<img src="<?php echo $empresa['imagen'] ?>" alt="IMG-BANNER">

						<a href="empresa" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?php echo $empresa['nombre'] ?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Compra ya
								</div>
							</div>
						</a>
					</div>
				</div>

                <div class="col-md-5 col-xl-3 p-b-20">
					<!-- Block1 -->
					<!-- <div class="block1 wrap-pic-w">
						<img src="vistas/img/banner-03.jpg" alt="IMG-BANNER">

						<a href="empresa" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Accesorios
								</span>

								<span class="block1-info stext-102 trans-04">
									Tendencia
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Compra ya
								</div>
							</div>
						</a>
					</div>-->

				<?php } ?>
				</div>

			</div>
		</div>
	</div>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div> 