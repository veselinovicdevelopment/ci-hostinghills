
 <?php $client = User::is_client();?>  
        <div class="box">
                <div class="box-header clearfix hidden-print">
                    
                            <?php $inv = Invoice::view_by_id($id); ?>

                            <?php $l = Client::view_by_id($inv->client)->language; ?>

                            <?php $client_cur = Client::view_by_id($inv->client)->currency; ?>

                            <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                            <div class="btn-group pull-right">

                            <div class="btn-group">

                    <button class="btn btn-sm btn-<?=config_item('theme_color')?>  btn-responsive dropdown-toggle"
                            data-toggle="dropdown"><?= lang('options') ?> <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu">

                        <?php if(User::is_admin() || User::perm_allowed(User::get_id(),'email_invoices')): ?>

                            <li>
                                <a href="<?=base_url()?>invoices/send_invoice/<?=$inv->inv_id?>" data-toggle="ajaxModal"
                                title="<?= lang('email_invoice') ?>"><i class="fa fa-paper-plane-o"></i> <?=lang('email_invoice')?>
                                </a>
                            </li>
                        <?php endif; ?>


                        <?php if(User::is_admin() || User::perm_allowed(User::get_id(),'send_email_reminders')) : ?>

                            <li>
                                <a href="<?=base_url()?>invoices/remind/<?=$inv->inv_id?>" data-toggle="ajaxModal"
                                title="<?=lang('send_reminder')?>"><i class="fa fa-envelope-o"></i> <?= lang('send_reminder') ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    

                        <li>
                            <a href="<?= base_url() ?>invoices/transactions/<?= $inv->inv_id ?>">
                            <i class="fa fa-credit-card"></i> <?= lang('payments') ?>
                            </a>
                        </li>

                        <?php if(User::is_admin() && Invoice::get_invoice_due_amount($inv->inv_id) > 0) : ?>

                            <li>
                                <a href="<?=base_url() ?>invoices/mark_as_paid/<?=$inv->inv_id?>" data-toggle="ajaxModal">
                                <i class="fa fa-money"></i> <?=lang('mark_as_paid') ?>
                                </a>
                            </li>

                            <li>
                                <a href="<?=base_url() ?>invoices/cancel/<?=$inv->inv_id?>" data-toggle="ajaxModal">
                                <i class="fa fa-ban"></i> <?=lang('cancelled') ?>
                                </a>
                            </li>

                        <?php endif; ?>
                        
                        <?php if ($inv->recurring == 'Yes') { ?>
                                <?php if(User::is_admin() || User::perm_allowed(User::get_id(),'edit_all_invoices')){ ?>
                                    <li>
                                    <a href="<?= base_url() ?>invoices/stop_recur/<?=$inv->inv_id?>"
                                    title="<?= lang('stop_recurring') ?>" data-toggle="ajaxModal">
                                        <i class="fa fa-retweet"></i> <?= lang('stop_recurring') ?>
                                    </a>
                                    </li>
                                <?php }  } ?>


                                <?php if (User::is_admin() || User::perm_allowed(User::get_id(),'edit_all_invoices')) { ?>
                              <li>
                                <a href="<?= base_url() ?>invoices/edit/<?=$inv->inv_id?>"
                                data-original-title="<?=lang('edit_invoice')?>"
                                data-toggle="tooltip" data-placement="bottom"><i class="fa fa-pencil"></i> <?=lang('edit')?>
                                </a>
                                </li>

                                <li>
                                <a href="<?= base_url() ?>invoices/items/insert/<?=$inv->inv_id ?>"
                                title="<?= lang('item_quick_add') ?>" data-toggle="ajaxModal">
                                    <i class="fa fa-plus"></i> <?= lang('add_item') ?>
                                </a>
                                </li>

                                <li>
                                <?php } if (User::is_admin() || User::perm_allowed(User::get_id(),'delete_invoices')) { ?>

                                <a href="<?= base_url() ?>invoices/delete/<?=$inv->inv_id?>" 
                                title="<?=lang('delete_invoice')?>" data-toggle="ajaxModal"><i class="fa fa-trash"></i> <?=lang('delete')?>
                                </a>
                                </li>

                                <?php }  if (User::is_admin() || User::perm_allowed(User::get_id(),'edit_all_invoices')) : ?>

                            <?php if ($inv->show_client == 'Yes') { ?>
                                <li>
                                <a href="<?= base_url() ?>invoices/hide/<?=$inv->inv_id ?>"> <i class="fa fa-eye-slash"></i> <?=lang('hide_to_client') ?></a>
                                </li>

                            <?php } else { ?>
                                <li>
                                <a href="<?= base_url() ?>invoices/show/<?= $inv->inv_id ?>"
                                data-toggle="tooltip" data-original-title="<?= lang('show_to_client') ?>" data-placement="bottom">
                                    <i class="fa fa-eye"></i> <?= lang('show_to_client') ?>
                                </a>
                                </li>
                            <?php } ?>

                            <?php endif; ?>

                                                
                            </ul>
                            </div>
 

                            <?php if (Invoice::get_invoice_due_amount($inv->inv_id) > 0) : ?>

                            <?php if (User::is_admin() || User::perm_allowed(User::get_id(),'pay_invoice_offline')
                                && (Invoice::get_invoice_due_amount($inv->inv_id) > 0) ) { ?>

                                <a class="btn btn-sm bg-green btn-responsive"
                                href="<?=base_url()?>invoices/pay/<?=$inv->inv_id?>" data-toggle="tooltip"
                                data-original-title="<?=lang('pay_invoice')?>" data-placement="bottom">
                                    <i class="fa fa-money"></i> <?= lang('add_payment') ?>
                                </a>

                            <?php } ?>

                                <?php if ($inv->allow_paypal == 'Yes') : ?>

                                    <a class="btn btn-sm btn-twitter btn-responsive"
                                    href="<?=base_url() ?>paypal/pay/<?=$inv->inv_id ?>" data-toggle="ajaxModal"
                                    title="<?=lang('via_paypal')?>"> <i class="fa fa-paypal"></i> Paypal
                                    </a>

                                <?php endif; ?>


                                <?php if ($inv->allow_mollie == 'Yes') : ?>

                                    <a class="btn btn-sm btn-default btn-responsive"
                                    href="<?=base_url() ?>mollie/pay/<?=$inv->inv_id ?>"> <i class="fa fa-credit-card"></i> Mollie
                                    </a>
                                <?php endif; ?>


                                <?php if ($inv->allow_razorpay == 'Yes') : ?>

                                <a class="btn btn-sm btn-primary btn-responsive"
                                href="<?=base_url() ?>razorpay/pay/<?=$inv->inv_id ?>"> <i class="fa fa-credit-card"></i> Razorpay
                                </a>
                                <?php endif; ?>

                                
                                <?php if ($inv->allow_payfast == 'Yes') : ?>

                                <a class="btn btn-sm btn-google btn-responsive"
                                href="<?=base_url() ?>payfast/pay/<?=$inv->inv_id ?>"> <i class="fa fa-credit-card"></i> Payfast
                                </a>
                                <?php endif; ?>


                                <?php if ($inv->allow_paystack == 'Yes') : ?>

                                <a class="btn btn-sm btn-twitter btn-responsive"
                                href="<?=base_url() ?>paystack/pay/<?=$inv->inv_id ?>"> <i class="fa fa-credit-card"></i> Paystack
                                </a>
                                <?php endif; ?>



                                <?php if ($inv->allow_instamojo == 'Yes') : ?>

                                    <a class="btn btn-sm btn-linkedin btn-responsive"
                                    href="<?=base_url() ?>instamojo/pay/<?=$inv->inv_id ?>"> <i class="fa fa-credit-card"></i> Instamojo
                                    </a>
                                    <?php endif; ?>



                                <?php if ($inv->allow_coinpayments == 'Yes') : ?>
                                    <a class="btn btn-sm btn-warning btn-responsive"
                                    href="<?=base_url() ?>coinpayments/pay/<?=$inv->inv_id ?>" data-toggle="ajaxModal"
                                    title="<?=lang('via_coinpayments')?>"> <i class="fa fa-bitcoin"></i> Coin Payments
                                    </a>
                                 <?php endif; ?>


                                <?php if ($inv->allow_2checkout == 'Yes') : ?>

                                    <a class="btn btn-sm btn-foursquare btn-responsive"
                                    href="<?= base_url() ?>checkout/pay/<?=$inv->inv_id?>"
                                    data-toggle="ajaxModal" title="<?= lang('via_2checkout') ?>">
                                    <i class="fa fa-credit-card-alt"></i> 2Checkout
                                    </a>

                                <?php endif; ?>
                                <?php if ($inv->allow_stripe == 'Yes') : ?>
                                    <button id="customButton" class="btn btn-sm btn-dropbox btn-responsive">
                                    <i class="fa fa-cc-stripe"></i> Stripe
                                    </button>

                                <?php endif; ?>
                                <?php if ($inv->allow_bitcoin == 'Yes') : ?>

                                    <a class="btn btn-sm btn-google btn-responsive"
                                    href="<?= base_url() ?>bitcoin/pay/<?= $inv->inv_id ?>" data-toggle="ajaxModal"
                                    title="<?= lang('via_bitcoin') ?>"> <i class="fa fa-btc"></i> Bitcoin
                                    </a>


                                <?php endif; ?>
                             <?php endif; ?>


                            <?php if (config_item('pdf_engine') == 'invoicr') : ?>
                                <a href="<?= base_url() ?>invoices/pdf/<?= $inv->inv_id ?>" class="btn btn-sm btn-<?=config_item('theme_color')?> btn-responsive">
                                    <i class="fa fa-file-pdf-o"></i> <?=lang('pdf') ?>
                                </a>
 
                            </div>
                            <?php endif; ?> 
                        </div>
                    </div>
                  </div>



                <div class="box-body ie-details">
                    <?php if(Invoice::payment_status($inv->inv_id) == 'fully_paid'){ ?>
                        <div id="ember2686" disabled="false" class="ribbon ember-view popovercontainer" data-original-title="" title="">  
                            <div class="ribbon-inner ribbon-success">
                            <?=lang('paid')?>
                        </div>
                        </div>
                        <?php } ?>

                        <?php if(Invoice::payment_status($inv->inv_id) != 'fully_paid' && $inv->status != 'Cancelled'){ ?>
                        <div id="ember2686" disabled="false" class="ribbon ember-view popovercontainer" data-original-title="" title="">  
                            <div class="ribbon-inner ribbon-danger">
                            <?=lang('unpaid')?>
                        </div>
                        </div>
                        <?php } ?>

                        <!-- Start Display Details -->
                        <?php if($inv->status != 'Cancelled') : ?>
                        <?php
                        if (!$this->session->flashdata('message')) :
                            if (strtotime($inv->due_date) < time() && Invoice::get_invoice_due_amount($inv->inv_id) > 0) :
                                ?>
                                <div class="alert alert-warning hidden-print">
                                    <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-warning"></i>
                                    <?= lang('invoice_overdue') ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php else: ?>
                            <div class="alert alert-danger hidden-print">
                                <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-warning"></i>
                                This Invoice is Cancelled!
                            </div>

                        <?php endif; ?>

                    
                        <div class="row">
                            <div class="col-xs-6">
                                <div style="height: <?=config_item('invoice_logo_height')?>px">
                                    <img class="ie-logo img-responsive" src="<?= base_url() ?>resource/images/logos/<?= config_item('invoice_logo') ?>">
                                </div>
                            </div>
                            <div class="col-xs-6 text-right">

                              
                                <div>
                                    <?=lang('reference')?>
                                    <span class="col-xs-2 no-gutter-right pull-right">
                                    <strong>
                                        <?=$inv->reference_no?>
                                    </strong>
                                    </span>
                                </div>


                                <div>
                                    <?=lang('invoice_date')?>
                                    <span class="col-xs-2 no-gutter-right pull-right">
                                    <strong>
                                        <?=strftime(config_item('date_format'), strtotime($inv->date_saved)); ?>
                                    </strong>
                                    </span>
                                </div>

                                <?php if ($inv->recurring == 'Yes') { ?>
                                    <div>
                                        <?= lang('recur_next_date') ?>
                                        <span class="col-xs-2 no-gutter-right pull-right">
                                    <strong>
                                        <?=strftime(config_item('date_format'), strtotime($inv->recur_next_date)); ?>
                                    </strong>
                                    </span>
                                    </div>
                                <?php } ?>

                                <div>
                                    <?= lang('payment_due') ?>
                                    <span class="col-xs-2 no-gutter-right pull-right">
                                        <strong>
                                            <?=strftime(config_item('date_format'), strtotime($inv->due_date)); ?>
                                        </strong>
                                        </span>
                                </div>


                                <div>
                                    <?= lang('payment_status') ?>
                                    <span class="col-xs-2 no-gutter-right pull-right">
                                        <span class="label bg-success">
                                        <?=lang(Invoice::payment_status($inv->inv_id))?>
                                        </span></span>
                                </div>
                            </div>
                        </div>
 

                        <div class="m-t">
                            <div class="row">

                                   <div class="col-xs-6">
                                  
                                        <h4>
                                            <?=(config_item('company_legal_name_' . $l)
                                                ? config_item('company_legal_name_' . $l)
                                                : config_item('company_legal_name'))
                                            ?>
                                        </h4>
                                        <p>

                                 

                                <span class="col-xs-12 no-gutter">
                                <?=(config_item('company_address_' . $l)
                                    ? config_item('company_address_' . $l)
                                    : config_item('company_address'))
                                ?><br>

                                    <?=(config_item('company_city_' . $l)
                                        ? config_item('company_city_' . $l)
                                        : config_item('company_city'))
                                    ?>

                                    <?php if (config_item('company_zip_code_' . $l) != '' || config_item('company_zip_code') != '') : ?>
                                        , <?=(config_item('company_zip_code_' . $l)
                                            ? config_item('company_zip_code_' . $l)
                                            : config_item('company_zip_code'))
                                        ?>
                                    <?php endif; ?><br>

                                    <?php if (config_item('company_state_' . $l) != '' || config_item('company_state') != '') : ?>

                                        <?=(config_item('company_state_' . $l)
                                            ? config_item('company_state_' . $l)
                                            : config_item('company_state')) ?>,
                                    <?php endif; ?>

                                    <?=(config_item('company_country_' . $l)
                                        ? config_item('company_country_' . $l)
                                        : config_item('company_country')) ?>
                            </span>
                            <br>
                                 
                                <span class="col-xs-12 no-gutter">
                                <?= lang('phone') ?>: 
                                <a href="tel:<?= (config_item('company_phone_' . $l)
                                    ? config_item('company_phone_' . $l)
                                    : config_item('company_phone')) ?>">

                                    <?=(config_item('company_phone_' . $l)
                                        ? config_item('company_phone_' . $l)
                                        : config_item('company_phone')) ?>
                                </a><br>

                                    <?php if (config_item('company_phone_2_'.$l) != '' || config_item('company_phone_2') != '') : ?>
                                        , <a href="tel:<?= (config_item('company_phone_2_' . $l)
                                            ? config_item('company_phone_2_' . $l)
                                            : config_item('company_phone_2')) ?>">

                                            <?=(config_item('company_phone_2_' . $l)
                                                ? config_item('company_phone_2_' . $l)
                                                : config_item('company_phone_2')) ?>
                                        </a><br>
                                    <?php endif; ?>
                            </span>
                           

                                            <?php if (config_item('company_fax_'.$l) != '' || config_item('company_fax') != '') : ?>
                                              <span class="col-xs-12 no-gutter"><?= lang('fax') ?>: 
                                <a href="tel:<?= (config_item('company_fax_' . $l) ? config_item('company_fax_' . $l) : config_item('company_fax')) ?>">
                                    <?=(config_item('company_fax_' . $l)
                                        ? config_item('company_fax_' . $l)
                                        : config_item('company_fax')) ?>
                                </a>
                            </span>
                                            <?php endif; ?>
                                            <?php if (config_item('company_registration_'.$l) != '' || config_item('company_registration') != '') : ?>
                                             
                                                <span class="col-xs-12 no-gutter">
                                                <?= lang('company_registration') ?>: 

                                <a href="tel:<?= (config_item('company_registration_' . $l) ? config_item('company_registration_' . $l) : config_item('company_registration')) ?>">
                                    <?=(config_item('company_registration_' . $l)
                                        ? config_item('company_registration_' . $l)
                                        : config_item('company_registration')) ?>
                                </a>
                            </span>
                            <?php endif; ?>

                            <?php if (config_item('company_vat_'.$l) != '' || config_item('company_vat') != '') : ?>

                            <span class="col-xs-12 no-gutter">
                            <?=lang('company_vat')?>: 
                            <?=(config_item('company_vat_' . $l)
                                ? config_item('company_vat_' . $l)
                                : config_item('company_vat')) ?><br>
                            <span>                           

                            <?php endif; ?>
                                        </p>
                                    </div>
                                

                                <div class="col-xs-6" id="invoice_client">
                                    
                                    <h4><?=Client::view_by_id($inv->client)->company_name;?></h4>
                                      <span>
                                        <?=Client::view_by_id($inv->client)->company_address?><br>
                                                <?=Client::view_by_id($inv->client)->city;?>
                                                <?php if (Client::view_by_id($inv->client)->zip != '') {
                                                    echo ", ".Client::view_by_id($inv->client)->zip;  } ?><br>

                                                <?php if (Client::view_by_id($inv->client)->state != '') {
                                                    echo Client::view_by_id($inv->client)->state.", ";  } ?>
                                                <?=Client::view_by_id($inv->client)->country; ?>
                                    </span>
                                        <br>
                                            <span>
                                            <?=lang('phone')?>: 
                                        <a href="tel:<?=Client::view_by_id($inv->client)->company_phone;?>">
                                            <?=ucfirst(Client::view_by_id($inv->client)->company_phone) ?>
                                        </a>&nbsp;
                                    </span>
                                    <br>

                                        <?php if (Client::view_by_id($inv->client)->company_fax != '') : ?>
                                            <span>
                                            <?=lang('fax')?>: 
                                        <a href="tel:<?=Client::view_by_id($inv->client)->company_fax;?>">
                                            <?=ucfirst(Client::view_by_id($inv->client)->company_fax) ?>
                                        </a>&nbsp;
                                    </span><br>
                                        <?php endif; ?>

                                        <?php if(Client::view_by_id($inv->client)->VAT != ''){ ?>
                                            <span>
                                            <?=lang('company_vat')?>: 
                                            <?=Client::view_by_id($inv->client)->VAT;?>
                                    </span>
                                        <?php } ?>

                                   
                                </div>
                               
                            </div>
                        </div>
                        <?php $showtax = config_item('show_invoice_tax') == 'TRUE' ? TRUE : FALSE; ?>
                        <div class="line"></div>
                        <table id="inv-details" class="table sorted_table small" type="invoices"><thead>
                            <tr>
                                <th></th>
                                <?php if ($showtax) : ?>
                                    <th width="20%"><?= lang('item_name') ?> </th>
                                    <th width="25%"><?= lang('description') ?> </th>
                                    <th width="7%" class="text-right"><?= lang('qty') ?> </th>
                                    <th width="10%" class="text-right"><?= lang('tax_rate') ?> </th>
                                    <th width="12%" class="text-right"><?= lang('unit_price') ?> </th>
                                    <th width="12%" class="text-right"><?= lang('tax') ?> </th>
                                    <th width="12%" class="text-right"><?= lang('total') ?> </th>
                                <?php else : ?>
                                    <th width="25%"><?= lang('item_name') ?> </th>
                                    <th width="35%"><?= lang('description') ?> </th>
                                    <th width="7%" class="text-right"><?= lang('qty') ?> </th>
                                    <th width="12%" class="text-right"><?= lang('unit_price') ?> </th>
                                    <th width="12%" class="text-right"><?= lang('total') ?> </th>
                                <?php endif; ?>
                                <th class="text-right inv-actions"></th>
                            </tr> </thead> <tbody>
                            <?php foreach (Invoice::has_items($inv->inv_id) as $key => $item) { ?>
                                <tr class="sortable" data-name="<?=$item->item_name?>" data-id="<?=$item->item_id?>">
                                    <td class="drag-handle"><i class="fa fa-reorder"></i></td>
                                    <td>

                                        <?php if (User::is_admin() || User::perm_allowed(User::get_id(),'edit_all_invoices')) { ?>
                                            <a class="text-info" href="<?=base_url()?>invoices/items/edit/<?=$item->item_id?>" data-toggle="ajaxModal"><?=$item->item_name?>
                                            </a>
                                        <?php } else { ?>
                                            <?=$item->item_name?>
                                        <?php } ?>
                                    </td>
                                    <td class="text-muted"><?=nl2br($item->item_desc)?></td>

                                    <td class="text-right"><?=Applib::format_quantity($item->quantity);?></td>
                                    <?php if ($showtax) : ?>
                                        <td class="text-right"><?=Applib::format_tax($item->item_tax_rate).'%';?></td>
                                    <?php endif; ?>
                                    <td class="text-right">
                                    <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, $item->unit_cost));
                                        }
                                        else{
                                            echo Applib::format_currency($inv->currency, $item->unit_cost);
                                        } 
                                    ?>                                     
                                    </td>
                                    <?php if ($showtax) : ?>
                                        <td class="text-right">
                                        <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, $item->item_tax_total));
                                        }
                                        else{
                                            echo Applib::format_currency($inv->currency, $item->item_tax_total);
                                        } 
                                       ?>   
                                     </td>
                                    <?php endif; ?>
                                    <td class="text-right">
                                    <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, $item->total_cost));
                                        }
                                        else{
                                            echo Applib::format_currency($inv->currency, $item->total_cost);
                                        } 
                                       ?>   
                                      </td>

                                    <td>
                                        <?php if (User::is_admin() || User::perm_allowed(User::get_id(),'edit_all_invoices')) { ?>
                                            <a class="hidden-print"
                                               href="<?= base_url() ?>invoices/items/delete/<?=$item->item_id?>/<?=$item->invoice_id ?>" data-toggle="ajaxModal"><i class="fa fa-trash-o text-danger"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php if (User::is_admin() || User::perm_allowed(User::get_id(),'edit_all_invoices')) { ?>

                                <?php if ($inv->status != 'Paid') { ?>
                                    <tr class="hidden-print">
                                        <?php $attributes = array('class' => 'bs-example form-horizontal');
                                        echo form_open(base_url() . 'invoices/items/add', $attributes);
                                        ?>
                                        <input type="hidden" name="invoice_id" value="<?=$inv->inv_id ?>">
                                        <input type="hidden" name="item_order" value="<?=count(Invoice::has_items($inv->inv_id)) + 1?>">
                                        <input id="hidden-item-name" type="hidden" name="item_name">
                                        <td></td>
                                        <td><input id="auto-item-name" data-scope="invoices" type="text" placeholder="<?=lang('item_name') ?>" class="typeahead form-control"></td>

                                         <td><textarea id="auto-item-desc" rows="1" name="item_desc" placeholder="<?= lang('item_description') ?>" class="form-control js-auto-size"></textarea></td>

                                        <td><input id="auto-quantity" type="text" name="quantity" value="1" class="form-control"></td>
                                        <?php if ($showtax) : ?>
                                            <td>
                                                <select name="item_tax_rate" class="form-control m-b">
                                                    <option value="0.00"><?= lang('none') ?></option>
                                                    <?php
                                                    foreach (Invoice::get_tax_rates() as $key => $tax) {
                                                        ?>
                                                        <option value="<?=$tax->tax_rate_percent?>" <?=config_item('default_tax') == $tax->tax_rate_percent ? ' selected="selected"' : '' ?>><?=$tax->tax_rate_name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        <?php endif; ?>
                                        <td><input id="auto-unit-cost" type="text" name="unit_cost" required placeholder="50.56" class="form-control"></td>
                                        <?php if ($showtax) : ?>
                                            <td><input type="text" name="tax" placeholder="0.00" readonly="" class="form-control"></td>
                                        <?php endif; ?>
                                        <td></td>
                                        <td><button type="submit" class="btn btn-<?=config_item('theme_color')?>"><i class="fa fa-check"></i> <?= lang('save') ?></button></td>
                                        </form>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            <tr>
                                <td colspan="<?= $showtax ? '7' : '5' ?>" class="text-right no-border"><strong><?= lang('sub_total') ?></strong></td>
                                <td class="text-right">
                                    <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, Invoice::get_invoice_subtotal($inv->inv_id)));
                                        }
                                        else{
                                            echo Applib::format_currency($inv->currency, Invoice::get_invoice_subtotal($inv->inv_id));
                                        } 
                                     ?>  
                                </td>

                                <td></td>
                            </tr>
                            <?php if ($inv->tax > 0.00): ?>
                                <tr>
                                    <td colspan="<?= $showtax ? '7' : '5' ?>" class="text-right no-border">
                                        <strong><?=config_item('tax_name')?> (<?=Applib::format_tax($inv->tax)?>%)</strong></td>
                                    <td class="text-right">
                                    <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, Invoice::get_invoice_tax($inv->inv_id)));
                                        }
                                        else{
                                           echo Applib::format_currency($inv->currency, Invoice::get_invoice_tax($inv->inv_id));
                                        } 
                                     ?>                                     
                                    </td>

                                    <td></td>

                                </tr>
                            <?php endif ?>

                             <?php if ($inv->tax2 > 0.00): ?>
                                <tr>
                                    <td colspan="<?= $showtax ? '7' : '5' ?>" class="text-right no-border">
                                        <strong><?= lang('tax') ?> 2 (<?=Applib::format_tax($inv->tax2)?>%)</strong></td>
                                    <td class="text-right">
                                    <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, Invoice::get_invoice_tax($inv->inv_id,'tax2')));
                                        }
                                        else{
                                           echo Applib::format_currency($inv->currency, Invoice::get_invoice_tax($inv->inv_id,'tax2'));
                                        } 
                                     ?>                                        
                                    </td>

                                    <td></td>

                                </tr>
                            <?php endif ?>

                            <?php if ($inv->discount > 0) { ?>
                                <tr>
                                    <td colspan="<?= $showtax ? '7' : '5' ?>" class="text-right no-border">
                                        <strong><?= lang('discount') ?> - <?php echo Applib::format_tax($inv->discount); ?>%</strong></td>
                                    <td class="text-right">
                                    <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, Invoice::get_invoice_discount($inv->inv_id)));
                                        }
                                        else{
                                           echo Applib::format_currency($inv->currency, Invoice::get_invoice_discount($inv->inv_id));
                                        } 
                                     ?> 
                                    </td>

                                    <td></td>

                                </tr>
                            <?php } ?>

                            <?php if ($inv->extra_fee > 0) { ?>
                                <tr>
                                    <td colspan="<?= $showtax ? '7' : '5' ?>" class="text-right no-border">
                                        <strong><?= lang('extra_fee') ?> - <?php echo $inv->extra_fee; ?>%</strong></td>
                                    <td class="text-right">
                                    <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, Invoice::get_invoice_fee($inv->inv_id)));
                                        }
                                        else{
                                           echo Applib::format_currency($inv->currency, Invoice::get_invoice_fee($inv->inv_id));
                                        } 
                                     ?>  
                                    </td>

                                    <td></td>

                                </tr>
                            <?php } ?>

                             <?php if (Invoice::get_invoice_paid($inv->inv_id) > 0) {
                                ?>
                                <tr>
                                    <td colspan="<?= $showtax ? '7' : '5' ?>" class="text-right no-border"><strong><?= lang('payment_made') ?></strong></td>
                                    <td class="text-right text-danger">
                                        (-) 
                                     <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, Invoice::get_invoice_paid($inv->inv_id)));
                                        }
                                        else{
                                           echo Applib::format_currency($inv->currency, Invoice::get_invoice_paid($inv->inv_id));
                                        } 
                                     ?>                                         
                                        
                                    </td>
                                    <td></td>
                                </tr>
                            <?php } ?>


                            <tr>
                                <td colspan="<?= $showtax ? '7' : '5' ?>" class="text-right no-border"><strong>
                                        <?=lang('due_amount')?></strong></td>
                                <td class="text-right">
                                <?php if(!User::is_admin() && !User::is_staff()) {                                         
                                           echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, Invoice::get_invoice_due_amount($inv->inv_id)));
                                        }
                                        else{
                                           echo Applib::format_currency($inv->currency, Invoice::get_invoice_due_amount($inv->inv_id));
                                        } 
                                     ?> 
                                    
                                </td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                 
                    <p><blockquote><?= $inv->notes ?></blockquote></p>

                    <?php if(!User::is_admin()) { ?>
                        <!-- START STRIPE PAYMENT -->

                    <?php if($inv->allow_stripe == 'Yes') { ?>

                        <script src="https://checkout.stripe.com/checkout.js"></script>

                        <script>
                            var handler = StripeCheckout.configure({
                                key: '<?=config_item('stripe_public_key')?>',
                                image: '<?=base_url()?>resource/images/<?=config_item('company_logo')?>',
                                token: function(token) {
                                    // Use the token to create the charge with a server-side script.
                                    // You can access the token ID with `token.id`
                                    $("#stripeToken").val(token.id);
                                    $("#stripeEmail").val(token.email);
                                    $("#stripeForm").submit();



                                }
                            });
                            $('#customButton').on('click', function(e) {
                                // Open Checkout with further options
                                handler.open({
                                    name: '<?=config_item('company_name')?>',
                                    description: 'INV REF: #<?=$inv->reference_no?> (<?=App::currencies($inv->currency)->symbol;?><?=Invoice::get_invoice_due_amount($inv->inv_id); ?>)',
                                    amount: '<?=Invoice::get_invoice_due_amount($inv->inv_id)*100?>',
                                    currency: '<?=$inv->currency?>'
                                });
                                e.preventDefault();
                            });
                            // Close Checkout on page navigation
                            $(window).on('popstate', function() {
                                handler.close();
                            });
                        </script>
                        <?php
    $attributes = array('id' => 'stripeForm');
          echo form_open(base_url().'stripepay/authenticate',$attributes); ?>
                            <input type="hidden" id="stripeToken" name="stripeToken"/>
                            <input type="hidden" id="stripeEmail" name="stripeEmail"/>
                            <input type="hidden" name="invoice" value="<?=$inv->inv_id?>"/>
                            <input type="hidden" name="ref" value="<?=$inv->reference_no?>"/>
                            <input type="hidden" name="amount" value="<?=Invoice::get_invoice_due_amount($inv->inv_id);?>"/>
                        </form>


                        <!-- END STRIPE CHECKOUT -->

                    <?php } ?>
                    <?php } ?>
                </div>
           </div> 

 