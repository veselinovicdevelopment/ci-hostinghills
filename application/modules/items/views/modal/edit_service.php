<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><?=lang('edit_item')?></h4>
		</div>
		<?php $item = Item::view_item($id); ?>
		
		<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'items/edit_item',$attributes); ?>
          <input type="hidden" name="r_url" value="<?=base_url()?>items?view=service">
		  <input type="hidden" name="item_id" value="<?=$item->item_id?>">
		  <input type="hidden" value="1" name="quantity">
		<div class="modal-body">
 

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('category')?> <span class="text-danger">*</span></label>
				<div class="col-lg-5">
					<select name="category" class="form-control m-b" required>				
						<?php foreach ($categories as $key => $cat) { ?>
                          <option value="<?=$cat->id?>" <?php echo ($item->category == $cat->id) ? 'selected' : ''; ?>><?=$cat->cat_name?></option>
                          <?php } ?>
                        </select>
				</div>
				<a href="<?=base_url()?>settings/add_category" class="btn btn-<?=config_item('theme_color');?> btn-sm" data-toggle="ajaxModal" title="<?=lang('add_category')?>"><i class="fa fa-plus"></i> <?=lang('add_category')?></a>
				</div>

 

          		<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('item_name')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$item->item_name?>" name="item_name" required>
				</div>
				</div>
				
				

				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('default_server')?> <span class="text-danger"></span></label>
				<div class="col-lg-8">
				<select id="server" name="server" class="form-control m-b">
					<?php foreach ($servers as $server) { ?>
					<option value="<?=$server->id?>" <?=($item->server == $server->id) ? 'selected' : ''?>><?=$server->name?> - <span class="label label-default"><small><?=$server->type?></small></span></option>
					<?php } ?>
				</select>
				</div>
				</div>	
				
			 
				<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('features')?> </label>
					<div class="col-lg-8">
					<textarea class="form-control ta" name="item_features" value="<?=$item->item_features?>"><?=$item->item_features?></textarea>
					</div>
					</div>

				
					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('setup_fee')?></label>
					<div class="col-lg-8">
						<input type="text"  class="form-control" value="<?=$item->setup_fee?>" name="setup_fee">
					</div>
					</div>

					

					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('full_payment')?></label>
					<div class="col-lg-8">
						<input type="text" id="price" class="form-control" value="<?=$item->unit_cost?>" name="unit_cost">
					</div>
					</div>


					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('package')?></label>
					<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$item->package_name?>" name="package_name">
					</div>
					</div>


					<small class="pull-right"><?=lang('no_of_payments_help')?></small> <br/>

				<div class="row" id="installment_form">
				<div class="col-md-6">
					<div class="form-group">
					<label class="col-lg-8 control-label"><?=lang('monthly')?></label>
					<div class="col-lg-4">
					<input type="text" class="form-control" value="<?=$item->monthly?>" name="monthly">
					</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="col-lg-8 control-label"><?=lang('no_of_payments')?></label>
						<div class="col-lg-4">
							<input type="text" class="form-control" value="<?=$item->monthly_payments?>" name="monthly_payments">
						</div>
					</div>
				</div>
			</div>
			
				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<label class="col-lg-8 control-label"><?=lang('quarterly')?></label>
					<div class="col-lg-4">
					<input type="text" class="form-control" value="<?=$item->quarterly?>" name="quarterly">
					</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="col-lg-8 control-label"><?=lang('no_of_payments')?></label>
						<div class="col-lg-4">
							<input type="text" class="form-control" value="<?=$item->quarterly_payments?>" name="quarterly_payments">
						</div>
					</div>
				</div>
			</div>

				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<label class="col-lg-8 control-label"><?=lang('semiannually')?></label>
					<div class="col-lg-4">
					<input type="text" class="form-control" value="<?=$item->semi_annually?>" name="semi_annually">
					</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="col-lg-8 control-label"><?=lang('no_of_payments')?></label>
						<div class="col-lg-4">
							<input type="text" class="form-control" value="<?=$item->semi_annually_payments?>" name="semi_annually_payments">
						</div>
						</div>
					</div>
				</div>



				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-lg-8 control-label"><?=lang('annually')?></label>
						<div class="col-lg-4">
						<input type="text" class="form-control" value="<?=$item->annually?>" name="annually">
						</div>
					</div>
				</div>

				<div class="col-md-6">					
					<div class="form-group">
						<label class="col-lg-8 control-label"><?=lang('no_of_payments')?></label>
						<div class="col-lg-4">
							<input type="text" class="form-control" value="<?=$item->annually_payments?>" name="annually_payments">
						</div>
						</div>
					</div>
				</div>


			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-lg-8 control-label"><?=lang('order')?></label>
						<div class="col-lg-4">
							<input type="text" id="order_by" class="form-control" value="<?=$item->order_by?>" name="order_by">
						</div>
					</div>
				 
				</div>
				

				<div class="col-md-6">
					<div class="form-group">
					<label class="col-lg-7 control-label"><?=lang('require_domain')?></label>
							<div class="col-lg-5">
								<label class="switch">
								<input type="hidden" value="off" name="require_domain" />
								<input type="checkbox" <?php if($item->require_domain == 'Yes'){ echo "checked=\"checked\""; } ?> name="require_domain">							
									<span></span>
								</label>
							</div>
						</div>
					</div>
				</div>
				
 			
			<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label class="col-lg-8 control-label"><?=lang('tax_rate')?> </label>
							<div class="col-lg-4">
								<select name="item_tax_rate" class="form-control m-b">
								<option value="<?=$item->item_tax_rate?>"><?=$item->item_tax_rate?></option>
									<option value="0.00"><?=lang('none')?></option>
									<?php foreach ($rates as $key => $tax) { ?>
									<option value="<?=$tax->tax_rate_percent?>"><?=$tax->tax_rate_name?></option>
									<?php } ?>
									</select>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
						<label class="col-lg-7 control-label"><?=lang('display')?></label>
						<div class="col-lg-5">
						<label class="switch">
									<input type="hidden" value="off" name="display" />
									<input type="checkbox" <?php if($item->display == 'Yes'){ echo "checked=\"checked\""; } ?> name="display">									
								<span></span>
							</label>
						</div>
					</div>
				</div>
			  </div> 



			  <div class="row">
					<div class="col-md-4"></div>
					
					<div class="col-md-8">
						<div class="form-group">
							<label class="col-lg-8 control-label"><?=lang('reseller_package')?></label>
								<div class="col-lg-4">
								<label class="switch">
										<input type="hidden" value="off" name="reseller_package" />
										<input type="checkbox" <?php if($item->reseller_package == 'Yes'){ echo "checked=\"checked\""; } ?> name="reseller_package">								
									<span></span>
								</label>
							</div>
						</div>		
					</div>
			  </div>
			  
 
			  <div class="row">
					<div class="col-md-4"></div>
					
					<div class="col-md-8">
					<div class="form-group">
							<label class="col-lg-8 control-label"><?=lang('allow_upgrade')?></label>
							<div class="col-lg-4">
							<label class="switch">
										<input type="hidden" value="off" name="allow_upgrade" />
										<input type="checkbox" <?php if($item->allow_upgrade == 'Yes'){ echo "checked=\"checked\""; } ?> name="allow_upgrade">									
									<span></span>
								</label>
							</div>
						</div>						
					</div>
			  </div> 


		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
		<button type="submit" class="btn btn-<?=config_item('theme_color');?>"><?=lang('save_changes')?></button>
		</form>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<script>
	$(this).showCategoryFields($('#item_category')[0]);	
</script>