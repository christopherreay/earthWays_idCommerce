<?php if (is_user_logged_in()) { ?>
	<li><a href="<?php echo $durl; ?>"><i class="icon-grid"></i></a></li>
	<li><a href="<?php echo $durl.$prefix; ?>edit-profile=1"><i class="icon-cog"></i></a></li>
	<li><a href="<?php echo $durl.$prefix.'backer_profile='.$current_user->ID; ?>"><i class="icon-head"></i></a></li>
	<?php if (current_user_can('create_edit_projects')) { ?>
	<li><a href="<?php echo $durl.$prefix; ?>payment_settings=1"><i class="icon-briefcase"></i></a></li>
	<?php } ?>
<?php }