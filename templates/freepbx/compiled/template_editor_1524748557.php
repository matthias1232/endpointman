<?php if(!defined('IN_RAINTPL')){exit('Hacker attempt');}?><h2>Template Manager</h2>
<h3>Template Editor</h3>
<hr>
<?php
	if( isset($var["in_ari"]) ){
?>
<html>
    <head>
        <link href="theme/coda-slider-2.0a.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="theme/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="theme/js/jquery.coda-slider-3.0.js"></script>
        <script type="text/javascript">
            $().ready(function() {
                $('#coda-slider-9').codaSlider({
                    dynamicArrows: false,
                    continuous: false
                });
            });
        </script>
    </head>
    <body>
<?php
	}
	else{
?>
        <link href="assets/endpointman/theme/coda-slider.css" media="screen, projection" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">
    $().ready(function() {
        $('#coda-slider-9').codaSlider({
            dynamicArrows: false,
            continuous: false
        });
    });
    function Reload() {
        window.location.reload();
    }
        function popitup(url, name) {
            newwindow=window.open(url + '&custom=' + document.getElementById('custom').value + '&tid=' + document.getElementById('id').value + '&value=' + document.getElementById('altconfig_'+ name).value + '&rand=' + new Date().getTime(),'name','height=710,width=800,scrollbars=yes,location=no');
                if (window.focus) {newwindow.focus()}
                return false;
        }
        function popitup2(url, name) {
            newwindow=window.open(url + '&custom=' + document.getElementById('custom').value + '&tid=' + document.getElementById('id').value + '&value=0_' + name + '&rand=' + new Date().getTime(),'name','height=700,width=800,scrollbars=yes,location=no');
                if (window.focus) {newwindow.focus()}
                return false;
        }
        function popitup3(url) {
            newwindow=window.open(url + '&custom=' + document.getElementById('custom').value + '&tid=' + document.getElementById('id').value + '&value=0_' + name + '&rand=' + new Date().getTime(),'name','height=700,width=800,scrollbars=yes,location=no');
                if (window.focus) {newwindow.focus()}
                return false;
        }
</script>
	<?php
		if( $var["custom"] != 0 ){
?>
        <strong><?php echo _('Template Name')?>:</strong> <i>Custom Template: Extension <?php echo $var["ext"];?></i><br />
        <strong><?php echo _('Product Line')?>:</strong> <?php echo $var["product"];?><br />
        <strong><?php echo _('Clone of Model')?>:</strong> <?php echo $var["model"];?><br />
	<?php
		}
?>
        <form action="config.php?type=tool&display=epm_templates" method="post">
        <?php
		if( isset($var["silent_mode"]) ){
?>
        <input name="silent_mode" id="silent_mode" type="hidden" value="1">
        <?php
		}
?>
	<?php
		if( $var["custom"] == 0 ){
?>
        <strong><?php echo _('Template Name')?>:</strong> <i><?php echo $var["template_name"];?></i><br />
        <strong><?php echo _('Product Line')?>:</strong> <?php echo $var["product"];?><br />
        <strong><?php echo _('Clone of Model')?>:</strong>
        <select name="model_list" disabled>
        <?php
			if( isset( $var["models_ava"] ) && is_array( $var["models_ava"] ) ){
				$counter1 = 0;
				foreach( $var["models_ava"] as $key1 => $value1 ){ 
?>
        <option value="<?php echo $value1["value"];?>" <?php
				if( !empty($value1["selected"]) ){
?>selected<?php
				}
?>><?php echo $value1["text"];?></option>
        <?php
					$counter1++;
				}
			}
?>
        </select><br/>
        <strong><?php echo _('Display')?></strong>
        <?php
			if( isset($var["silent_mode"]) ){
?>
        <select name="area_list" onchange="window.location.href='config.php?display=epm_config&quietmode=1&handler=file&file=popup.html.php&module=endpointman&pop_type=edit_template&edit_id=<?php echo $var["hidden_id"];?>&model_list=126&template_list=0&rand='+ new Date().getTime() + '&maxlines='+this.options[this.selectedIndex].value">
        <?php
			}
			else{
?>
        <select name="area_list" onchange="window.location.href='config.php?type=tool&edit_template=true&display=epm_templates&custom='+ document.getElementById('custom').value +'&id='+ document.getElementById('id').value +'&maxlines='+this.options[this.selectedIndex].value">
        <?php
			}
?>
        <?php
			if( isset( $var["area_ava"] ) && is_array( $var["area_ava"] ) ){
				$counter1 = 0;
				foreach( $var["area_ava"] as $key1 => $value1 ){ 
?>
        <option value="<?php echo $value1["value"];?>" <?php
				if( !empty($value1["selected"]) ){
?>selected<?php
				}
?>><?php echo $value1["text"];?></option>
        <?php
					$counter1++;
				}
			}
?>
        </select>
        <strong><?php echo _('Line settings on this page')?></strong><i><font size="-2"> (Note: This is NOT the number of supported lines on the phone(s))</font></i>
	<?php
		}
?>
        <br />
        <strong><?php echo _('Edit Global Settings Overrides')?>: </strong> <a href="#" onclick="return popitup3('config.php?type=tool&display=epm_config&amp;quietmode=1&amp;handler=file&amp;file=popup.html.php&amp;module=endpointman&amp;pop_type=global_over')"><?php echo _('Global Settings')?> <i class='icon-pencil blue' ALT='<?php echo _('Edit')?>'></i></a>
        <br />
	<?php
		if( $var["alt"] != 0 ){
?>
        <?php
			if( isset( $var["alt_configs"] ) && is_array( $var["alt_configs"] ) ){
				$counter1 = 0;
				foreach( $var["alt_configs"] as $key1 => $value1 ){ 
?>
            <p><strong><?php echo _('Edit File Configurations for:')?></strong>
            <a href="#" onclick="return popitup('config.php?type=tool&display=epm_config&amp;quietmode=1&amp;handler=file&amp;file=popup.html.php&amp;module=endpointman&amp;pop_type=alt_cfg_edit', '<?php echo $value1["name"];?>')">
            <code><?php echo $value1["name"];?></code> <i class='icon-pencil blue' ALT='<?php echo _('Edit')?> <?php echo $value1["name"];?>'></i></a>
            <br>
            <strong><?php echo _('Select Alternative File Configurations for')?> <code><?php echo $value1["name"];?></code></strong>
            <select name="<?php echo $value1["name"];?>" id="altconfig_<?php echo $value1["name"];?>">';
            <option value="0_<?php echo $value1["name"];?>"><?php echo $value1["name"];?> (No Change)</option>';
            <?php
				if( isset( $value1["list"] ) && is_array( $value1["list"] ) ){
					$counter2 = 0;
					foreach( $value1["list"] as $key2 => $value2 ){ 
?>
                <option value="<?php echo $value2["id"];?>_<?php echo $value2["name"];?>" <?php
					if( isset($value2["selected"]) ){
?>selected<?php
					}
?>><?php echo $value2["name"];?></option>';
            <?php
						$counter2++;
					}
				}
?>
            </select>
            <br/>
        <?php
					$counter1++;
				}
			}
?>
            <br/>
	<?php
		}
?>
        <?php
		if( isset( $var["only_configs"] ) && is_array( $var["only_configs"] ) ){
			$counter1 = 0;
			foreach( $var["only_configs"] as $key1 => $value1 ){ 
?>
            <strong><?php echo _('Edit File Configurations for:')?></strong>&nbsp;
            <a href="#" onclick="return popitup2('config.php?type=tool&display=epm_config&amp;quietmode=1&amp;handler=file&amp;file=popup.html.php&amp;module=endpointman&amp;pop_type=alt_cfg_edit', '<?php echo $value1["name"];?>')"><code><?php echo $value1["name"];?></code>&nbsp;<i class='icon-pencil blue' ALT='<?php echo _('Edit')?>'></i></a>
            <br/>
        <?php
				$counter1++;
			}
		}
?>
            <br />
            <?php
		$tpl = new RainTPL( RainTPL::$tpl_dir . dirname("variables"));
		$tpl->assign( $var );
				$tpl->draw(basename("variables"));
?>
            <br />
            <?php
	}
