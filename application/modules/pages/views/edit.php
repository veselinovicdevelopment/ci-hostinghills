<?php $content = $content[0]; ?>
<div class="row">     <!-- Form start -->
<?=form_open_multipart()?>
            
            <div class="col-md-9 col-sm-12">
              <div class="box">
                <div class="box-body">
                  <div class="form-group">
                      <label><?=lang('title')?></label>
                      <?php echo form_input('title', set_value('title', $content->title), array('class' => 'form-control', 'id' => 'titleInput')); ?>
                            <?php echo form_error('title', '<p class="text-danger">', '</p>'); ?>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                      <label><?=lang('slug')?></label>
                      <?php echo form_input('slug', set_value('slug', $content->slug), array('class' => 'form-control', 'id' => 'slugInput')); ?>
                            <?php echo form_error('slug', '<p class="text-danger">', '</p>'); ?>
                  </div><!-- /.form-group -->
                  <div class="form-group">
                      <label><?=lang('body')?></label>
                      <?php echo form_textarea('body', set_value('body', $content->body, FALSE), array('class' => 'form-control foeditor', 'id' => 'body')); ?>
                      <?php echo form_error('body', '<p class="text-danger">', '</p>'); ?> 
                  </div><!-- /.form-group -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
 

            </div><!-- /.col-md8 -->

            <div class="col-md-3 col-sm-12">

      
              <!-- page settings -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=lang('page') . ' ' . lang('settings')?></h3>
                  <div class="box-tools pull-right">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">


                <div class="row">
                <label class="col-md-5"><?=lang('publish')?></label>
                <div class="col-md-7">
                <label class="switch">
                    <input type="hidden" value="off" name="status" />
                    <input type="checkbox" <?php if($content->status == 1){ echo "checked=\"checked\""; } ?> name="status">
                    <span></span>
                  </label>
                  </div> 
              </div>


              <div class="row">
                <label class="col-md-5"><?=lang('sidebar_right')?></label>
                <div class="col-md-7">
                <label class="switch">
                      <input type="hidden" value="off" name="sidebar_right" />
                      <input type="checkbox" <?php if($content->sidebar_right == 1){ echo "checked=\"checked\""; } ?> name="sidebar_right">
                      <span></span>
                  </label>
                  </div> 
              </div>


              <div class="row">
                <label class="col-md-5"><?=lang('sidebar_left')?></label>
                <div class="col-md-7">
                <label class="switch">
                        <input type="hidden" value="off" name="sidebar_left" />
                        <input type="checkbox" <?php if($content->sidebar_left == 1){ echo "checked=\"checked\""; } ?> name="sidebar_left">
                        <span></span>
                    </label>
                  </div> 
              </div>
 
                   
                  
                   
                  <div class="form-group">
                     <span class="check-label"><?=lang('menu')?>&nbsp;</span></label>
                          <select name="menu" class="form-control">   
                              <option value="0"><?=lang('none')?></option>                           
                              <?php  
                                foreach($menu_groups AS $menu) { ?>
                                  <option value="<?=$menu->id?>" <?=($menu->id == $content->menu) ? 'selected': '' ?>><?=$menu->title?></option>
                                <?php } ?>
                          </select> 
                  </div><!-- /.form-group -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->              
 

              <!-- Custom options -->
              <div class="box">
       

                <div class="box-body">                  
                  <hr>
                  <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> <?=lang('save')?></button>
               
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              

            </div><!-- /.col-md-4 -->

            <!-- Form close -->
            <?=form_close()?>

          </div><!-- /.row -->
<script>
$('#titleInput').on('keyup', function(){
  var path = $(this).val();
  path = path.replace(/ /g,"_").toLowerCase();
  $('#slugInput').val(path);
});

</script>