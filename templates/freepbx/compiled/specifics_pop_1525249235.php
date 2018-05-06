<?php if(!defined('IN_RAINTPL')){exit('Hacker attempt');}?><html>
<head>
<title>PBX Endpoint Configuration Manager</title>
<script type="text/javascript" src="assets/js/jquery-1.7.1.min.js" language="javascript"></script>
<script type="text/javascript" src="assets/js/jquery-ui-1.8.9.min.js" language="javascript"></script>
<link href="assets/endpointman/css/main.css" rel="stylesheet" type="text/css">
<link href="assets/css/mainstyle.css" rel="stylesheet" type="text/css" />
<link href="assets/css/jquery-ui.css" rel="stylesheet" type="text/css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<script language="javascript">
function Close() {
	self.close();
}

function submitform() {
	$('#myform').append('<input type="hidden" name="button_save" value="Save"/>');
	document.myform.submit();
}
</script>
</head>
<body name="specific_pop">
<div id="page_body">
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
<?php
	$tpl = new RainTPL( RainTPL::$tpl_dir . dirname("variables"));
	$tpl->assign( $var );
		$tpl->draw(basename("variables"));
?>
	<form name="myform" id="myform" method="post" action=""><input type="hidden" id="value" name="value" value="<?php echo $var["value"];?>" />
		<table width="90%" class="alt_table" border="0" cellspacing="0" cellpadding="0">
