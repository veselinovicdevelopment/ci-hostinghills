<?php


if ( $use_username ) {
	$username = array(
		'name'      => 'username',
		'class'     => 'form-control',
		'value'     => set_value( 'username' ),
		'maxlength' => config_item( 'username_max_length', 'tank_auth' ),
		'size'      => 30,
	);
}
$email            = array(
	'name'      => 'email',
	'class'     => 'form-control',
	'value'     => set_value( 'email' ),
	'maxlength' => 80,
	'size'      => 30,
);
$fullname         = array(
	'name'  => 'fullname',
	'class' => 'form-control',
	'value' => set_value( 'fullname' ),
);
$company_name     = array(
	'name'  => 'company_name',
	'class' => 'form-control',
	'value' => set_value( 'company_name' ),
);
$password         = array(
	'name'      => 'password',
	'class'     => 'form-control',
	'value'     => set_value( 'password' ),
	'maxlength' => config_item( 'password_max_length', 'tank_auth' ),
	'size'      => 30,
);
$confirm_password = array(
	'name'      => 'confirm_password',
	'class'     => 'form-control',
	'value'     => set_value( 'confirm_password' ),
	'maxlength' => config_item( 'password_max_length', 'tank_auth' ),
	'size'      => 30,
);
$captcha          = array(
	'name'      => 'captcha',
	'id'        => 'captcha',
	'class'     => 'form-control',
	'maxlength' => 8,
);

$address = array(
	'name'  => 'address',
	'class' => 'form-control',
	'value' => set_value( 'address' ),
);

$phone = array(
	'name'  => 'phone',
	'class' => 'form-control',
	'value' => set_value( 'phone' ),
);
$city  = array(
	'name'  => 'city',
	'class' => 'form-control',
	'value' => set_value( 'city' ),
);
$state = array(
	'name'  => 'state',
	'class' => 'form-control',
	'value' => set_value( 'state' ),
);
$zip   = array(
	'name'  => 'zip',
	'class' => 'form-control',
	'value' => set_value( 'zip' ),
);

?>


<div class="container inner">
		<div class="row"> 
		<div class="login-box">

		 <section class="panel panel-default m-t-lg bg-white">
		<header class="panel-heading d-flex align-items-center justify-content-between"> 
			<h4 class="text-white mt-0"><?php echo lang( 'signup' ); ?></h4>
			<a class="text-white" href="<?php echo base_url(); ?>auth/login">Sign in</a>
		</header>
		<?php
		$attributes = array( 'class' => 'panel-body border-0 pt-4' );
		echo form_open( $this->uri->uri_string(), $attributes );
		?>
			<div class="form-group row align-items-center mt-3">
				<label class="control-label col-lg-3"><?php echo lang( 'company_name' ); ?></label>
				<div class="col-lg-9">
				<?php echo form_input( $company_name ); ?>
				<span class="text-hidden"><?php echo form_error( $company_name['name'] ); ?><?php echo isset( $errors[ $company_name['name'] ] ) ? $errors[ $company_name['name'] ] : ''; ?></span>
				</div>
			</div>

			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'full_name' ); ?></label>
				<div class="col-lg-9">
				<?php echo form_input( $fullname ); ?>
				<span class="text-hidden"><?php echo form_error( $fullname['name'] ); ?><?php echo isset( $errors[ $fullname['name'] ] ) ? $errors[ $fullname['name'] ] : ''; ?></span>
			</div>
			</div>

			<?php if ( $use_username ) { ?>
			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'username' ); ?></label>
				<div class="col-lg-9">
				<?php echo form_input( $username ); ?>
				<span class="text-hidden"><?php echo form_error( $username['name'] ); ?><?php echo isset( $errors[ $username['name'] ] ) ? $errors[ $username['name'] ] : ''; ?></span>
			</div>
			</div>

			<?php } ?>
			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'email' ); ?></label>
				<div class="col-lg-9">
				<?php echo form_input( $email ); ?>
				<span class="text-hidden">
				<?php echo form_error( $email['name'] ); ?><?php echo isset( $errors[ $email['name'] ] ) ? $errors[ $email['name'] ] : ''; ?></span>
			</div>
			</div>

			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'password' ); ?> </label>
				<div class="col-lg-9">
				<?php echo form_password( $password ); ?>
				<span class="text-hidden"><?php echo form_error( $password['name'] ); ?></span>
			</div>
			</div>

			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'confirm_password' ); ?> </label>
				<div class="col-lg-9">
				<?php echo form_password( $confirm_password ); ?>
				<span class="text-hidden"><?php echo form_error( $confirm_password['name'] ); ?></span>
			</div>
			</div>
			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'address' ); ?></label>
				<div class="col-lg-9">
					<?php echo form_input( $address ); ?>
					<span class="text-hidden"><?php echo form_error( $address['name'] ); ?><?php echo isset( $errors[ $address['name'] ] ) ? $errors[ $address['name'] ] : ''; ?></span>
				</div>
			</div>

		
			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'city' ); ?></label>
				<div class="col-lg-9">
					<?php echo form_input( $city ); ?>
					<span class="text-hidden"><?php echo form_error( $city['name'] ); ?><?php echo isset( $errors[ $city['name'] ] ) ? $errors[ $city['name'] ] : ''; ?></span>
				</div>
			</div>

			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'state_province' ); ?></label>
				<div class="col-lg-9">
					<?php echo form_input( $state ); ?>
					<span class="text-hidden"><?php echo form_error( $state['name'] ); ?><?php echo isset( $errors[ $state['name'] ] ) ? $errors[ $state['name'] ] : ''; ?></span>
				</div>
			</div>

			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'zip_code' ); ?></label>
				<div class="col-lg-9">
				<?php echo form_input( $zip ); ?>
					<span class="text-hidden"><?php echo form_error( $zip['name'] ); ?><?php echo isset( $errors[ $zip['name'] ] ) ? $errors[ $zip['name'] ] : ''; ?></span>
				</div>
			</div>

			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'country' ); ?></label>
				<div class="col-lg-9">
				<select class="form-control w_180" name="country" >
							<optgroup label="<?php echo lang( 'selected_country' ); ?>">
									<option value="<?php echo config_item( 'company_country' ); ?>"><?php echo config_item( 'company_country' ); ?></option>
							</optgroup>
							<optgroup label="<?php echo lang( 'other_countries' ); ?>">
									<?php foreach ( App::countries() as $country ) : ?>
									<option value="<?php echo $country->value; ?>"><?php echo $country->value; ?></option>
									<?php endforeach; ?>
							</optgroup>
					</select>
					</div>
			</div>
		
			<div class="form-group row align-items-center">
				<label class="control-label col-lg-3"><?php echo lang( 'phone' ); ?></label>
				<div class="col-lg-9">
				<?php echo form_input( $phone ); ?>
					<span class="text-hidden"><?php echo form_error( $phone['name'] ); ?><?php echo isset( $errors[ $phone['name'] ] ) ? $errors[ $phone['name'] ] : ''; ?></span>
				</div>
				<div class="col-12 mt-4 text-center">
					<button type="submit" class="btn btn-<?php echo config_item( 'theme_color' ); ?>"><?php echo lang( 'sign_up' ); ?>  and <?php echo lang( 'continue' ); ?></button>
				</div>
			</div>

			<table>

	<?php
	if ( $captcha_registration == 'TRUE' ) {
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
</section>
			
	</div>
	</div> 
	</div>

 
