   <!-- Start Form -->
         <?php
        $attributes = array('class' => 'bs-example form-horizontal');
        echo form_open_multipart('settings/update', $attributes); ?>
           
                    <input type="hidden" name="settings" value="<?=$load_setting?>">  

                            <div class="form-group">
                            <label class="col-lg-3 control-label"><?=lang('domain_checker')?></label>
                            <div class="col-lg-5">
                                
                                </div>
                                <div class="col-lg-9" id="default_registrar">
                                    <input type ="radio" name="domain_checker" value="default" <?=(config_item('domain_checker') == 'default') ? 'checked="checked"' : ''?>> <span class="label label-default">Basic Checker</span> <hr>
                                    <input type ="radio" name="domain_checker" value="resellerclub" <?=(config_item('domain_checker') == 'resellerclub') ? 'checked="checked"' : ''?>> <span class="label label-default">ResellerClub</span> &nbsp; <a class="btn btn-default btn-xs" href="<?=base_url()?>registrars/resellerclub" data-toggle="ajaxModal" title="<?=lang('settings')?>"><i class="fa fa-cog"></i> <?=lang('settings')?></a><hr>
                                    <input type ="radio" name="domain_checker" value="namecheap" <?=(config_item('domain_checker') == 'namecheap') ? 'checked="checked"' : ''?>> <span class="label label-default">Namecheap</span> &nbsp; <a class="btn btn-default btn-xs" href="<?=base_url()?>registrars/namecheap" data-toggle="ajaxModal" title="<?=lang('settings')?>"><i class="fa fa-cog"></i> <?=lang('settings')?></a><hr>
                                    <input type ="radio" name="domain_checker" value="domainscoza" <?=(config_item('domain_checker') == 'domainscoza') ? 'checked="checked"' : ''?>> <span class="label label-default">DomainsCoZa</span> &nbsp; <a class="btn btn-default btn-xs" href="<?=base_url()?>registrars/domainscoza" data-toggle="ajaxModal" title="<?=lang('settings')?>"><i class="fa fa-cog"></i> <?=lang('settings')?></a><hr>
                                    <input type ="radio" name="domain_checker" value="whoisxmlapi" <?=(config_item('domain_checker') == 'whoisxmlapi') ? 'checked="checked"' : ''?>> <span class="label label-default">WhoisXMLApi</span> &nbsp; <small><?=lang('whoisxmlapi_signup')?></small><hr>
                                </div>
                            </div>
                            
                                
                            <div class="form-group">
                                <label class="col-lg-3 control-label"><?=lang('whoisxmlapi_key')?></label>
                                <div class="col-lg-5">                                   
                                    <input type="<?=config_item('demo_mode') == 'TRUE' ? 'password' : 'text';?>" name="whoisxmlapi_key" class="form-control" value="<?=config_item('whoisxmlapi_key')?>">
                                    <p>
                                    <span class="help-block m-b-none small text-danger"><?=lang('whoisxmlapi_description')?> </span>
                                    </p>
                                </div>
                            </div>                   
                  
           
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-<?=config_item('theme_color');?>"><?=lang('save_changes')?></button>
                    </div>
                 
        </form>
 
    <!-- End Form -->
 
