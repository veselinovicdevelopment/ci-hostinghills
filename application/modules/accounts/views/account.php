<?php $order = Order::get_order($id);
  $package = $this->db->where(array('item_id'=> $order->item_parent))->get('items_saved')->row();
  $client_cur = Client::get_by_user($this->session->userdata('user_id'))->currency;
  $disk_used = 0; 
  $bw_used = 0;
  $disk_limit = 0;
  $bw_limit = 0;
  
  if($order->server_type == 'cpanel') { 


        $this->load->library('Cpanel', $order->authkey);
        $params = array();
        $response = $this->cpanel->call('showbw', $params);      

        if(isset($response['data']['acct'])){
            $data = $response['data']['acct'];
            foreach($data AS $account) {
                if($account['maindomain'] == $order->domain) {
                    $bwused = $account["totalbytes"];
                    $bwlimit = $account["limit"];
                    $bw_used = $bwused / (1024 * 1024);
                    $bw_limit = $bwlimit / (1024 * 1024);
                }
            }
        }       

        $params = array( 
            'domain' => $order->domain
        );
        $response = $this->cpanel->call('accountsummary', $params); 

        if(isset($response['data']) && isset($response['data']['acct'][0])) { 
            $data = $response['data']['acct'][0];
            $disk_limit = preg_replace('/[^0-9]/', '', $data['disklimit']);
            $disk_used = preg_replace('/[^0-9]/', '', $data['diskused']); 
        } 
    
} 
 

if($order->server_type == 'directadmin') { 
        $req = array(
            'package' => $package->package_name
        );					

        $this->load->library('DirectAdmin', trim($order->authkey));			
        $response = $this->directadmin->query("CMD_API_PACKAGES_USER", $req, "GET"); 

        if(isset($response['quota'])) {
            $disk_limit = (is_numeric($response['quota'])) ? round($response['quota']) : $response['quota'];
            $bw_limit = (is_numeric($response['bandwidth'])) ? round($response['bandwidth']) : $response['bandwidth'];
        }

        $req = array(
            'user' => $order->username
        ); 		

        $response = $this->directadmin->query("CMD_API_SHOW_USER_USAGE", $req, "GET"); 
        if(isset($response['quota'])) {
            $disk_used = (is_numeric($response['quota'])) ? round($response['quota']) : $response['quota'];
            $bw_used = (is_numeric($response['bandwidth'])) ? round($response['bandwidth']) : $response['bandwidth'];
        }
}



if($order->server_type == 'plesk') { 
    $this->load->library('Plesk', trim($order->authkey)); 

    if($order->reseller_package == 'Yes') {
        $res = $this->plesk->getResellerUsage($order->username);
    }

    else {
        $res = $this->plesk->getUsage($order->domain);
    }
    

    $res = json_decode(json_encode($res), true);
 

    if(isset($res['limits']['limit'])) {
        foreach($res['limits']['limit'] as $limit) {

            if($limit['name'] == 'disk_space') {
                if($limit['value'] > 0) { $disk_limit = $limit['value'] / (1024 * 1024); }
            }

            if($limit['name'] == 'max_traffic') {
                if($limit['value'] > 0) { $bw_limit = $limit['value'] / (1024 * 1024); }
            }
        }                
    }


    if($order->reseller_package == 'Yes') {
  
            if($res['stat']['disk-space'] > 0) { $disk_usage = $res['stat']['disk-space'] / (1024 * 1024); }  
            if($res['stat']['traffic'] > 0) { $bw_usage =$res['stat']['traffic'] / (1024 * 1024); } 
            if(isset($res['stat']['traffic']) && $bw_limit == 0) {$bw_limit = 9999999999;}
    }

    else {
        
        if(isset($res['resource-usage']['resource'])) {
            foreach($res['resource-usage']['resource'] as $usage) {

                if($usage['name'] == 'disk_space') {
                    if($usage['value'] > 0) { $disk_usage = $usage['value'] / (1024 * 1024); }
                }

                if($usage['name'] == 'max_traffic') {
                    if($usage['value'] > 0) { $bw_usage= $usage['value'] / (1024 * 1024); }
                }
            }                
        }
    }

     
     
}


   switch($order->order_status) {
        case 'pending' : $label = 'label-warning';
        break;

        case 'active' : $label = 'label-success';
        break;

        case 'suspended' : $label = 'label-danger';
        break;

        default : $label = 'label-default';
        break;
    }

?>

