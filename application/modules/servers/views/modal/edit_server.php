<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><?=lang('new_item')?></h4>
		</div><?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'servers/edit_server/'.$data->id,$attributes); ?>
		<div class="modal-body"> 


					<div class="form-group">
						<label class="col-lg-4 control-label"><?=lang('type')?></label>
						<div class="col-lg-8">
							<select name="type" class="form-control m-b">
								<option value="cpanel" <?php if($data->type == 'cpanel'){ echo "selected"; } ?>><?=lang('cpanel')?></option>
								<option value="plesk" <?php if($data->type == 'plesk'){ echo "selected"; } ?>><?=lang('plesk')?></option>
								<option value="directadmin" <?php if($data->type == 'directadmin'){ echo "selected"; } ?>><?=lang('directadmin')?></option>
							</select>
						</div>
					</div>
	
					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('name')?></label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="name" value="<?=$data->name?>">
					</div>
					</div>


					<div class="form-group">
                        <label class="col-lg-4 control-label"><?=lang('default_server')?></label>
                        <div class="col-lg-4">
                            <label class="switch">
                                <input type="hidden" value="off" name="selected" />
                                <input type="checkbox" <?php if($data->selected == 1){ echo "checked=\"checked\""; } ?> name="selected">
                                <span></span>
                            </label>
                        </div>
					</div>


					
					<div class="form-group">
                        <label class="col-lg-4 control-label"><?=lang('use_ssl')?></label>
                        <div class="col-lg-4">
                            <label class="switch">
                                <input type="hidden" value="off" name="use_ssl" />
                                <input type="checkbox" <?php if($data->use_ssl == 'Yes'){ echo "checked=\"checked\""; } ?> name="use_ssl">
                                <span></span>
                            </label>
                        </div>
                    </div>


					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('server_hostname')?></label>
					<div class="col-lg-8">
						<input type="text" id="qty" class="form-control" name="hostname" value="<?=$data->hostname?>">
					</div>
					</div>
	 

					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('port')?></label>
					<div class="col-lg-8">
						<input type="text" id="price" class="form-control" name="port" value="<?=$data->port?>">
					</div>
					</div>


					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('username')?></label>
					<div class="col-lg-8">
						<input type="text" id="qty" class="form-control" name="username" value="<?=$data->username?>">
					</div>
					</div>

					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('authkey')?></label>
					<div class="col-lg-8">
						<input type="<?=config_item('demo_mode') == 'TRUE' ? 'password' : 'text';?>"  id="price"  class="form-control" name="authkey" value="<?=$data->authkey?>">
					</div>
					</div>

		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
		<button type="submit" class="btn btn-<?=config_item('theme_color');?>"><?=lang('save')?></button>
		</form>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
