<?php
  if ( ! defined( 'ABSPATH' ) ) {
     exit;
 }
 wp_enqueue_script('vx-sorter');  
  ?><style type="text/css">
.vx_red{
color: #E31230;
}
  .vx_green{
    color:rgb(0, 132, 0);  
  }
      .crm_fields_table input , .crm_fields_table select{
      margin: 0px;
  }
      .vx_accounts_table .vx_pointer{
      cursor: pointer;
  }
  .vx_accounts_table .fa-caret-up , .vx_accounts_table .fa-caret-down{
      display: none;
  }
  .vx_accounts_table th.headerSortUp .fa-caret-down{ 
display: inline; 
} 
  .vx_accounts_table th.headerSortDown .fa-caret-up{ 
display: inline; 
}
</style>
<table class="widefat fixed sort striped vx_accounts_table" style="margin: 20px 0 50px 0">
<thead>
<tr> <th class="manage-column column-cb vx_pointer" style="width: 30px" ><?php _e("#",'cf7-pipedrive'); ?> <i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></th>  
<th class="manage-column vx_pointer"> <?php _e("Account",'cf7-pipedrive'); ?> <i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></th> 
<th class="manage-column"> <?php _e("Status",'cf7-pipedrive'); ?> </th> 
<th class="manage-column vx_pointer"> <?php _e("Created",'cf7-pipedrive'); ?> <i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></th> 
<th class="manage-column vx_pointer"> <?php _e("Last Connection",'cf7-pipedrive'); ?> <i class="fa fa-caret-up"></i><i class="fa fa-caret-down"></i></th> 
<th class="manage-column"> <?php _e("Action",'cf7-pipedrive'); ?> </th> </tr>
</thead>
<tbody>
<?php

$nonce=wp_create_nonce("vx_nonce");
if(is_array($accounts) && count($accounts) > 0){
 $sno=0;   
foreach($accounts as $id=>$v){
    $sno++; $id=$v['id'];
    $icon= $v['status'] == "1" ? 'fa-check vx_green' : 'fa-times vx_red';
    $icon_title= $v['status'] == "1" ? __('Connected','cf7-pipedrive') : __('Disconnected','cf7-pipedrive');
 ?>
<tr> <td><?php echo $id ?></td>  <td> <?php echo $v['name'] ?></td> 
<td> <i class="fa <?php echo $icon ?>" title="<?php echo $icon_title ?>"></i> </td> <td> <?php echo date('M-d-Y H:i:s', strtotime($v['time'])+$offset); ?> </td>
 <td> <?php echo date('M-d-Y H:i:s', strtotime($v['updated'])+$offset); ?> </td> 
<td><span class="row-actions visible"> <a href="<?php echo $page_link."&id=".$id ?>"><?php 
if($v['status'] == "1"){
_e('View','cf7-pipedrive');
}else{ 
_e('Edit','cf7-pipedrive');
} 
?></a> | <span class="delete"><a href="<?php echo $page_link.'&'.$this->id.'_tab_action=del_account&id='.$id.'&vx_nonce='.$nonce ?>" class="vx_del_account" > <?php _e("Delete",'cf7-pipedrive'); ?> </a></span></span> </td> </tr>
<?php
} }else{
?>
<tr><td colspan="6"><p><?php echo sprintf(__("No Pipedrive Account Found. %sAdd New Account%s",'cf7-pipedrive'),'<a href="'.$new_account.'">','</a>'); ?></p></td></tr>
<?php
}
?>
</tbody>
<tfoot>
<tr> <th class="manage-column column-cb" style="width: 30px" ><?php _e("#",'cf7-pipedrive'); ?></th>  
<th class="manage-column"> <?php _e("Account",'cf7-pipedrive'); ?> </th> 
<th class="manage-column"> <?php _e("Status",'cf7-pipedrive'); ?> </th> 
<th class="manage-column"> <?php _e("Created",'cf7-pipedrive'); ?> </th> 
<th class="manage-column"> <?php _e("Last Connection",'cf7-pipedrive'); ?> </th> 
<th class="manage-column"> <?php _e("Action",'cf7-pipedrive'); ?> </th> </tr>
</tfoot>
</table>
<script>
jQuery(document).ready(function($){
    $('.vx_accounts_table').tablesorter( {headers: { 2:{sorter: false}, 5:{sorter: false}}} );
   $(".vx_del_account").click(function(e){
     if(!confirm('<?php _e('Are you sure to delete Account ?','cf7-pipedrive') ?>')){
         e.preventDefault();
     }  
   }) 
})
</script>