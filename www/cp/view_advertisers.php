<?php
global $current_section;
$current_section='advertisers';

require_once '../../init.php';

// Required files
require_once MAD_PATH . '/www/cp/auth.php';

require_once MAD_PATH . '/functions/adminredirect.php';

require_once MAD_PATH . '/www/cp/restricted.php';

require_once MAD_PATH . '/www/cp/admin_functions.php';



require_once MAD_PATH . '/www/cp/templates/header.tpl.php';

if (!check_permission('advertisers', $user_detail['user_id'])){
    exit;
}

if (check_permission_simple('modify_advertisers', $user_detail['user_id'])) {
    if (isset($_GET['delete'])){
        if ($_GET['delete']==1 && is_numeric($_GET['delid'])){
            delete_user($_GET['delid'], 1);
        }
    }
}

?>

<div id="content">

		<div id="contentHeader">
			<h1><?php echo __('ADVERTISERS');?></h1>
		</div> <!-- #contentHeader -->

		<div class="container">

				<div class="grid-24">

             <?php if (isset($errormessage)){ ?>
            <div class="box plain"><div class="notify notify-error"><h3>Error</h3><p><?php echo $errormessage; ?></p></div> <!-- .notify --></div>
            <?php } ?>

					<div class="widget widget-table">

						<div class="widget-header">
							<span class="icon-list"></span>
							<h3 class="icon chart"><?php echo __('ADVER_VIEW');?></h3>
						</div>

						<div class="widget-content">

							<table id="syslog" class="table table-bordered table-striped data-table">
						<thead>
							<tr>
								<th><?php echo __('ADVER_USER_ID');?></th>
								<th><?php echo __('ADVER_NAME');?></th>
								<th>E-Mail</th>
								<th><?php echo __('ADVER_GROUP');?></th>
								<th><?php echo __('ADVER_STATUS');?></th>
								<th><?php echo __('ACTION');?></th>
							</tr>
						</thead>
						<tbody>
<?php get_userlist('', '2'); ?>
</tbody>
					</table>
		        </div>
						<!-- .widget-content -->

				</div> <!-- .widget -->

					<div class="actions">
								<button onclick="window.location='create_user.php?group=2';" class="btn btn-quaternary"><span class="icon-plus"></span><?php echo __('ADVER_CREATE');?></button>
								</div> <!-- .actions -->

			</div> <!-- .grid -->

		</div> <!-- .container -->

	</div> <!-- #content -->

<?php
global $jsload; $jsload=1; print_deletionjs('advertisers');
require_once MAD_PATH . '/www/cp/templates/footer.tpl.php';
?>