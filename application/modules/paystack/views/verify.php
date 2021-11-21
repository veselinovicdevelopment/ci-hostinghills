<div class="box"> 
	
	<div class="box-body">
    <div class="row"> 	 	 
           <div class="col-md-4">
			<div class="box box-solid box-default">
				<div class="box-header"><?=lang('payment_verification')?></div>
				<div class="box-body">
			 
				<p>
				    <img src="<?=base_url()?>resource/images/gateways/paystack.png" />
				</p>
     
                <p>
				    <?=$response?>
                </p>
                
                <p>
				    <a href="<?=base_url() . $_SERVER['REQUEST_URI']?>" class="btn btn-warning btn-block"><?=lang('check_again')?></a>
				</p>
				 
             
			</div>
		</div>
	
		
		</div>

		 
      </div> 
  </div>
</div>
 
 