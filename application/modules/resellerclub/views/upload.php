 <div class="box">
     <div class="box-header">
          <h3><?lang('upload_resellerclub_csv')?></h3>   
          <p>
          <small>Download CSV from: ResellerClub > Tools > Reports > CSV Data Export > Domains</small>
          </p>       
     </div>
                <div class="box-body">
                <div class="container">

                <?php if($this->session->flashdata('message')): ?>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('message') ?>
                    </div>
                <?php endif ?>
              
                <?php
			 $attributes = array('class' => 'bs-example form-horizontal', 'enctype' => 'multipart/form-data');
          echo form_open(base_url().'resellerclub/upload', $attributes); ?> 
                    
                    <input type="hidden" name="nothing" value="">

                    <div class="form-group"> 
                       <input type="file" name="import">
                   </div>

                   
                   <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="<?=lang('upload')?>">
                   </div>
                </form>
              </div>                          
         </div>
 </div>
    