<div class="box">
    <div class="box-header font-bold">
         </div>
              <div class="box-body">

              <?php if($this->session->flashdata('message')): ?>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message') ?>
                    </div>
                <?php endif ?>

                <div class="table-responsive" id="registrars">
                    <div class="row">
                        <div class="col-md-7">
                            <table class="table table-striped b-t b-light">           
                                <tbody>
            
                                <tr>
                                    <td><img src="<?=base_url()?>resource/images/gateways/resellerclub.png" alt="ResellerClub" /></td>
                                    <td>ResellerClub</td>
                                    <td><a class="btn btn-primary btn-xs" href="<?=base_url()?>registrars/resellerclub" data-toggle="ajaxModal" title="<?=lang('settings')?>"><i class="fa fa-pencil"></i> <?=lang('settings')?></a></td>                                
                                    <td>
                                    <a class="btn btn-warning btn-xs" href="<?=base_url()?>resellerclub/upload/"  ><i class="fa fa-download"></i> <?=lang('import_accounts')?></a>
                                    </td>
                                    <td>
                                    <a class="btn btn-success btn-xs" href="<?=base_url()?>resellerclub/check_balance" data-toggle="ajaxModal" title="<?=lang('check_balance')?>" ><i class="fa fa-info-circle"></i> <?=lang('check_balance')?></a>
                                    </td>
                                </tr>    

                                <tr>
                                    <td><img src="<?=base_url()?>resource/images/gateways/namecheap.png" alt="Namecheap" /></td>
                                    <td>Namecheap</td>
                                    <td><a class="btn btn-primary btn-xs" href="<?=base_url()?>registrars/namecheap" data-toggle="ajaxModal" title="<?=lang('settings')?>"><i class="fa fa-pencil"></i> <?=lang('settings')?></a></td>                                
                                    <td>
                                    <a class="btn btn-warning btn-xs" href="<?=base_url()?>namecheap/import_domains/"  ><i class="fa fa-download"></i> <?=lang('import_accounts')?></a>
                                    </td>
                                    <td>
                                    <a class="btn btn-success btn-xs" href="<?=base_url()?>namecheap/check_balance" data-toggle="ajaxModal" title="<?=lang('check_balance')?>" ><i class="fa fa-info-circle"></i> <?=lang('check_balance')?></a>
                                    </td>
                                </tr>    

                                <tr>
                                    <td><img src="<?=base_url()?>resource/images/gateways/domainscoza.png" alt="DomainsCOZA" /></td>
                                    <td>DomainsCOZA</td>
                                    <td><a class="btn btn-primary btn-xs" href="<?=base_url()?>registrars/domainscoza" data-toggle="ajaxModal" title="<?=lang('settings')?>"><i class="fa fa-pencil"></i> <?=lang('settings')?></a></td>                                
                                    <td>
                                    <a class="btn btn-warning btn-xs" href="<?=base_url()?>domainscoza/import_domains/"  ><i class="fa fa-download"></i> <?=lang('import_accounts')?></a>
                                    </td>
                                    <td>
                                    <a class="btn btn-success btn-xs" href="<?=base_url()?>domainscoza/check_balance" data-toggle="ajaxModal" title="<?=lang('check_balance')?>" ><i class="fa fa-info-circle"></i> <?=lang('check_balance')?></a>
                                    </td>
                                </tr>    
                                </tbody>
                            </table> 
                          </div>                          
                    </div> 
              </div>                          
        </div>
 </div>
    