<div class="box">
		<div class="box-header with-border">   
        <?php if ($order->status_id == 6 && $package->allow_upgrade == 'Yes') { ?><a href="<?=base_url()?>accounts/change?plan=<?=$order->item_parent?>&account=<?=$id?>" class="btn btn-sm btn-twitter" data-toggle="ajaxModal"><?=lang('upgrade_downgrade')?></a><?php } ?>                  
               
        <?php if(User::is_admin() || User::perm_allowed(User::get_id(),'manage_accounts')) { ?>
            <div class="pull-right">                   
                <?php if($order->status_id != 6 && $order->status_id != 9) { ?>
                <a href="<?=base_url()?>accounts/activate/<?=$id?>" class="btn btn-sm btn-success" data-toggle="ajaxModal">
                <i class="fa fa-check"></i><?=lang('activate')?></a>
                <?php } else { ?>

                <a href="<?=base_url()?>accounts/manage/<?=$id?>"  
                    class="btn btn-sm btn-primary">
                <i class="fa fa-edit"></i> <?=lang('manage')?></a>

                <?php } ?>

                <a href="<?=base_url()?>accounts/cancel/<?=$id?>"  
                    class="btn btn-sm btn-warning" data-toggle="ajaxModal">
                <i class="fa fa-minus-circle"></i> <?=lang('cancel')?></a>

                <a href="<?=base_url()?>accounts/delete/<?=$id?>" 
                    class="btn btn-sm btn-danger" data-toggle="ajaxModal">
                <i class="fa fa-trash-o"></i> <?=lang('delete')?></a>
            </div>
     <?php } ?>
                            </div>
							<!-- /.box-header -->
							<div class="box-body">	    
                                
                            <?php if($this->session->flashdata('message')): ?>
                                <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <?php echo $this->session->flashdata('message') ?>
                                </div>
                                <?php endif ?>
                                
                            <div class="row">
                                <div class="col-lg-5">
                                        <table class="table table-striped">
                                            <tr>
                                               <td colspan="2"><h2><?=$order->item_name?></h2></td>
                                            </tr>
                                            <tr>
                                                <td><?=lang('domain')?></td>
                                                <td><?=$order->domain?></td>
                                            </tr>
                                            <tr>
                                                <td><?=lang('status')?></td>
                                                <td><span class="label <?=$label?>"><?=ucfirst($order->order_status)?></span></td>
                                            </tr>
                                            <tr>
                                                <td><?=lang('order_date')?></td>
                                                <td><?=$order->date?></td>
                                            </tr>
                                            <tr>
                                                <td><?=lang('billed')?></td>
                                                <td><?=ucfirst($order->renewal)?></td>
                                            </tr>
                                            <tr>
                                                <td><?=lang('next_renewal')?></td>
                                                <td><?=$order->renewal_date?></td>
                                            </tr>
                                            <tr>
                                                <td><?=lang('amount')?></td>
                                                 <td><?php if(!User::is_admin() && !User::is_staff()) {                                         
                                                    echo Applib::format_currency($client_cur, Applib::client_currency($client_cur, $order->total_cost));
                                                    }
                                                    else{
                                                        echo Applib::format_currency(config_item('default_currency'), $order->total_cost);
                                                    }  ?></td>
                                            </tr>
                                            <tr>
                                                <td><?=lang('storage_limit')?></td>
                                                <td><?=$disk_limit?>MB</td>
                                            </tr>
                                            <tr>
                                             <td><?=lang('bandwidth_limit')?></td>
                                                <td><?=$bw_limit?>MB</td>
                                            </tr>
                                            <tr>
                                                <td><?=lang('control_panel')?></td>
                                                <td><?=($order->server_type != '') ? "<img class='' src='".base_url()."resource/images/".$order->server_type.".png'/>" : ""?> </td>
                                            </tr>
                                        </table>                                            
                                </div>       
                                
                                
                                
                                <?php if(is_numeric($disk_limit) && is_numeric($disk_used)) { ?>
                                    <div class="col-md-3">
                                        <div class="chart-responsive">
                                                <canvas id="storage" height="200"></canvas>
                                        </div>  
                                    </div>  

                                <?php } if (is_numeric($bw_limit) && is_numeric($bw_used)) {  ?>
                                    <div class="col-md-3">
                                        <div class="chart-responsive">
                                                <canvas id="bandwidth" height="200"></canvas>
                                        </div>  
                                    </div>

                                <?php } ?>

                            </div>
                                    
							
                                    <?php if($order->server_type == 'cpanel' || $order->server_type == 'plesk') {  

                                        if(User::is_admin() || User::perm_allowed(User::get_id(),'manage_accounts')) { ?>

										<?php if($order->status_id != 9) { ?>
										<a href="<?=base_url()?>accounts/suspend/<?=$id?>" class="btn btn-sm btn-google" data-toggle="ajaxModal">
										<i class="fa fa-lock"></i> <?=lang('suspend')?></a>

										<?php } if($order->status_id == 9) { ?>
											<a href="<?=base_url()?>accounts/unsuspend/<?=$id?>" class="btn btn-sm btn-info" data-toggle="ajaxModal">
										<i class="fa fa-unlock"></i> <?=lang('unsuspend')?></a>

									<?php } } }?>

                                    <?php if($order->server_type == 'directadmin') {                                        
                                        if(User::is_admin() || User::perm_allowed(User::get_id(),'manage_accounts')) { ?>
                                        <a href="<?=base_url()?>accounts/suspend_unsuspend/<?=$id?>" class="btn btn-sm btn-google">
										<i class="fa fa-unlock"></i> <?=lang('suspend_unsuspend')?></a>
                                    <?php } } ?>	
			
									<a href="<?=base_url()?>accounts/view_logins/<?=$id?>" class="btn btn-sm btn-success" data-toggle="ajaxModal">
									<i class="fa fa-eye"></i> <?=lang('view_cpanel_logins')?></a>
									<a href="<?=base_url()?>accounts/change_password/<?=$id?>" class="btn btn-sm btn-twitter" data-toggle="ajaxModal">
									<i class="fa fa-edit"></i> <?=lang('change_cpanel_password')?></a>
                                    <?php if($order->server_type == 'cpanel' || $order->server_type == 'plesk') { ?>
									 <a href="<?=base_url()?>accounts/login/<?=$id?>" class="btn btn-sm btn-warning" target="_blank">
                                     <i class="fa fa-sign-in"></i> &nbsp; <?=lang('control_panel')?></a> 
                                     
                                     <?php } if($order->server_type == 'directadmin') { ?>
                                     <?=sprintf("<form action=\"https://%s:%s/CMD_LOGIN\" class=\"direct_login\" method=\"post\" target=\"_blank\">" . "<input type=\"hidden\" name=\"username\" value=\"%s\" />" . "<input type=\"hidden\" name=\"password\" value=\"%s\" />" . "<input type=\"submit\" value=\"%s\" class=\"btn btn-sm btn-warning\" />" . "</form>", $order->hostname, $order->port, $order->username, $order->password, lang('control_panel'))?>
                                     <?php } ?>		
								</div>
							<!-- /.box-body -->
                        </div>
                        
 
