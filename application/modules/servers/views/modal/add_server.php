<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><?=lang('add_server')?></h4>
		</div><?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'servers/add_server',$attributes); ?>
		<div class="modal-body"> 

					
					<div class="form-group">
						<label class="col-lg-4 control-label"><?=lang('type')?></label>
						<div class="col-lg-8">
							<select name="type" class="form-control m-b">
								<option value="cpanel"><?=lang('cpanel')?></option>
								<option value="plesk"><?=lang('plesk')?></option>
								<option value="directadmin"><?=lang('directadmin')?></option>
							</select>
						</div>
					</div>


					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('name')?></label>
					<div class="col-lg-8">
						<input type="text"class="form-control" name="name" >
					</div>
					</div>



					<div class="form-group">
                        <label class="col-lg-4 control-label"><?=lang('default_server')?></label>
                        <div class="col-lg-4">
                            <label class="switch">
                                <input type="hidden" value="off" name="selected" />
                                <input type="checkbox" name="selected">
                                <span></span>
                            </label>
                        </div>
					</div>
					


					<div class="form-group">
                        <label class="col-lg-4 control-label"><?=lang('use_ssl')?></label>
                        <div class="col-lg-4">
                            <label class="switch">
                                <input type="hidden" value="off" name="use_ssl" />
                                <input type="checkbox" name="use_ssl">
                                <span></span>
                            </label>
                        </div>
                    </div>


						
					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('server_hostname')?></label>
					<div class="col-lg-8">
						<input type="text" id="qty" class="form-control" name="hostname">
					</div>
					</div>

					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('port')?></label>
					<div class="col-lg-8">
						<input type="text" id="price" class="form-control" name="port">
					</div>
					</div>


					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('username')?></label>
					<div class="col-lg-8">
						<input type="text" id="qty" class="form-control" name="username">
					</div>
					</div>

					<div class="form-group">
					<label class="col-lg-4 control-label"><?=lang('authkey')?></label>
					<div class="col-lg-8">
						<input type="text" id="price" class="form-control" name="authkey">
					</div>
					</div>

		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
		<button type="submit" class="btn btn-<?=config_item('theme_color');?>"><?=lang('add_server')?></button>
		</form>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
