<?php
$login = array(
	'name'        => 'login',
	'class'       => 'form-control',
	'placeholder' => lang( 'username' ),
	'value'       => set_value( 'login' ),
	'maxlength'   => 80,
	'size'        => 30,
);
if ( $login_by_username and $login_by_email ) {
	$login_label = 'Email or Username';
} elseif ( $login_by_username ) {
	$login_label = 'Username';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'        => 'password',
	'id'          => 'inputPassword',
	'placeholder' => lang( 'password' ),
	'size'        => 30,
	'class'       => 'form-control',
);
$remember = array(
	'name'    => 'remember',
	'id'      => 'remember',
	'value'   => 1,
	'checked' => set_value( 'remember' ),
);
$captcha  = array(
	'name'      => 'captcha',
	'id'        => 'captcha',
	'class'     => 'form-control',
	'maxlength' => 10,
);
?>


<div class="container inner">
		<div class="row"> 
		<div class="login-box"> 

		<section class="panel panel-default">
		 <header class="panel-heading d-flex align-items-center justify-content-between"> 
			 <h4 class="text-white mt-0"><?php echo lang( 'please_enter' ); ?> <?php echo lang( 'login_details' ); ?></h4>
			 <?php if ( config_item( 'allow_client_registration' ) == 'TRUE' ) { ?> 
				<a href="<?php echo base_url(); ?>auth/register" class="text-white"><?php echo lang( 'get_your_account' ); ?></a>
			<?php } ?>
			<?php echo modules::run( 'sidebar/flash_msg' ); ?>
		</header>
		<?php
		$attributes = array( 'class' => 'panel-body login border-0 pt-4' );
		echo form_open( $this->uri->uri_string(), $attributes );
		?>

			<div class="form-group row align-items-center mt-3">
				<div class="col-sm-4">
					<label class="control-label mb-0 font-weight-bold"><?php echo lang( 'email_user' ); ?></label>
				</div>
				<div class="col-sm-6">
					<?php echo form_input( $login ); ?>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-12">
					<span class="text-danger">
					<?php echo form_error( $login['name'] ); ?><?php echo isset( $errors[ $login['name'] ] ) ? $errors[ $login['name'] ] : ''; ?></span>
				</div>
			</div>
			<div class="form-group row align-items-center">
				<div class="col-sm-4">
					<label class="control-label mb-0 font-weight-bold"><?php echo lang( 'password' ); ?></label>
				</div>
				<div class="col-sm-6">
					<?php echo form_password( $password ); ?>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-12">
					<span class="text-danger"><?php echo form_error( $password['name'] ); ?><?php echo isset( $errors[ $password['name'] ] ) ? $errors[ $password['name'] ] : ''; ?></span>
				</div>
			</div>
			<div class="form-group text-center">
				<button type="submit" class="btn btn-submit btn-<?php echo config_item( 'theme_color' ); ?>"><?php echo lang( 'sign_in' ); ?> and <?php echo lang( 'continue' ); ?></button> 
			</div>
			<div class="form-group text-center mb-0">
				<a href="<?php echo base_url(); ?>auth/forgot_password" class=" m-t-xs"><?php echo lang( 'forgot_password' ); ?></a>
			</div>
	<table>

	<?php
	if ( $show_captcha ) {
		if ( $use_recaptcha ) {
			?>
			
			<?php echo $this->recaptcha->render(); ?>

	<?php } else { ?>
	<tr><td colspan="2"><p><?php echo lang( 'enter_the_code_exactly' ); ?></p></td></tr>


	<tr>
		<td colspan="3"><?php echo $captcha_html; ?></td>
		<td class="pl_5"><?php echo form_input( $captcha ); ?></td>
		<span class="text-danger"><?php echo form_error( $captcha['name'] ); ?></span>
	</tr>
			<?php
	}
	}
	?>
</table>

	
			 <?php echo form_close(); ?> 

				   <!-- footer -->
	  
 
			
		<!-- / footer -->

		</section>
		</div>
		</div>
		</div>
	 
