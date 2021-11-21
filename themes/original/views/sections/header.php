<header class="full-header">
	<nav class="navbar navbar-expand-md py-3 navbar-dark m-auto">
		<a class="navbar-brand mr-5" href="/">
			<img src="<?=base_url()?>resource/images/<?=config_item('company_logo')?>"  />
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse pull-right custom-menu" id="collapsibleNavbar">
			<?php blocks('main_menu', get_slug()); ?>
		</div>
	</nav>
</header>
