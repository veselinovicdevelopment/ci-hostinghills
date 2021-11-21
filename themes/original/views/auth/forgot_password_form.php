<?php
$login = array(
	'name'      => 'login',
	'id'        => 'login',
	'class'     => 'form-control',
	'value'     => set_value( 'login' ),
	'maxlength' => 80,
	'size'      => 30,
);
if ( config_item( 'use_username', 'tank_auth' ) ) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
echo modules::run( 'sidebar/flash_msg' );
?>  
<div class="container inner">
		<div class="row"> 
		<div class="login-box"> 

		 
		 <section class="panel panel-default">
		<header class="panel-heading text-center"> <h4 class="text-white mb-0"><?php echo lang( 'forgot_password' ); ?></h4> </header>

		<?php
		$attributes = array( 'class' => 'panel-body border-0 pt-4' );
		echo form_open( $this->uri->uri_string(), $attributes );
		?>
			<div class="form-group row align-items-center">
				<div class="col-sm-4">
					<label class="control-label"><?php echo lang( 'email' ); ?>/<?php echo lang( 'username' ); ?></label>
				</div>
				<div class="col-sm-8">
					<?php echo form_input( $login ); ?>
				</div>
				<div class="col-12">
					<span class="text-hidden">
					<?php echo form_error( $login['name'] ); ?><?php echo isset( $errors[ $login['name'] ] ) ? $errors[ $login['name'] ] : ''; ?></span>
				</div>
			</div>
			<div class="form-group row text-center">
				<button type="submit" class="btn btn-danger mx-auto"><?php echo lang( 'get_new_password' ); ?></button>
			</div>
			<div class="row mt-4 mb-3">
				<div class="col-md-6">
						<?php if ( config_item( 'allow_client_registration' ) == 'TRUE' ) { ?>
						<p class="text-muted"><small><?php echo lang( 'do_not_have_an_account' ); ?></small></p> 
						<a href="<?php echo base_url(); ?>auth/register/" class="btn btn-info btn-block"><?php echo lang( 'get_your_account' ); ?></a>
						<?php } ?>
				</div>
				<div class="col-md-6">
						<p class="text-muted"><small><?php echo lang( 'already_have_an_account' ); ?></small></p> 
						<a href="<?php echo base_url(); ?>login" class="btn btn-<?php echo config_item( 'theme_color' ); ?> btn-block"><?php echo lang( 'sign_in' ); ?></a>
						<?php echo form_close(); ?>
				</div>
			</div>			


		

 </section>
	</div> 
	 </div>
 
	</div>
