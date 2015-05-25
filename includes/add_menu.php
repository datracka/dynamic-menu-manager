<div class="wrap">
	<h2><?php _e( 'Menu Manager', $this->domain ); ?> <a href="<?php echo admin_url( 'admin.php?page=dynamic-menu-manager&&tab=url_groups' ) ?>" class="add-new-h2"><?php _e( 'URL Groups', $this->domain ) ?></a></h2>
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'menu_saved' ) { ?>
	<div id="message" class="updated"><p><?php _e( 'Menu location saved.', $this->domain ) ?></p></div>
	<?php } ?>
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'menu_deleted' ) { ?>
	<div id="message" class="updated"><p><?php _e( 'Menu location deleted.', $this->domain ) ?></p></div>
	<?php } ?>
	<hr>
	<h4><?php _e( 'Add New Menu Location', $this->domain ) ?></h4>
	<form action="<?php echo admin_url( 'admin.php?page=dynamic-menu-manager&&noheader=true' ) ?>" method="post">
		<?php wp_nonce_field('dmm_nonce_action','dmm_nonce_field'); ?>
		<table width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td valign="top" width="40%">
					<input type="text" id="dmm_menu_location" name="dmm_menu_location" class="textbox" placeholder="<?php _e( 'Menu Location', $this->domain ) ?>" /><br>
					<span><em>No space is allowed</em></span>
				</td>
				<td valign="top" width="40%"><input id="dmm_menu_desc" name="dmm_menu_desc" type="text" class="textbox" placeholder="<?php _e( 'Menu Description', $this->domain ) ?>" /></td>
				<td valign="top" width="20%"><input type="submit" id="save_location" name="save_location" class="button button-primary" value="<?php _e( 'Save Location', $this->domain ) ?>" /></td>
			</tr>
		</table>
	</form>
	<hr>
	<h4><?php _e( 'Existing Menu', $this->domain ) ?></h4>
	<table cellpadding="0" cellspacing="0" class="wp-list-table widefat fixed">
		<tr>
			<th><?php _e( 'SL', $this->domain ); ?></th>
			<th><?php _e( 'Menu Location', $this->domain ); ?></th>
			<th><?php _e( 'Menu Description', $this->domain ); ?></th>
			<th><?php _e( 'Action', $this->domain ); ?></th>
		</tr>
		<?php $i = 0; foreach ( $dmm_menus as $dmm_menu ) {?>
		<tr class="<?php echo ( $i % 2 == 0 ) ? 'alternate' : '' ?>">
			<td><?php echo ++$i; ?></td>
			<td><?php echo $dmm_menu['menu_location']; ?></td>
			<td><?php echo $dmm_menu['menu_desc'] ?></td>
			<td><a class="menu_delete" href="<?php echo admin_url( 'admin.php?page=dynamic-menu-manager&&action=menu_delete&&menu_id='. $dmm_menu['id'] .'&&noheader=true' ) ?>"><?php _e( 'Delete', $this->domain ) ?></a></td>
		</tr>
		<?php } ?>
	</table>
</div>