<?php
	if( isset( $var["html_array"] ) && is_array( $var["html_array"] ) ){
		$counter1 = 0;
		foreach( $var["html_array"] as $key1 => $value1 ){ 
?>
			<tr><th align='left' colspan="2"><strong><?php echo $value1["title"];?></strong></th><th>Use Defaults</th></tr>
	<?php
		if( isset( $value1["data"] ) && is_array( $value1["data"] ) ){
			$counter2 = 0;
			foreach( $value1["data"] as $key2 => $value2 ){ 
?>
			<tr>
		<?php
			if( $value2["type"] == 'input' ){
?><td nowrap><?php
				if( isset($value2["tooltip"]) ){
?><a href="#" class="info"><?php echo $value2["description"];?><span><?php echo $value2["tooltip"];?></span></a><?php
				}
				else{
?><?php echo $value2["description"];?><?php
				}
?>:</td><td nowrap><input type='text' name='<?php echo $value2["key"];?>' id='<?php echo $value2["key"];?>' value='<?php echo $value2["value"];?>' size="<?php
				if( isset($value2["max_chars"]) ){
?><?php echo $value2["max_chars"];?><?php
				}
				else{
?>90<?php
				}
?>">
		<?php
			}
				elseif( $value2["type"] == 'textarea' ){
?><td nowrap><?php
					if( isset($value2["tooltip"]) ){
?><a href="#" class="info"><?php echo $value2["description"];?><span><?php echo $value2["tooltip"];?></span></a><?php
					}
					else{
?><?php echo $value2["description"];?><?php
					}
?>:</td><td nowrap><textarea rows="<?php
					if( isset($value2["rows"]) ){
?><?php echo $value2["rows"];?><?php
					}
					else{
?>2<?php
					}
?>" cols="<?php
					if( isset($value2["cols"]) ){
?><?php echo $value2["cols"];?><?php
					}
					else{
?>20<?php
					}
?>" name='<?php echo $value2["key"];?>' id='<?php echo $value2["key"];?>'><?php echo $value2["value"];?></textarea>
		<?php
				}
					elseif( $value2["type"] == 'radio' ){
?><td nowrap><?php
						if( isset($value2["tooltip"]) ){
?><a href="#" class="info"><?php echo $value2["description"];?><span><?php echo $value2["tooltip"];?></span></a><?php
						}
						else{
?><?php echo $value2["description"];?><?php
						}
?>:</td><td nowrap><?php
						if( isset( $value2["data"] ) && is_array( $value2["data"] ) ){
							$counter3 = 0;
							foreach( $value2["data"] as $key3 => $value3 ){ 
?>[<label><?php
							if( isset($value3["tooltip"]) ){
?><a href="#" class="info"><?php echo $value3["description"];?><span><?php echo $value3["tooltip"];?></span></a><?php
							}
							else{
?><?php echo $value3["description"];?><?php
							}
?>: <input type='radio' name='<?php echo $value3["key"];?>' id='<?php echo $value3["key"];?>' value='<?php echo $value3["value"];?>' <?php
							if( array_key_exists('checked',$value3) ){
?><?php echo $value3["checked"];?><?php
							}
?>></label>]<?php
								$counter3++;
							}
						}
?>
		<?php
					}
						elseif( $value2["type"] == 'list' ){
?><td nowrap><?php
							if( isset($value2["tooltip"]) ){
?><a href="#" class="info"><?php echo $value2["description"];?><span><?php echo $value2["tooltip"];?></span></a><?php
							}
							else{
?><?php echo $value2["description"];?><?php
							}
?>:</td><td nowrap><select name='<?php echo $value2["key"];?>' id='<?php echo $value2["key"];?>'><?php
							if( isset( $value2["data"] ) && is_array( $value2["data"] ) ){
								$counter3 = 0;
								foreach( $value2["data"] as $key3 => $value3 ){ 
?><option value='<?php echo $value3["value"];?>' <?php
								if( array_key_exists('selected',$value3) ){
?><?php echo $value3["selected"];?><?php
								}
?>><?php echo $value3["description"];?></option><?php
									$counter3++;
								}
							}
?></select>
		<?php
						}
							elseif( $value2["type"] == 'checkbox' ){
?><td nowrap><?php
								if( isset($value2["tooltip"]) ){
?><a href="#" class="info"><?php echo $value2["description"];?><span><?php echo $value2["tooltip"];?></span></a><?php
								}
								else{
?><?php echo $value2["description"];?><?php
								}
?>:</td><td nowrap><input type='checkbox' name='<?php echo $value2["key"];?>' id='<?php echo $value2["key"];?>' value='<?php echo $value2["value"];?>'>
		<?php
							}
								elseif( $value2["type"] == 'break' ){
?><td nowrap colspan="2">&nbsp;
		<?php
								}
									elseif( $value2["type"] == 'group' ){
?><td nowrap colspan="2"><hr><H3><?php
										if( isset($value2["tooltip"]) ){
?><a href="#" class="info"><?php echo $value2["description"];?><span><?php echo $value2["tooltip"];?></span></a><?php
										}
										else{
?><?php echo $value2["description"];?><?php
										}
?></H3>
		<?php
									}
										elseif( $value2["type"] == 'header' ){
?><td nowrap colspan="2"><strong><?php
											if( isset($value2["tooltip"]) ){
?><a href="#" class="info"><?php echo $value2["description"];?><span><?php echo $value2["tooltip"];?></span></a><?php
											}
											else{
?><?php echo $value2["description"];?><?php
											}
?></strong>
		<?php
										}
?>
		<?php
										if( isset($value2["aried"]) ){
?><label><input type='checkbox' name='ari_<?php echo $value2["ari"]["key"];?>' <?php
											if( isset($value2["ari"]["checked"]) ){
?><?php echo $value2["ari"]["checked"];?><?php
											}
?>>End User Editable (<a href="http://projects.colsolgrp.net/documents/29" target="_blank">Through ARI Module</a>)</label></td>
		<?php
										}
										else{
?></td>
		<?php
										}
?>

			</tr>
	<?php
											$counter2++;
										}
									}
?>
<?php
										$counter1++;
									}
								}
?>
		</table>
		<p>
		<button type=submit onClick="javascript:submitform();"><i class="icon-check green"></i> Submit</button>
		<button type=button onClick="javascript:Close();"><i class="icon-remove red"></i> Cancel</button>
	</p>
	</form>
</div>
</body>
</html>
