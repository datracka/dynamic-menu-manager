<div class="wrap">
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'group_edit' ) { ?>
	<h2><?php _e( 'Edit URL Group', $this->domain ) ?></h2>	
	<?php }else{ ?>
	<h2><?php _e( 'URL Groups', $this->domain ) ?></h2>
	<?php } ?>
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'group_saved' ) { ?>
	<div id="message" class="updated"><p><?php _e( 'URL Group saved.', $this->domain ) ?></p></div>
	<?php } ?>
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'group_deleted' ) { ?>
	<div id="message" class="updated"><p><?php _e( 'URL Group deleted.', $this->domain ) ?></p></div>
	<?php } ?>
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'group_updated' ) { ?>
	<div id="message" class="updated"><p><?php _e( 'URL Group updated.', $this->domain ) ?></p></div>
	<?php } ?>
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'customized' ) { ?>
	<div id="message" class="updated"><p><?php _e( 'New rule set.', $this->domain ) ?></p></div>
	<?php } ?>
	<hr>
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'group_edit' ) { ?>
	<h4><?php _e( 'Edit group information', $this->domain ) ?></h4>	
	<?php }else{ ?>
	<h4><?php _e( 'Add new group', $this->domain ) ?></h4>
	<?php } ?>
	<?php if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'group_edit' ) { ?>
	<form action="<?php echo admin_url( 'admin.php?page=dynamic-menu-manager&&tab=url_groups&&noheader=true' ) ?>" method="post">
		<?php wp_nonce_field('dmm_group_nonce_action','dmm_group_nonce_field'); ?>
		<input type="hidden" name="group_id" value="<?php echo $groups[0]['id'] ?>" />
		<table cellpadding="5" cellspacing="5" width="100%">
			<tr>
				<td width="20%" valign="top"><?php _e( 'Group Name', $this->domain ) ?></td>
				<td><input type="text" name="group_name" class="textbox" value="<?php echo $groups[0]['group_name'] ?>" /></td>
			</tr>
			<tr>
				<td width="20%" valign="top">
					<?php _e( 'Group URL', $this->domain ) ?><br>
					<span><em>Comma separated for each url</em></span>
				</td>
				<td><textarea name="url_list" class="textbox" rows="10"><?php echo $groups[0]['url_list'] ?></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="update_group" class="button button-primary" value="<?php _e( 'Update Group', $this->domain ) ?>"></td>
			</tr>
		</table>
	</form>
	<?php }else{ ?>
	<form action="<?php echo admin_url( 'admin.php?page=dynamic-menu-manager&&tab=url_groups&&noheader=true' ) ?>" method="post">
		<?php wp_nonce_field('dmm_group_nonce_action','dmm_group_nonce_field'); ?>
		<table cellpadding="5" cellspacing="5" width="100%">
			<tr>
				<td width="20%" valign="top"><?php _e( 'Group Name', $this->domain ) ?></td>
				<td><input type="text" name="group_name" class="textbox" /></td>
			</tr>
			<tr>
				<td width="20%" valign="top">
					<?php _e( 'Group URL', $this->domain ) ?><br>
					<span><em>Comma separated for each url</em></span>
				</td>
				<td><textarea name="url_list" class="textbox" rows="10"></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="save_group" class="button button-primary" value="<?php _e( 'Save Group', $this->domain ) ?>"></td>
			</tr>
		</table>
	</form>
	<hr>
	<h4><?php _e( 'URL Group List', $this->domain ) ?></h4>
	<table cellpadding="0" cellspacing="0" class="wp-list-table widefat fixed">
		<tr>
			<th><?php _e( 'SL', $this->domain ) ?></th>
			<th><?php _e( 'Group Name', $this->domain ) ?></th>
			<th><?php _e( 'Action', $this->domain ) ?></th>
		</tr>
		<?php $i = 0; foreach( $url_groups as $url_group ){ ?>
		<tr>
			<td><?php echo ++$i; ?></td>
			<td><?php echo $url_group['group_name'] ?></td>
			<td>
				<a href="<?php echo admin_url('admin.php?page=dynamic-menu-manager&&tab=url_groups&&action=group_edit&&group_id=' . $url_group['id'] ) ?>"><?php _e( 'Edit', $this->domain ) ?></a> |
				<a href="<?php echo admin_url('admin.php?page=dynamic-menu-manager&&tab=customize&&group_id=' . $url_group['id'] ) ?>"><?php _e( 'Customize', $this->domain ) ?></a> |
				<a class="menu_delete" href="<?php echo admin_url( 'admin.php?page=dynamic-menu-manager&&tab=url_groups&&action=group_delete&&group_id='. $url_group['id'] .'&&noheader=true' ) ?>"><?php _e( 'Delete', $this->domain ) ?></a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</div>