<?php
	$db =& get_instance();
	$userdetails=$db->userdetails();
?>
<div class="card">
	<div class="card-header">
		<h5>
			<?= __('admin.template_edit') ?>
			<button class="btn btn-sm btn-primary pull-right" onclick="$('#setting-body').slideToggle()"><?= __('admin.setting') ?></button>
			<div class="clearfix"></div>
		</h5>
	</div>
			

	<div class="card-body" id="setting-body">
		<div class="">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-8">
						<div class="form-group">
							<label  class="col-form-label"><?= __('admin.footer_text') ?></label>
							<textarea name="emailsetting[footer]" class="form-control summernote-img" ><?php echo $emailsetting['footer']; ?></textarea>
						</div>
					</div>
					<div class="col-sm-4">
						<label  class="col-form-label d-block">&nbsp;</label>
						<fieldset>
							<legend><?= __('admin.header_logo') ?></legend>
							<div class="row">
								<div class="col-sm-6 p-4">
								    <?php $img = $emailsetting['logo'] ? base_url('assets/images/site/'. $emailsetting['logo']) : base_url('assets/vertical/assets/images/users/avatar-1.jpg'); ?>
								    <img style="width: 150px;" src="<?= $img ?>" class='img-responsive'>
								</div>
								<div class="col-sm-6">
									<input type="file" name="emailsetting_logo">
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary"><?= __('admin.save') ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<br>
		
		
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-white-space-normal">
						<thead>
							<tr>
								<th><?= __('admin.name') ?></th>
								<th><?= __('admin.subject') ?></th>
								<th><?= __('admin.admin_subject') ?></th>
								<th><?= __('admin.client_subject') ?></th>
								<th width="100px"><?= __('admin.action') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($templates as $key => $value) { ?>
							<tr>
								<td width="320px"><?php echo $value['name'] ?></td>
								<td><?php echo $value['subject'] ?></td>
								<td><?php echo $value['admin_subject'] ?></td>
								<td><?php echo $value['client_subject'] ?></td>
								<td width="80px">
									<a href="<?php echo base_url('admincontrol/mails_edit/'. $value['id']) ?>" class="btn btn-primary btn-sm"><?= __('admin.edit') ?></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div> 
	</div> 
</div>