?>

            <div class="coda-slider-wrapper">
                <div class="coda-slider preload" id="coda-slider-9">
		<?php
	if( isset( $var["template_editor"] ) && is_array( $var["template_editor"] ) ){
		$counter1 = 0;
		foreach( $var["template_editor"] as $key1 => $value1 ){ 
?>
                    <div class="panel">
                        <div class="panel-wrapper">
                            <h2 class="title"><?php echo $value1["title"];?></h2>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                            </table>
                        </div>
                    </div>
		<?php
										$counter1++;
									}
								}
?>
                </div><!-- .coda-slider -->
            </div><!-- .coda-slider-wrapper -->
            <input name="id" id="id" type="hidden" value="<?php echo $var["hidden_id"];?>">
            <input name="custom" id="custom" type="hidden" value="<?php echo $var["hidden_custom"];?>">
            <?php
								if( !isset($var["in_ari"]) ){
?>
            <label>Reboot Phone(s) <input type='checkbox' name='epm_reboot'></label>
            <br />
            <button type="submit" name="button_save_template"><i class='icon-save blue'></i> <?php echo _('Save Template');?></button>
        </form>
        <?php
									$tpl = new RainTPL( RainTPL::$tpl_dir . dirname("global_footer"));
									$tpl->assign( $var );
																		$tpl->draw(basename("global_footer"));
?>
        <?php
								}
?>
