<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ProjectsBook</title>

	<style type="text/css" media="screen">
		<?php echo $css; ?>
	</style>
</head>
<body>

<div id="container">
	<h1>ProjectBook Export &raquo; <?php echo $project_view->prj_name; ?></h1>
	<p>Exported: <?php echo date('Y-m-d H:i:s'); ?></p>
	
	<div id="">
		
		<div class="project_view">
			
			<h2><?php echo $project_view->prj_name; ?></h2>
			<p><?php echo $project_view->prj_description; ?></p>
			
			<div class="box">
	   			<p><span>Client:</span>
					<?php echo $project_view->client_name; ?> (<?php echo mailto($project_view->client_email, $project_view->client_email)?>)
				</p>
				<p><span>Estimate:</span>
					Rs. <?php echo $project_view->prj_quotation_amount; ?>
				</p>
				<p class="gray-text">
					Created: <?php echo $project_view->prj_added; ?><br>
					Modified: <?php echo $project_view->prj_modified; ?>
				</p>
			</div>
			
			<div class="box">
				<pre>
Local URL:        <?php echo anchor($project_view->prj_local_url, $project_view->prj_local_url, "target=_blank"); ?>	

Local Admin:    <?php echo anchor($project_view->prj_local_admin_url, $project_view->prj_local_admin_url, "target=_blank"); ?>

Username:          <?php echo $project_view->prj_local_admin_un; ?>

Password:          <?php echo $project_view->prj_local_admin_pw; ?>
				</pre>
				
			</div>

			<?php if($project_view->prj_prod_url!=""){ ?>			
			<div class="box">
				<pre>

Website URL:        <?php echo anchor($project_view->prj_prod_url, $project_view->prj_prod_url, "target=_blank"); ?>	

<?php if($project_view->prj_prod_admin_url!=""){ ?>
Admin:    <?php echo anchor($project_view->prj_prod_admin_url, $project_view->prj_prod_admin_url, "target=_blank"); ?>

Username:          <?php echo $project_view->prj_prod_admin_un; ?>

Password:          <?php echo $project_view->prj_prod_admin_pw; ?>
<?php } ?>
				</pre>
				
			</div>
			<?php } ?>
			
			<?php if($project_view->prj_testing_url!=""){ ?>
			<div class="box">
				<pre>
Testing Remote URL:     <?php echo anchor($project_view->prj_testing_url, $project_view->prj_testing_url, "target=_blank"); ?>	

Admin:    <?php echo anchor($project_view->prj_testing_admin_url, $project_view->prj_testing_admin_url, "target=_blank"); ?>

Username:          <?php echo $project_view->prj_testing_admin_un; ?>

Password:          <?php echo $project_view->prj_testing_admin_pw; ?>
				</pre>
				
			</div>
			<?php } ?>
			
			<div class="box">
				<pre>
GIT Repository:     <?php echo $project_view->prj_git_repo_url; ?></pre>
				
			</div>
			
			<?php if($project_view->prj_ftp_server!=""){ ?>
			<div class="box">
				<pre>
FTP Server:     <?php echo $project_view->prj_ftp_server; ?>

FTP Path:     <?php echo $project_view->prj_ftp_path; ?>

Username:     <?php echo $project_view->prj_ftp_un; ?>

Password:     <?php echo $project_view->prj_ftp_pw; ?>
</pre>
				
			</div>
			<?php } ?>
			
		</div><!-- /.project_view -->
		
		
		<div class="project_logs">
			
			<h2>Logs</h2>
			
			<?php if(isset($project_logs) && $project_logs){ ?>
				<?php foreach($project_logs as $project_log){ ?>
				<div class="log_record">
					<p class="date_mod"><?php echo $project_log->log_modified; ?></p>
					<p class="log_details"><?php echo $project_log->log_details; ?></p>
					<p class="control_links">
						<?php echo anchor("projects/log_edit/".$project_log->id, "edit"); ?> |
						<?php 
							$js = array("onclick"=>"return confirm('Are you sure?')");
							echo anchor("projects/delete_log/".$project_log->id, "delete", $js); 
						?>
					</p>
				</div><!-- /.log_record -->
				<?php } ?>
			<?php }else{ ?>
				<p>NO LOGS</p>
			<?php } ?>
			
		</div><!-- /.project_log -->
		
	</div>

	<div class="clear"></div>
	<?php //var_dump($project_view); ?>


</div>

</body>
</html>