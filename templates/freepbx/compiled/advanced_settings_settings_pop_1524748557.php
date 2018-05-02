<?php if(!defined('IN_RAINTPL')){exit('Hacker attempt');}?><html>
    <head>
        <title>PBX Endpoint Configuration Manager</title>
        <script type="text/javascript" src="assets/js/jquery-1.7.1.min.js" language="javascript"></script>
        <script type="text/javascript" src="assets/js/jquery-ui-1.8.9.min.js" language="javascript"></script>
        <script type="text/javascript" src="assets/endpointman/js/jquery.tools.min.js"></script>
        <script type="text/javascript" src="assets/endpointman/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="assets/endpointman/js/jquery.coda-slider-3.0.js"></script>
        <script type="text/javascript" src="assets/js/pbxlib.js"></script>
        <link href="assets/css/mainstyle.css" rel="stylesheet" type="text/css">
        <link href="assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
        <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->
        <link href="assets/endpointman/css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body name="advanced_settings_settings_pop">
      <div id="page_body">
        <div id="spinner">
        </div>
        <h1><face="Arial"><center><?php echo _('End Point Configuration Manager')?></center></h1>
        <hr>
<?php
	if( isset($var["show_error_box"]) ){
?>
    <?php
		$tpl = new RainTPL( RainTPL::$tpl_dir . dirname("message_box"));
		$tpl->assign( $var );
				$tpl->draw(basename("message_box"));
?>
<?php
	}
?>
<form action='' method='POST'>
<table width='90%' align='center'>
<tr>
<td width='50%' align='right'><?php echo _("IP address of phone server")?>:</td>
<td width='50%' align='left'><input type='text' id='srvip' name='srvip' value='<?php echo $var["srvip"];?>'><a href='#' onclick="document.getElementById('srvip').value = '<?php echo $var["ip"];?>'; "><?php echo _("Determine for me")?></a></td>
</tr>
<tr>
  <td align='right'><?php echo _("Configuration Type")?></td>
  <td align='left'>
      <select name="cfg_type" id="cfg_type" disabled>
            <option value="file">File (TFTP/FTP)</option>
            <option value="web">Web (HTTP)</option>
        </select>
  </td>
</tr>
<tr>
  <td align='right'><?php echo _("Global Final Config & Firmware Directory")?></td>
  <td align='left'><label>
    <input type="text" name="config_loc" value="<?php echo $var["config_location"];?>">
  </label></td>
</tr>
<tr>
  <td align='right'><br/></td>
  <td align='left'></td>
</tr>
<tr>
<td width='50%' align='right'><?php echo _("Time Zone")?> (<?php echo _('like')?> USA-5)</td>
<td width='50%' align='left'><select name="tz" id="tz">
	<?php
	if( isset( $var["list_tz"] ) && is_array( $var["list_tz"] ) ){
		$counter1 = 0;
		foreach( $var["list_tz"] as $key1 => $value1 ){ 
?>
	<option value="<?php echo $value1["value"];?>" <?php
		if( $value1["selected"] == 1 ){
?>selected='selected'<?php
		}
?>><?php echo $value1["text"];?></option>
	<?php
			$counter1++;
		}
	}
?>
</select>
</td>
</tr>
<tr>
<td width='50%' align='right'><?php echo _("Time Server (NTP Server)")?></td>
  <td align='left'><label>
    <input type="text" name="ntp_server" value="<?php echo $var["ntp_server"];?>">
  </label></td>
</tr>
<tr>
<td colspan='2' align='center'>
    <button type='Submit' name='button_update_globals'><i class='icon-save green'></i> <?php echo _('Update Global Overrides')?></button>
    <button type='Submit' name='button_reset_globals'><i class='icon-refresh red'></i> <?php echo _('Reset Global Overrides to Default')?></button>
    <button type=button onClick="javascript:window.close();"><i class='icon-remove red'></i> <?php echo _('Cancel')?></button>
</td>
</tr>

</table>
</form>
</div>
    </body>
</html>
