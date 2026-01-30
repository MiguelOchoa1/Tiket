<!-- /info alert -->
<?php get_msg(); ?>
<!-- Content area -->
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="row px-1">
				<!--Total Users-->
				<div class="col-md-4 text-center">
					<div class="widget-card widget-card-red">
						<div class="media">
							<div class="widget-icon">
								<i class="icon-users icon-3x opacity-75"></i>
							</div>
							<div class="media-body text-right">
								<h3 class="font-weight-semibold mb-0"><?php echo $stats['total_members'] ? $stats['total_members'] : '0'; ?></h3>
								<span class="text-uppercase font-size-sm ">Total Members</span>
							</div>
						</div>
					</div>
				</div>
				<!--Pending Approvals-->
				<div class="col-md-4 text-center">
					<div class="widget-card widget-card-yellow">
						<div class="media">
							<div class="widget-icon">
								<i class="icon-sort-time-desc icon-3x opacity-75"></i>
							</div>
							<br>
							<div class="media-body text-right">
								<h3 class="font-weight-semibold mb-0"><?php echo $stats['pending_kyc_approvals'] ? $stats['pending_kyc_approvals'] : '0'; ?></h3>
								<span class="text-uppercase font-size-sm">Pending KYC Approval</span>
							</div>
						</div>
					</div>
				</div>
				<!--Recent Members-->
				<!--				<div class="col-md-4 text-center">-->
				<!--					<div class="card card-body bg-warning-300 has-bg-image">-->
				<!--						<div class="media d-block">-->
				<!--							<div class="align-self-center">-->
				<!--								<i class="icon-user-plus icon-3x opacity-75"></i>-->
				<!--							</div>-->
				<!--							<br>-->
				<!--							<div class="media-body d-block">-->
				<!--								<h1 class="mb-0">--><?php //echo $stats['recent'] ? $stats['recent'] : '0.0'; ?><!--</h1>-->
				<!--								<span class="text-uppercase font-size-sm">Recent Members</span>-->
				<!--							</div>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
				<!--Net Balance-->
				<div class="col-md-4 text-center">
					<div class="widget-card widget-card-orange">
						<div class="media">
							<div class="widget-icon">
								<i class="icon-cash4 icon-3x opacity-75"></i>
							</div>
							<br>
							<div class="media-body text-right">
								<h3 class="font-weight-semibold mb-0"><?php echo $stats['total_balance'] ? $stats['total_balance'] : '0.0'; ?></h3>
								<span class="text-uppercase font-size-sm">Net Balance</span>
							</div>
						</div>
					</div>
				</div>
				<?php foreach ($level_map as $key=>$level){
					if (array_key_exists($key, $per_level)){?>
						<!--Dynamic Cards-->
						<div class="col-md-4 text-center">
							<div class="widget-card <?php echo ['widget-card-blue','widget-card-orange','widget-card-pink','widget-card-green','widget-card-skyblue','widget-card-slategreen','widget-card-hotpink','widget-card-purple','widget-card-brightblue','widget-card-darkpurple','widget-card-magento'][$key]?> has-bg-image">
								<div class="media">
									<div class="widget-icon">
										<i class="<?php echo ['icon-circle-small','icon-stars','icon-medal-third','icon-medal-second','icon-medal-first','icon-medal2','icon-trophy4','icon-cube','icon-cube4','icon-pyramid2','icon-crown'][$key]?> icon-3x opacity-75"></i>
									</div>
									<br>
									<div class="media-body text-right">
										<h3 class="font-weight-semibold  mb-0"><?php echo $per_level[$key]?></h3>
										<span class="text-uppercase font-size-sm">Level <?= $level['title']?></span>
									</div>
								</div>
							</div>
						</div>
					<?php }}?>
			</div>

			<!-- Custom Application Links Section -->
			<div class="col-md-12" style="margin-top: 2em;">
				<div class="row">
					<!-- USpharma Applications -->
					<div class="col-md-4 text-center">
						<div class="widget-card widget-card-blue" style="cursor: pointer;" onclick="toggleApplications()">
							<div class="media">
								<div class="widget-icon">
									<i class="icon-grid icon-3x opacity-75"></i>
								</div>
								<div class="media-body text-right">
									<h3 class="font-weight-semibold mb-0">Applications</h3>
									<span class="text-uppercase font-size-sm">USpharma Applications</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Drives -->
					<div class="col-md-4 text-center">
						<div class="widget-card widget-card-purple" style="cursor: pointer;" onclick="toggleDrives()">
							<div class="media">
								<div class="widget-icon">
									<i class="icon-drive icon-3x opacity-75"></i>
								</div>
								<div class="media-body text-right">
									<h3 class="font-weight-semibold mb-0">Drives</h3>
									<span class="text-uppercase font-size-sm">Network Drives</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Printers -->
					<div class="col-md-4 text-center">
						<div class="widget-card widget-card-teal" style="cursor: pointer;" onclick="togglePrinters()">
							<div class="media">
								<div class="widget-icon">
									<i class="icon-printer2 icon-3x opacity-75"></i>
								</div>
								<div class="media-body text-right">
									<h3 class="font-weight-semibold mb-0">Printers</h3>
									<span class="text-uppercase font-size-sm">Network Printers</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Applications Dropdown Content -->
				<div id="applications-content" style="display: none; margin-top: 1em;">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">USpharma Applications</h5>
						</div>
						<div class="card-body">
							<div class="row text-center">
								<div class="col-md-3 mb-3">
									<a href="#" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-envelop3 icon-3x text-primary"></i>
										<p class="mt-2">Email</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="#" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-calendar icon-3x text-success"></i>
										<p class="mt-2">Calendar</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="#" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-users icon-3x text-info"></i>
										<p class="mt-2">HR Portal</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="#" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-file-text2 icon-3x text-warning"></i>
										<p class="mt-2">Documents</p>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Drives Dropdown Content -->
				<div id="drives-content" style="display: none; margin-top: 1em;">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Network Drives</h5>
						</div>
						<div class="card-body">
							<div class="row text-center">
								<div class="col-md-3 mb-3">
									<a href="file:///\\\\server\\shared" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-folder icon-3x text-primary"></i>
										<p class="mt-2">Shared Drive (S:)</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="file:///\\\\server\\data" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-database icon-3x text-success"></i>
										<p class="mt-2">Data Drive (D:)</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="file:///\\\\server\\backup" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-cloud icon-3x text-info"></i>
										<p class="mt-2">Backup Drive (B:)</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="file:///\\\\server\\public" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-users2 icon-3x text-warning"></i>
										<p class="mt-2">Public Drive (P:)</p>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Printers Dropdown Content -->
				<div id="printers-content" style="display: none; margin-top: 1em;">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Network Printers</h5>
						</div>
						<div class="card-body">
							<div class="row text-center">
								<div class="col-md-3 mb-3">
									<a href="#" onclick="alert('Printer: HP LaserJet Pro\\nLocation: 1st Floor\\nStatus: Ready'); return false;" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-printer2 icon-3x text-primary"></i>
										<p class="mt-2">HP LaserJet - 1F</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="#" onclick="alert('Printer: Canon ImageRunner\\nLocation: 2nd Floor\\nStatus: Ready'); return false;" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-printer2 icon-3x text-success"></i>
										<p class="mt-2">Canon IR - 2F</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="#" onclick="alert('Printer: Xerox ColorCube\\nLocation: 3rd Floor\\nStatus: Ready'); return false;" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-printer2 icon-3x text-info"></i>
										<p class="mt-2">Xerox CC - 3F</p>
									</a>
								</div>
								<div class="col-md-3 mb-3">
									<a href="#" onclick="alert('Printer: HP OfficeJet\\nLocation: Admin\\nStatus: Ready'); return false;" class="app-link" style="text-decoration: none; color: inherit;">
										<i class="icon-printer2 icon-3x text-warning"></i>
										<p class="mt-2">HP OfficeJet - Admin</p>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4">
			<div class="row">

			</div>
		</div>
		<!--    Transaction Table-->
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header header-elements-inline">
					<div class="caption">
						<h5 class="card-title"><i class="icon icon-cogs"></i><?= $report_title ?></h5>
					</div>
				</div>
				<div class="container-fluid" id="msg">
					<div class="portlet-body form">
						<div id="report-page"></div>

						<script type="application/javascript">
							makeReportPage($("#report-page"), "list_transactions?t=<?=$type ?>", {
								datatable: {
									dom: 'Brftip',
									"order": [[ 4, 'desc' ]],
									columns: [
										{
											title: "Username",
											data: "uid",
											render: function (data) {
												return getUsernameFromID(data);
											}
										},
										{
											title: "Amount",
											data: "credit",
											render: function (data, type, row, meta) {
												return formatMoney((row['credit'] || 0) - (row['debit'] || 0))
											}
										},
										{
											title: "Type",
											data: "type",
											render: function (data, type, row, meta) {
												return TIK_PAGE_RESPONSE['TRANSACTION_TYPES'][data] || 'Unknown Type';
											}
										},
										{
											title: "Description",
											data: "description",
											defaultContent: " - "
										},
										{
											title: "Time",
											data: "updated",
											render: function(data){
												return getDateTime(data)
											},
											defaultContent: " - "
										},
									]
								}
							},function(err,data){
								console.log()
								TIK_PAGE_RESPONSE = data['page'];
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<script>
	// Toggle Applications section
	function toggleApplications() {
		var content = document.getElementById('applications-content');
		var drives = document.getElementById('drives-content');
		var printers = document.getElementById('printers-content');
		
		drives.style.display = 'none';
		printers.style.display = 'none';
		
		if (content.style.display === 'none' || content.style.display === '') {
			content.style.display = 'block';
		} else {
			content.style.display = 'none';
		}
	}

	// Toggle Drives section
	function toggleDrives() {
		var content = document.getElementById('drives-content');
		var apps = document.getElementById('applications-content');
		var printers = document.getElementById('printers-content');
		
		apps.style.display = 'none';
		printers.style.display = 'none';
		
		if (content.style.display === 'none' || content.style.display === '') {
			content.style.display = 'block';
		} else {
			content.style.display = 'none';
		}
	}

	// Toggle Printers section
	function togglePrinters() {
		var content = document.getElementById('printers-content');
		var apps = document.getElementById('applications-content');
		var drives = document.getElementById('drives-content');
		
		apps.style.display = 'none';
		drives.style.display = 'none';
		
		if (content.style.display === 'none' || content.style.display === '') {
			content.style.display = 'block';
		} else {
			content.style.display = 'none';
		}
	}
</script>

<style>
	.app-link:hover {
		opacity: 0.7;
		transform: scale(1.05);
		transition: all 0.3s ease;
	}
	
	.widget-card-blue { background-color: #007bff; color: white; }
	.widget-card-purple { background-color: #6f42c1; color: white; }
	.widget-card-teal { background-color: #20c997; color: white; }
	
	.widget-card {
		cursor: pointer;
		transition: all 0.3s ease;
	}
	
	.widget-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 4px 8px rgba(0,0,0,0.2);
	}
</style>