<script type="text/javascript" src="<?=base_url()?>resource/js/charts/chartjs/Chart.min.js"></script>

<?php if(is_numeric($disk_limit) && is_numeric($disk_used) && $disk_limit > 0) { 
    $used = ($disk_used/$disk_limit) * 100; 
    $available = 100 - $used;
?>

<script type="text/javascript">
    (function($){
    "use strict";
        $(document).ready(function () {     
            new Chart($("#storage"), {
            type: 'doughnut',
            data: {
            labels: ['<?=lang('available')?>', '<?=lang('used')?>'],
            datasets: [
                {
                label: "",
                backgroundColor: ["#00BCD4","#9E9E9E"],                
                data: [<?=$available?>,<?=$used?>]
                }
            ]
            },
            options: {
            title: {
                display: true,
                text: '<?=lang('disk_usage')?>'
            },
            cutoutPercentage: 80,
            animation: {
					duration: 2000,
					animateRotate: true,
					animateScale: false,
					easing: 'easeInOutCirc'
					 
				}
            }
        });

    });
})(jQuery);
</script>

<?php } if (is_numeric($bw_limit) && is_numeric($bw_used) && $bw_limit > 0) { 
    $used = ($bw_used/$bw_limit) * 100; 
    $available = 100 - $used; 
?>

<script type="text/javascript">
    (function($){
    "use strict";
        $(document).ready(function () {     
            new Chart($("#bandwidth"), {
            type: 'doughnut',
            data: {
            labels: ['<?=lang('available')?>', '<?=lang('used')?>'],
            datasets: [
                {
                label: "",
                backgroundColor: ["#8BC34A", "#FF6384"],
                data: [<?=$available?>,<?=$used?>]
                }
            ]
            },
            options: {
            title: {
                display: true,
                text: '<?=lang('bandwidth_usage')?>'
            },
            cutoutPercentage: 80,
            animation: {
					duration: 2000,
					animateRotate: true,
					animateScale: false,
					easing: 'easeInCubic'
					 
				}
            }
        });

    });
})(jQuery);
</script>

<?php } ?>


 