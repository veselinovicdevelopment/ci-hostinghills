<div class="box">
   
                <div class="box-body">
  
                <div class="table-responsive">
                <?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'namecheap/import_domains', $attributes); ?> 
                <table class="table table-striped b-t">
                    <thead>
                    <tr>
                        <th><?=lang('domain')?></th> 
                        <th><?=lang('client')?></th> 
                        <td><?=lang('created')?></td>
                        <td><?=lang('expires')?></td> 
                        <td><?=lang('select')?></td> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $data = (is_array($domains)) ? $domains : array();                    
                    foreach ($data as $acc) { ?>
                    <tr>
                        <td><?=$acc->Domain?></td>
                        <td><?=$acc->EmailAddress?></td>
                        <td><?=$acc->Created?></td>
                        <td><?=$acc->Expires?></td> 
                        <td><input type="checkbox" checked name="<?=$acc->Domain?>"></td>               
                    </tr>
                    <?php }  ?>
                   
                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>    
                        <td></td>
                        <td><button class="btn btn-success btn-block btn-sm"><?=lang('import')?></button></td>                 
                    </tr>
                    </tfoot>
                </table>  
                </form>
              </div>                          
        </div>
 </div>
    