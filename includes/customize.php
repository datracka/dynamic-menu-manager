<div class="wrap">
	<h2><?php _e( 'Set rules', $this->domain ) ?></h2>
	<hr>
	<form action="<?php echo admin_url( 'admin.php?page=dynamic-menu-manager&&tab=customize&&noheader=true' ) ?>" method="post">
		<input type="hidden" name="group_id" value="<?php echo $_REQUEST['group_id'] ?>" />
		<?php wp_nonce_field('dmm_group_rule_nonce_action','dmm_group_rule_nonce_field'); ?>
		<label>
			<input <?php echo !$menu_replace ? '' : 'checked' ?> type="checkbox" name="menu_replace" value="yes" /> <?php _e( 'Enable Menu Replacement', $this->domain ); ?>
		</label>
		<hr>
		<?php
		$dmm_menus = $this->get_menus();
		foreach( $dmm_menus as $dmm_menu ) {
			unset( $this->main_locations[$dmm_menu['menu_location']] );
		}
		?>
		<table cellpadding="5" cellspacing="5">
			<tr>
				<td>
					<?php _e( 'Select replaced menu', $this->domain ) ?><br>
					<select name="replaced_menu">
						<option value=""></option>
						<?php foreach( $this->main_locations as $main_location => $menu_desc ){ ?>
							<option <?php echo $main_location == $replaced_menu ? 'selected' : '' ?> value="<?php echo $main_location ?>"><?php echo $menu_desc ?></option>
						<?php } ?>
					</select>
				</td>
				<td>
					<?php _e( 'Select new menu', $this->domain ) ?><br>
					<select name="new_menu">
						<option value=""></option>
						<?php foreach( $dmm_menus as $dmm_menu ) { ?>
							<option <?php echo $dmm_menu['menu_location'] == $new_menu ? 'selected' : '' ?> value="<?php echo $dmm_menu['menu_location'] ?>"><?php echo $dmm_menu['menu_desc'] ?></option>
						<?php } ?>
					</select>
				</td>
				<td valign="bottom">
					<input class="button button-primary" type="submit" name="set_rule" value="<?php _e( 'Update', $this->domain ) ?>" />
				</td>
			</tr>
		</table>
	</form>
</div>