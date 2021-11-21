<div class="box"> 
	
	<div class="box-body">
    <div class="row"> 	 	 
           <div class="col-md-4">
			<div class="box box-solid box-default">
				<div class="box-header"><?=lang('available_payment_methods')?></div>
				<div class="box-body">
				<?php
				if(is_array($methods)) {
					foreach ($methods[0] as $method) {
						echo '<div style="line-height:40px; vertical-align:top">';
						echo '<img src="' . htmlspecialchars($method->image->size1x) . '" srcset="' . htmlspecialchars($method->image->size2x) . ' 2x"> ';
						echo htmlspecialchars($method->description) . ' (' . htmlspecialchars($method->id) . ')';
						echo '</div>';
					}
				}
				else {
					echo $methods;
				}
			?>
			</div>
		</div>
	
		
		</div>

		 <div class="col-md-3">              
		 <?php
			$attributes = array('name'=>'mollie_form','class' => 'bs-example form-horizontal');
                        echo form_open(base_url().'mollie/process');  ?>
				<input name="invoice" value="<?=$id?>" type="hidden">
				<input name="currency" value="<?=$currency?>" type="hidden">
				<input name="due" value="<?= Applib::format_deci($due)?>" type="hidden">
	 
				<div class="form-group">
					<label class="control-label"><?=lang('due_amount')?> </label>					
					<input type="text" class="form-control" value="<?=$symbol .  Applib::format_deci($due)?>" readonly>					 
				</div>
            
					<button type="submit" class="btn btn-block btn-success"><?=lang('continue')?></button>
			 </form>
		</div>
      </div> 
  </div>
</div>
 
 