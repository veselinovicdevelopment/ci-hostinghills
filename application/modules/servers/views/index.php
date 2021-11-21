<?php
$this->db->select('*'); 
$this->db->from('servers');
$servers = $this->db->get()->result(); 
?>


<div class="box">
    <div class="box-header font-bold">
        <i class="fa fa-server"></i> <?=lang('servers')?>
        <a href="<?=base_url()?>servers/add_server" data-toggle="ajaxModal" class="btn btn-sm btn-<?=config_item('theme_color');?> pull-right"><i class="fa fa-plus"></i> <?=lang('add_server')?></a>
        </div>
                <div class="box-body">
                <?php if(isset($response)) {?>
                    <div class="alert alert-info"><?=$response?></div> 
                <?php } ?>
                <div class="table-responsive">
                <table id="table-rates" class="table table-striped b-t b-light AppendDataTables">
                    <thead>
                    <tr>
                        <th><?=lang('type')?></th>
                        <th><?=lang('server_name')?></th>
                        <th><?=lang('server_host')?></th>
                        <th><?=lang('port')?></th>
                        <th><?=lang('default')?></th>
                        <th class="col-options no-sort"><?=lang('options')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($servers as $key => $r) { ?>
                    <tr>
                        <td><img src='<?=base_url()?>resource/images/<?=$r->type?>.png'/></td>
                        <td><?=$r->name?></td>
                        <td><?=$r->hostname?></td>
                        <td><?=$r->port?></td> 
                        <td><?=($r->selected == 1) ? '<i class="fa fa-check"></i>' : '' ?></td>                       
                        <td>
                        <a class="btn btn-success btn-xs" href="<?=base_url()?>servers/index/<?=$r->id?>"><i class="fa fa-settings"></i> <?=lang('test_connection')?></a>
                        <a class="btn btn-warning btn-xs" href="<?=base_url()?>servers/import/<?=$r->id?>"  ><i class="fa fa-download"></i> <?=lang('import_accounts')?></a>
                        <a class="btn btn-primary btn-xs" href="<?=base_url()?>servers/edit_server/<?=$r->id?>" data-toggle="ajaxModal" title="<?=lang('edit')?>"><i class="fa fa-pencil"></i> <?=lang('edit')?></a>
                <a class="btn btn-danger btn-xs" href="<?=base_url()?>servers/delete_server/<?=$r->id?>" data-toggle="ajaxModal" title="<?=lang('delete')?>"><i class="fa fa-trash"></i> <?=lang('delete')?></a>
                <a class="btn btn-success btn-xs" href="<?=base_url()?>servers/login/<?=$r->id?>" target="_blank" ><i class="fa fa-user"></i> <?=lang('login')?></a>
                        </td>
                    </tr>
                    <?php }  ?>
                    </tbody>
                </table>  
              </div>                          
        </div>
 </div>
    