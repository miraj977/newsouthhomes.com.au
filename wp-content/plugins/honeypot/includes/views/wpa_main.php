<?php 
if (isset($_POST['submit-wpa-general-settings'])){
    $saveReturn = wpa_save_settings();
}

if (isset($_GET['tab'])){
  $currentTab = $_GET['tab'];
} else {
  $currentTab = 'settings';
}
?>

<?php if (isset($saveReturn)):?>
    <div class="updated <?php echo $saveReturn['status']; ?>" id="message"><p><?php echo $saveReturn['body']; ?></p></div>
  <?php endif; ?>
      
<div class="wrap">
    
    
    <h1>WP Armour - HoneyPot Anti Spam</h1>

    <nav class="nav-tab-wrapper">
        <?php foreach ($wpa_tabs as $tabKey => $tabData) { ?>
            <a href="?page=wp-armour&tab=<?php echo $tabKey; ?>" class="nav-tab <?php echo $currentTab == $tabKey?'nav-tab-active':''; ?>"><?php echo $tabData['name']; ?></a>
        <?php } ?>
    </nav>

    <div class="tab-content">
        <table width="100%">
            <tr>
                <td valign="top">
                <?php include($wpa_tabs[$currentTab]['path']); ?>
                </td>
                <td width="15">&nbsp;</td>
                <td width="250" valign="top"><?php include('wpa_sidebar.php'); ?></td>
            </tr>
        </table>
    </div>          
            
</div>