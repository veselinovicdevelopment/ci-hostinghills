                   <!-- Start create invoice -->
                    <div class="box"> 
                            <div class="box-body">

                                <?php
                                $attributes = array('class' => 'bs-example form-horizontal');
                                echo form_open(base_url().'invoices/add',$attributes);
                                ?>
                                <?php echo validation_errors(); ?>
                                


                                <div class="row">
                                <div class="col-md-6">

                                <div class="form-group">
                                            <label class="col-lg-3 control-label"><?=lang('client')?> <span class="text-danger">*</span> </label>
                                            <div class="col-lg-6">
                                                <select class="select2-option w_280" name="client" >
                                                    <optgroup label="<?=lang('clients')?>">
                                                        <?php foreach (Client::get_all_clients() as $client): ?>
                                                            <option value="<?=$client->co_id?>"><?=ucfirst($client->company_name)?></option>
                                                        <?php endforeach;  ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <a href="<?=base_url()?>companies/create" class="btn btn-<?=config_item('theme_color');?> btn-sm" data-toggle="ajaxModal" title="<?=lang('new_company')?>" data-placement="bottom"><i class="fa fa-plus"></i> <?=lang('new_client')?></a>
                                        </div>
 

                                <div class="form-group">
                                            <label class="col-lg-3 control-label"><?=lang('tax')?> </label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">%</span>
                                                    <input class="form-control money" type="text" value="<?=config_item('default_tax')?>" name="tax">
                                                </div>
                                            </div>
                                        </div>
                                
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label"><?=lang('discount')?></label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">%</span>
                                                    <input class="form-control money" type="text" value="<?=set_value('discount')?>" name="discount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3 control-label"><?=lang('extra_fee')?></label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">%</span>
                                                    <input class="form-control money" type="text" value="<?=set_value('extra_fee')?>" name="extra_fee">
                                                </div>
                                            </div>
                                        </div>

                                       
                                </div>

                                <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="col-lg-4 control-label"><?=lang('reference_no')?> <span class="text-danger">*</span></label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" value="<?=config_item('invoice_prefix')?><?php
                                                if(config_item('increment_invoice_number') == 'FALSE'){
                                                    $this->load->helper('string');
                                                    echo random_string('nozero', 6);
                                                }else{
                                                    echo Invoice::generate_invoice_number();
                                                }
                                                ?>" name="reference_no">
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label class="col-lg-4 control-label"><?=lang('due_date')?></label>
                                            <div class="col-lg-5">
                                                <input class="input-sm input-s datepicker-input form-control" size="16" type="text" value="<?=strftime(config_item('date_format'), strtotime("+".config_item('invoices_due_after')." days"));?>" name="due_date" data-date-format="<?=config_item('date_picker_format');?>" >
                                            </div>
                                        </div>


                                        <?php if(config_item('2checkout_live') == 'TRUE' && config_item('2checkout_private_key') != '' && config_item('2checkout_publishable_key') != ''){ ?>

                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_2checkout')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_2checkout">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_2checkout" value="off"> <?php } ?>


                                        <?php if(config_item('paypal_live') == 'TRUE' && config_item('paypal_email') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_paypal')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_paypal">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_paypal" value="off"> <?php } ?>


                                        <?php if(config_item('stripe_live') == 'TRUE' && config_item('stripe_private_key') != '' AND config_item('stripe_public_key') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_stripe')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_stripe">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_stripe" value="off"> <?php } ?>


                                        <?php if(config_item('mollie_live') == 'TRUE' && config_item('mollie_api_key') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_mollie')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_mollie">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_mollie" value="off"> <?php } ?>


                                        <?php if(config_item('instamojo_live') == 'TRUE' && config_item('instamojo_api_key') != '' AND config_item('instamojo_oath_token') != '' AND config_item('instamojo_hash') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_instamojo')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_instamojo">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_instamojo" value="off"> <?php } ?>


                                        <?php if(config_item('razorpay_live') == 'TRUE' && config_item('razorpay_api_key') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_razorpay')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_razorpay">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_razorpay" value="off"> <?php } ?>



                                        <?php if(config_item('payfast_live') == 'TRUE' && config_item('payfast_merchant_id') != '' AND config_item('payfast_merchant_key') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_payfast')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_payfast">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_payfast" value="off"> <?php } ?>



                                        <?php if(config_item('paystack_live') == 'TRUE' && config_item('payfast_secret_key') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_paystack')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_paystack">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_paystack" value="off"> <?php } ?>



                                        <?php if(config_item('coinpayments_live') == 'TRUE' && config_item('coinpayments_private_key') != '' AND config_item('coinpayments_public_key') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_coinpayments')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_coinpayments">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_coinpayments" value="off"> <?php } ?>


        
                                        <?php if(config_item('bitcoin_live') == 'TRUE' && config_item('bitcoin_address') != ''){ ?>
                                            <div class="form-group">
                                                <label class="col-lg-4 control-label"><?=lang('allow_bitcoin')?></label>
                                                <div class="col-lg-4">
                                                    <label class="switch">
                                                        <input type="checkbox" name="allow_bitcoin">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } else{ ?><input type="hidden" name="allow_bitcoin" value="off"> <?php } ?>

                                </div>
                                </div>

                                <div class="row">

                                
                                    <div class="col-lg-1"> </div>
                                        <div class="col-lg-9">
                                            <div class="form-group terms">
                                                <label class="control-label"><?=lang('notes')?> </label>
                                                <textarea name="notes" class="form-control foeditor" value="notes"><?=config_item('default_terms')?></textarea>
                                            </div>
                                        </div>
                                    </div>




                                <button type="submit" class="btn btn-sm btn-<?=config_item('theme_color');?> pull-right"><i class="fa fa-plus"></i> <?=lang('create_invoice')?></button>



                                </form>
                            </div> 
                    </div> 