<div class="box"> 
	
	<div class="box-body">
    <div class="row"> 	 	 
           <div class="col-md-4">
			<div class="box box-solid box-default">
				<div class="box-header"><?=lang('pay')?></div>
				<div class="box-body">
				<?php
				$amount = $due*100;
				$attributes = array('name'=>'paystack_form','class' => 'bs-example form-horizontal');
                        echo form_open(base_url().'paystack/process');  ?>
				<input name="invoice" value="<?=$id?>" type="hidden">
				<input name="amount" value="<?=$amount?>" type="hidden">
				<p>
				<img src="<?=base_url()?>resource/images/gateways/paystack.png" />
				</p>
	 
				<div class="form-group">
					<label class="control-label"><?=lang('due_amount')?> </label>					
					<input type="text" class="form-control" value="<?=$symbol . number_format($due,2)?>" readonly>					 
				</div>
            
				<input type="submit" class="btn btn-block btn-success" value="<?=(!empty(lang('pay_now'))) ? lang('pay_now') : 'Submit'?>">
			 </form>
			</div>
		</div>
	
		
		</div>

		 
      </div> 
  </div>
</div>
 
 