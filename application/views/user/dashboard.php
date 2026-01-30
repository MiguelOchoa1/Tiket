<!-- Comment Section-->

<div style="background-color: red; color: white; padding: 20px; text-align: center; font-size: 24px; font-weight: bold;">
    TEST - FILE IS LOADED - SCROLL DOWN TO SEE APPLICATIONS, DRIVES, PRINTERS
</div>

<div class="container" style="padding:0; margin-top: -4em;">

    <!--Dashboard counts-->
    <section class="dashboard-header no-padding-bottom col-left-no-padding" style="margin-top: 4em;">
        <div class="container">
            <div class="row">
                <!-- Statistics -->
                <div class="col-md-3">
                    <div class="statistic d-flex align-items-center bg-white has-shadow custom-border-radius">
                        <div class="icon bg-green"><i class="fa fa-tasks"></i></div>
                        <div class="text"><strong><?= $stats['total_tickets'] ?></strong><br>
                            <small>All Tickets</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="statistic d-flex align-items-center bg-white has-shadow custom-border-radius">
                        <div class="icon bg-orange"><i class="fa fa-ticket"></i></div>
                        <div class="text"><strong><?= $stats['open_tickets'] ?></strong><br>
                            <small>Open Tickets</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="statistic d-flex align-items-center bg-white has-shadow custom-border-radius">
                        <div class="icon bg-info"><i class="fa fa-user"></i></div>
                        <div class="text"><strong><?= $stats['assigned_tickets'] ?></strong><br>
                            <small>Assigned Tickets</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="statistic d-flex align-items-center bg-white has-shadow custom-border-radius">
                        <div class="icon bg-red"><i class="fa fa-check"></i></div>
                        <div class="text"><strong><?= $stats['closed_tickets'] ?></strong><br>
                            <small>Closed Tickets</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Application Links Section -->
    <section class="dashboard-header no-padding-bottom col-left-no-padding" style="margin-top: 2em;">
        <div class="container">
            <div class="row">
                <!-- USpharma Applications -->
                <div class="col-md-4">
                    <div class="statistic d-flex align-items-center bg-white has-shadow custom-border-radius" style="cursor: pointer;" onclick="toggleApplications()">
                        <div class="icon bg-blue"><i class="fa fa-th"></i></div>
                        <div class="text"><strong>Applications</strong><br>
                            <small>USpharma Applications</small>
                        </div>
                    </div>
                </div>

                <!-- Drives -->
                <div class="col-md-4">
                    <div class="statistic d-flex align-items-center bg-white has-shadow custom-border-radius" style="cursor: pointer;" onclick="toggleDrives()">
                        <div class="icon bg-purple"><i class="fa fa-hdd-o"></i></div>
                        <div class="text"><strong>Drives</strong><br>
                            <small>Network Drives</small>
                        </div>
                    </div>
                </div>

                <!-- Printers -->
                <div class="col-md-4">
                    <div class="statistic d-flex align-items-center bg-white has-shadow custom-border-radius" style="cursor: pointer;" onclick="togglePrinters()">
                        <div class="icon bg-teal"><i class="fa fa-print"></i></div>
                        <div class="text"><strong>Printers</strong><br>
                            <small>Network Printers</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Applications Dropdown Content -->
            <div id="applications-content" style="display: none; margin-top: 1em;">
                <div class="card custom-border-radius">
                    <div class="card-header custom-border-radius">
                        <h4>USpharma Applications</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center mb-3">
                                <a href="#" class="app-link">
                                    <i class="fa fa-envelope fa-3x text-primary"></i>
                                    <p class="mt-2">Email</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="#" class="app-link">
                                    <i class="fa fa-calendar fa-3x text-success"></i>
                                    <p class="mt-2">Calendar</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="#" class="app-link">
                                    <i class="fa fa-users fa-3x text-info"></i>
                                    <p class="mt-2">HR Portal</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="#" class="app-link">
                                    <i class="fa fa-file-text fa-3x text-warning"></i>
                                    <p class="mt-2">Documents</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Drives Dropdown Content -->
            <div id="drives-content" style="display: none; margin-top: 1em;">
                <div class="card custom-border-radius">
                    <div class="card-header custom-border-radius">
                        <h4>Network Drives</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center mb-3">
                                <a href="file:///\\\\server\\shared" class="app-link">
                                    <i class="fa fa-folder fa-3x text-primary"></i>
                                    <p class="mt-2">Shared Drive (S:)</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="file:///\\\\server\\data" class="app-link">
                                    <i class="fa fa-database fa-3x text-success"></i>
                                    <p class="mt-2">Data Drive (D:)</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="file:///\\\\server\\backup" class="app-link">
                                    <i class="fa fa-cloud fa-3x text-info"></i>
                                    <p class="mt-2">Backup Drive (B:)</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="file:///\\\\server\\public" class="app-link">
                                    <i class="fa fa-users fa-3x text-warning"></i>
                                    <p class="mt-2">Public Drive (P:)</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Printers Dropdown Content -->
            <div id="printers-content" style="display: none; margin-top: 1em;">
                <div class="card custom-border-radius">
                    <div class="card-header custom-border-radius">
                        <h4>Network Printers</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center mb-3">
                                <a href="#" onclick="alert('Printer: HP LaserJet Pro\\nLocation: 1st Floor\\nStatus: Ready')" class="app-link">
                                    <i class="fa fa-print fa-3x text-primary"></i>
                                    <p class="mt-2">HP LaserJet - 1F</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="#" onclick="alert('Printer: Canon ImageRunner\\nLocation: 2nd Floor\\nStatus: Ready')" class="app-link">
                                    <i class="fa fa-print fa-3x text-success"></i>
                                    <p class="mt-2">Canon IR - 2F</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="#" onclick="alert('Printer: Xerox ColorCube\\nLocation: 3rd Floor\\nStatus: Ready')" class="app-link">
                                    <i class="fa fa-print fa-3x text-info"></i>
                                    <p class="mt-2">Xerox CC - 3F</p>
                                </a>
                            </div>
                            <div class="col-md-3 text-center mb-3">
                                <a href="#" onclick="alert('Printer: HP OfficeJet\\nLocation: Admin\\nStatus: Ready')" class="app-link">
                                    <i class="fa fa-print fa-3x text-warning"></i>
                                    <p class="mt-2">HP OfficeJet - Admin</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- recent activity -->
    <section class="feeds">
        <div class="container col-left-no-padding">
            <div class="row">
                <div class="col-lg-6 d-flex">
                    <div class="card custom-border-radius w-100">
                        <div class="card-header d-flex align-items-center  custom-border-radius">
                            <h2 class="h3">Tickets status</h2>
                        </div>
                        <div class="work-amount">
                            <div class="card-body">
                                <div class="chart text-center">
                                    <iframe class="chartjs-hidden-iframe" tabindex="-1"
                                            style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                    <div class="text"><strong><?= $stats['total_tickets'] ?></strong><br><span>Total Tickets</span>
                                    </div>
                                    <canvas id="pieChart"
                                            style="display: block; width: height: 100%; height: 100%"></canvas>
                                </div>
                                <div class="text-center">Open, Assigned and Closed Tickets stats.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Trending Articles-->
                <div class="col-lg-6 d-flex">
                    <div class="recent-updates card custom-border-radius">
                        <div class="card-header d-flex align-items-center  custom-border-radius">
                            <h2 class="h3">Recent Tickets</h2>
                        </div>
                        <div class="card-header tab-card-header shadow-none">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link disabled-text  active show" id="one-tab" data-toggle="tab"
                                       href="#one" role="tab" aria-controls="One" aria-selected="true">Recently Created
                                        By Me</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled-text" id="two-tab" data-toggle="tab" href="#two"
                                       role="tab" aria-controls="Two" aria-selected="false">Recently Assigned On Me</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled-text" id="three-tab" data-toggle="tab" href="#three"
                                       role="tab" aria-controls="Three" aria-selected="false">Recent Closed Tickets</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-3" id="one" role="tabpanel"
                                 aria-labelledby="one-tab">
                                <?php
                                if (is_array($recent['created']) && count($recent['created']) > 0) {
                                    foreach ($recent['created'] as $recent_created) {
                                        echo '
                                <div class="item d-flex  justify-content-between">
                                    <div class="info d-flex">
                                    <div class="icon"><i class="fa fa-ticket text-green"></i></div>
                                    <div class="title">
                                    <a href="' . BASE_URL . 'tickets/view_ticket/' . $recent_created['ticket_no'] . '">
                                        <h5>' . $recent_created['ticket_no'] . '</h5>
                                    </a><br>
                                    <p>Purpose: ' . $recent_created['purpose'] . '</p>
                                    <p>Subject: ' . $recent_created['subject'] . '</p>
                                    </div>
                                    </div>
                                    <div class="date text-right"><span class="rel-time" data-value="'.$recent_created['created'].'000"></span><br><span class="tik-status" data-value="'.$recent_created['status'].'"></span></div>
                                </div>
                                ';
                                    }
                                } else {
                                    echo '
                                <div class="item d-flex align-items-center">
                                <div class="text">
                                    <a href="#">
                                    <h3 class="h5">OOPS</h3>
                                    </a>
                                    <small>No record found</small>
                                </div>
                                </div>
                                ';
                                }
                                ?>
                            </div>
                            <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <?php
                                if (is_array($recent['assigned']) && count($recent['assigned']) > 0) {
                                    foreach ($recent['assigned'] as $recent_assigned) {
                                        echo '
                                <div class="item d-flex  justify-content-between">
                                <div class="info d-flex">
                                    <div class="icon"><i class="fa fa-ticket text-info"></i></div>
                                    <div class="text">
                                    <a href="' . BASE_URL . 'tickets/view_ticket/' . $recent_assigned['ticket_no'] . '">
                                        <h5>' . $recent_assigned['ticket_no'] . '</h5>
                                    </a><br>
                                    <p>Purpose: ' . $recent_assigned['purpose'] . '</p>
                                    <p>Subject: ' . $recent_assigned['subject'] . '</p>
                                    </div>
                                    </div>
                                    <div class="date text-right"><span class="rel-time" data-value="'.$recent_assigned['created'].'000"></span><br><span class="tik-status" data-value="'.$recent_assigned['status'].'"></span></div>
                                </div>
                                ';
                                    }
                                } else {
                                    echo '
                                <div class="item d-flex align-items-center">
                                <div class="text">
                                    <a href="#">
                                    <h3 class="h5">OOPS</h3>
                                    </a>
                                    <small>No record found</small>
                                </div>
                                </div>
                                ';
                                }
                                ?>
                            </div>
                            <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                                <?php
                                if (is_array($recent['closed']) && count($recent['closed']) > 0) {
                                    foreach ($recent['closed'] as $recent_closed) {
                                        echo '
                                <div class="item d-flex  justify-content-between">
                                <div class="info d-flex">
                                    <div class="icon"><i class="fa fa-ticket text-red"></i></div>
                                    <div class="title">
                                    <a href="' . BASE_URL . 'tickets/view_ticket/' . $recent_closed['ticket_no'] . '">
                                        <h5>' . $recent_closed['ticket_no'] . '</h5>
                                    </a><br>
                                    <p>Purpose: ' . $recent_closed['purpose'] . '</p>
                                    <p>Subject: ' . $recent_closed['subject'] . '</p>
                                    </div>
                                    </div>
                                    <div class="date text-right"><span class="rel-time" data-value="'.$recent_closed['created'].'000"></span><br><span class="tik-status" data-value="'.$recent_closed['status'].'"></span></div>
                                </div>
                                ';
                                    }
                                } else {
                                    echo '
                                <div class="item d-flex align-items-center">
                                <div class="text">
                                    <a href="#">
                                    <h3 class="h5">OOPS</h3>
                                    </a>
                                    <small>No record found</small>
                                </div>
                                </div>
                                ';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var PIECHART = $('#pieChart');
        var myPieChart = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: [
                    "Open",
                    "Assigned",
                    "Closed"
                ],
                datasets: [
                    {
                        data: [<?= $stats['open_tickets'] ?>, <?= $stats['assigned_tickets'] ?>, <?= $stats['closed_tickets'] ?>],
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: [
                            '#ffc36d',
                            "#17a2b8",
                            "#ff7676"
                        ],
                        hoverBackgroundColor: [
                            '#e2ab62',
                            "#15788d",
                            "#cc5d5d"
                        ]
                    }]
            }
        });

    </script>
    <script>
        // Toggle Applications section
        function toggleApplications() {
            var content = document.getElementById('applications-content');
            var drives = document.getElementById('drives-content');
            var printers = document.getElementById('printers-content');
            
            drives.style.display = 'none';
            printers.style.display = 'none';
            
            if (content.style.display === 'none') {
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
            
            if (content.style.display === 'none') {
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
            
            if (content.style.display === 'none') {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        }
    </script>

    <style>
        .app-link {
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease;
            display: block;
            padding: 15px;
            border-radius: 8px;
        }
        
        .app-link:hover {
            background-color: #f0f0f0;
            transform: scale(1.05);
            text-decoration: none;
        }
        
        .bg-blue { background-color: #007bff; }
        .bg-purple { background-color: #6f42c1; }
        .bg-teal { background-color: #20c997; }
    </style>