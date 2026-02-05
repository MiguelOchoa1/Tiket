<style>
    .dashboard-modern .row > [class*="col-"] {
        display: flex;
    }
    .dashboard-modern .row > [class*="col-"] > a,
    .dashboard-modern .row > [class*="col-"] > div {
        width: 100%;
    }
</style>

    <!--Dashboard counts-->
    <section class="dashboard-header no-padding-bottom col-left-no-padding dashboard-modern">
        <div class="container-fluid px-0">
            <div class="row dashboard-top-row align-items-stretch no-gutters" style="margin-left:0; margin-right:0;">
                <a href="<?= BASE_URL ?>tickets/list_all" class="col-md-3" style="padding-left:1px; padding-right:1px;">
                    <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                        <div class="statistic-header" style="align-self: flex-start;">All Tickets</div>
                        <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1; font-size: 120px; line-height: 1;"><strong><?= $stats['total_tickets'] ?></strong></div>
                    </div>
                </a>

                <div class="col-md-9 d-flex" style="padding-left:1px; padding-right:1px;">
                    <div class="bar-chart-example card custom-border-radius w-100 severity-card" style="height: 360px; min-height:360px; margin:0;">
                        <div class="card-header d-flex align-items-center custom-border-radius" style="padding: 10px 14px;">
                            <h2 class="h3">Ticket Status By Severity</h2>
                        </div>
                        <div class="card-body" style="padding: 8px 14px 12px 18px; height: 260px; display: block;">
                            <canvas id="severity-bar-graph" height="240" style="display: block; width: 100%; height: 240px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row dashboard-top-row align-items-stretch no-gutters" style="margin-left:0; margin-right:0;">
                <div class="col-md-3" style="padding-left:1px; padding-right:1px;">
                    <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                        <div class="statistic-header" style="align-self: flex-start;">Ticket Status</div>
                        <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1;">
                            <div class="ticket-status-chart" style="flex: 0 0 60%; max-width: 60%; display: flex; justify-content: center;">
                                <canvas id="pieChart" height="200" style="width: 100%; height: 200px;"></canvas>
                            </div>
                            <div class="ticket-status-legend" style="flex: 0 0 40%; max-width: 40%; font-size: 12px;">
                                <div style="display: flex; align-items: center; margin-bottom: 6px;">
                                    <span style="width: 10px; height: 10px; background: #db3700; display: inline-block; margin-right: 6px; border-radius: 2px;"></span>
                                    <span>Open</span>
                                    <span style="margin-left: 6px; color: #555;"> <?= $stats['open_tickets'] ?> </span>
                                </div>
                                <div style="display: flex; align-items: center; margin-bottom: 6px;">
                                    <span style="width: 10px; height: 10px; background: #3779eb; display: inline-block; margin-right: 6px; border-radius: 2px;"></span>
                                    <span>Assigned</span>
                                    <span style="margin-left: 6px; color: #555;"> <?= $stats['assigned_tickets'] ?> </span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <span style="width: 10px; height: 10px; background: #2bb660; display: inline-block; margin-right: 6px; border-radius: 2px;"></span>
                                    <span>Closed</span>
                                    <span style="margin-left: 6px; color: #555;"> <?= $stats['closed_tickets'] ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="padding-left:1px; padding-right:1px;">
                    <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                        <div class="statistic-header" style="align-self: flex-start;">Total Users</div>
                        <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1;"><strong style="font-size: 120px; line-height: 1;"><?= $stats['total_users'] ?></strong></div>
                    </div>
                </div>
                <div class="col-md-3" style="padding-left:1px; padding-right:1px;">
                    <a href="<?= BASE_URL ?>tickets/assigned_tickets" class="w-100" style="display:block; width:100%;">
                        <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                            <div class="statistic-header" style="align-self: flex-start;">Assigned Tickets</div>
                            <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1;"><strong style="font-size: 120px; line-height: 1;"><?= $stats['assigned_tickets'] ?></strong></div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3" style="padding-left:1px; padding-right:1px;">
                    <a href="<?= BASE_URL ?>tickets/closed_tickets" class="w-100" style="display:block; width:100%;">
                        <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                            <div class="statistic-header" style="align-self: flex-start;">Closed Tickets</div>
                            <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1;"><strong style="font-size: 120px; line-height: 1;"><?= $stats['closed_tickets'] ?></strong></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- recent activity -->
    <section class="feeds" style="margin-top: 24px;">
        <div class="container-fluid col-left-no-padding px-0">
            <div class="row">
                <div class="col-lg-12 d-flex">
                    <div class="recent-updates card custom-border-radius w-100">
                        <div class="card-header d-flex align-items-center custom-border-radius">
                            <h2 class="h3">Recent Tickets</h2>
                        </div>
                        <div class="card-header tab-card-header shadow-none">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link disabled-text active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Recent Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled-text" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Recent Open Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled-text" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Recent Assigned Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled-text" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Four" aria-selected="false">Recent Closed Tickets</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body tab-content">
                            <!-- All Recent tickets -->
                            <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                <div class="recent-activity">
                                    <!-- Activity will be loaded via AJAX -->
                                </div>
                            </div>
                            <!-- Recent Open tickets -->
                            <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="recent-activity">
                                    <!-- Activity will be loaded via AJAX -->
                                </div>
                            </div>
                            <!-- Recent Assigned tickets -->
                            <div class="tab-pane fade" id="three" role="tabpanel" aria-labelledby="three-tab">
                                <div class="recent-activity">
                                    <!-- Activity will be loaded via AJAX -->
                                </div>
                            </div>
                            <!-- Recent Closed tickets -->
                            <div class="tab-pane fade" id="four" role="tabpanel" aria-labelledby="four-tab">
                                <div class="recent-activity">
                                    <!-- Activity will be loaded via AJAX -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= BASE_URL ?>assets/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/charts-home.js"></script>
    <script>
    $(document).ready(function() {
        // Severity Bar Chart
        var severityCtx = document.getElementById('severity-bar-graph');
        if (severityCtx) {
            var severityChart = new Chart(severityCtx, {
                type: 'bar',
                data: {
                    labels: ['Low', 'Medium', 'High', 'Critical'],
                    datasets: [{
                        label: 'Tickets by Severity',
                        data: [2, 3, 3, 2],
                        backgroundColor: [
                            '#4de43b',
                            '#ffb52e', 
                            '#fe0000',
                            '#8b0000'
                        ],
                        borderColor: [
                            '#4de43b',
                            '#ffb52e',
                            '#fe0000',
                            '#8b0000'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: true
                    }
                }
            });
        }
    });
    </script>
