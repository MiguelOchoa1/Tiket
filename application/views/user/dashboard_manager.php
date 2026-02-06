<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
    .dashboard-top-row .statistic {
        cursor: pointer;
    }
    .severity-card {
        height: 360px !important;
    }
</style>

<section class="slice slice-sm d-flex align-items-center" style="padding: 40px 0;">
    <div class="container-fluid">

        

        <!-- First Row: All Tickets + Severity Chart -->
        <div class="row dashboard-top-row align-items-stretch no-gutters" style="margin-left:0; margin-right:0;">
            <div class="col-md-3" style="padding-left:1px; padding-right:1px;">
                <a href="<?= BASE_URL ?>tickets/list_all" class="w-100" style="display:block; width:100%;">
                    <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                        <div class="statistic-header" style="align-self: flex-start;">Tickets Created Today</div>
                        <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1; font-size: 120px; line-height: 1;"><strong><?= $stats['created_today'] ?></strong></div>
                    </div>
                </a>
            </div>
            <div class="col-md-9" style="padding-left:1px; padding-right:1px;">
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

        <!-- Second Row: Total Users + Assigned + Closed -->
        <div class="row align-items-stretch no-gutters" style="margin-top: 2px; margin-left:0; margin-right:0;">
            <div class="col-md-4" style="padding-left:1px; padding-right:1px;">
                <a href="<?= BASE_URL ?>tickets/assigned_tickets" class="w-100" style="display:block; width:100%;">
                    <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                        <div class="statistic-header" style="align-self: flex-start;">Assigned Tickets</div>
                        <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1;"><strong style="font-size: 120px; line-height: 1;"><?= $stats['assigned_tickets'] ?></strong></div>
                    </div>
                </a>
            </div>
            <div class="col-md-4" style="padding-left:1px; padding-right:1px;">
                <a href="<?= BASE_URL ?>tickets/closed_tickets" class="w-100" style="display:block; width:100%;">
                    <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                        <div class="statistic-header" style="align-self: flex-start;">Closed Tickets</div>
                        <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1;"><strong style="font-size: 120px; line-height: 1;"><?= $stats['closed_tickets'] ?></strong></div>
                    </div>
                </a>
            </div>
             <div class="col-md-4" style="padding-left:1px; padding-right:1px;">
                 <a href="<?= BASE_URL ?>tickets/list_all" class="w-100" style="display:block; width:100%;">
                     <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                         <div class="statistic-header" style="align-self: flex-start;">All Tickets</div>
                         <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1;"><strong style="font-size: 120px; line-height: 1;"><?= $stats['total_tickets'] ?></strong></div>
                     </div>
                 </a>
             </div>
        </div>
    </div>
</section>
<!-- recent activity & Priority graph-->
<section class="feeds" style="margin-top: -44px; margin-left: -15px; margin-right: -15px; padding: 0; background: #f5f6fa;">
    <div class="container col-left-no-padding">
        <div class="row">
            <!-- Trending Articles-->
<!-- Recent Tickets Full Width -->
<div style="width: 100vw; position: relative; left: 50%; right: 50%; margin-left: -50vw; margin-right: -50vw; background: #f5f6fa; padding: 30px 15px; margin-top: 30px;">
    <div class="container">
        <h2 class="h3" style="margin-bottom: 20px;">Recent Tickets</h2>
        <ul class="nav nav-tabs" role="tablist" style="border-bottom: 1px solid #ddd; margin-bottom: 20px;">
            <li class="nav-item">
                <a class="nav-link active show" id="recent-all-tab" data-toggle="tab" href="#recent-all" role="tab">Recent Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="recent-open-tab" data-toggle="tab" href="#recent-open" role="tab">Recent Open Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="recent-assigned-tab" data-toggle="tab" href="#recent-assigned" role="tab">Recent Assigned Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="recent-closed-tab" data-toggle="tab" href="#recent-closed" role="tab">Recent Closed Tickets</a>
            </li>
        </ul>
        
        <div class="tab-content">
            <div class="tab-pane fade show active" id="recent-all" role="tabpanel">
                <?php
                if (is_array($recent['created']) && count($recent['created']) > 0) {
                    foreach ($recent['created'] as $recent_created) {
                        echo '
                        <div class="item d-flex justify-content-between" style="padding: 15px; border-bottom: 1px solid #eee;">
                            <div class="info d-flex" style="flex: 1;">
                                <div class="icon" style="margin-right: 15px;"><i class="fa fa-ticket text-green" style="font-size: 20px;"></i></div>
                                <div class="title">
                                    <a href="' . BASE_URL . 'tickets/view_ticket/' . $recent_created['ticket_no'] . '" style="text-decoration: none; color: #333;">
                                        <h5 style="margin: 0 0 5px 0;">' . $recent_created['ticket_no'] . '</h5>
                                    </a>
                                    <p style="margin: 2px 0; color: #999; font-size: 13px;">Purpose: ' . $recent_created['purpose'] . '</p>
                                    <p style="margin: 2px 0; color: #999; font-size: 13px;">Subject: ' . $recent_created['subject'] . '</p>
                                </div>
                            </div>
                            <div class="date text-right" style="white-space: nowrap; margin-left: 15px;">
                                <span class="rel-time" data-value="' . $recent_created['created'] . '000"></span><br>
                                <span class="tik-status" data-value="' . $recent_created['status'] . '"></span>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo '<div style="padding: 20px; text-align: center; color: #999;"><h5>No record found</h5></div>';
                }
                ?>
            </div>
            
            <div class="tab-pane fade" id="recent-open" role="tabpanel">
                <?php
                if (is_array($recent['open']) && count($recent['open']) > 0) {
                    foreach ($recent['open'] as $recent_open) {
                        echo '
                        <div class="item d-flex justify-content-between" style="padding: 15px; border-bottom: 1px solid #eee;">
                            <div class="info d-flex" style="flex: 1;">
                                <div class="icon" style="margin-right: 15px;"><i class="fa fa-ticket text-red" style="font-size: 20px;"></i></div>
                                <div class="title">
                                    <a href="' . BASE_URL . 'tickets/view_ticket/' . $recent_open['ticket_no'] . '" style="text-decoration: none; color: #333;">
                                        <h5 style="margin: 0 0 5px 0;">' . $recent_open['ticket_no'] . '</h5>
                                    </a>
                                    <p style="margin: 2px 0; color: #999; font-size: 13px;">Purpose: ' . $recent_open['purpose'] . '</p>
                                    <p style="margin: 2px 0; color: #999; font-size: 13px;">Subject: ' . $recent_open['subject'] . '</p>
                                </div>
                            </div>
                            <div class="date text-right" style="white-space: nowrap; margin-left: 15px;">
                                <span class="rel-time" data-value="' . $recent_open['created'] . '000"></span><br>
                                <span class="tik-status" data-value="' . $recent_open['status'] . '"></span>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo '<div style="padding: 20px; text-align: center; color: #999;"><h5>No record found</h5></div>';
                }
                ?>
            </div>
            
            <div class="tab-pane fade" id="recent-assigned" role="tabpanel">
                <?php
                if (is_array($recent['assigned']) && count($recent['assigned']) > 0) {
                    foreach ($recent['assigned'] as $recent_assigned) {
                        echo '
                        <div class="item d-flex justify-content-between" style="padding: 15px; border-bottom: 1px solid #eee;">
                            <div class="info d-flex" style="flex: 1;">
                                <div class="icon" style="margin-right: 15px;"><i class="fa fa-ticket text-info" style="font-size: 20px;"></i></div>
                                <div class="text">
                                    <a href="' . BASE_URL . 'tickets/view_ticket/' . $recent_assigned['ticket_no'] . '" style="text-decoration: none; color: #333;">
                                        <h5 style="margin: 0 0 5px 0;">' . $recent_assigned['ticket_no'] . '</h5>
                                    </a>
                                    <p style="margin: 2px 0; color: #999; font-size: 13px;">Purpose: ' . $recent_assigned['purpose'] . '</p>
                                    <p style="margin: 2px 0; color: #999; font-size: 13px;">Subject: ' . $recent_assigned['subject'] . '</p>
                                </div>
                            </div>
                            <div class="date text-right" style="white-space: nowrap; margin-left: 15px;">
                                <span class="rel-time" data-value="' . $recent_assigned['created'] . '000"></span><br>
                                <span class="tik-status" data-value="' . $recent_assigned['status'] . '"></span>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo '<div style="padding: 20px; text-align: center; color: #999;"><h5>No record found</h5></div>';
                }
                ?>
            </div>
            
            <div class="tab-pane fade" id="recent-closed" role="tabpanel">
                <?php
                if (is_array($recent['closed']) && count($recent['closed']) > 0) {
                    foreach ($recent['closed'] as $recent_closed) {
                        echo '
                        <div class="item d-flex justify-content-between" style="padding: 15px; border-bottom: 1px solid #eee;">
                            <div class="info d-flex" style="flex: 1;">
                                <div class="icon" style="margin-right: 15px;"><i class="fa fa-ticket text-red" style="font-size: 20px;"></i></div>
                                <div class="title">
                                    <a href="' . BASE_URL . 'tickets/view_ticket/' . $recent_closed['ticket_no'] . '" style="text-decoration: none; color: #333;">
                                        <h5 style="margin: 0 0 5px 0;">' . $recent_closed['ticket_no'] . '</h5>
                                    </a>
                                    <p style="margin: 2px 0; color: #999; font-size: 13px;">Purpose: ' . $recent_closed['purpose'] . '</p>
                                    <p style="margin: 2px 0; color: #999; font-size: 13px;">Subject: ' . $recent_closed['subject'] . '</p>
                                </div>
                            </div>
                            <div class="date text-right" style="white-space: nowrap; margin-left: 15px;">
                                <span class="rel-time" data-value="' . $recent_closed['created'] . '000"></span><br>
                                <span class="tik-status" data-value="' . $recent_closed['status'] . '"></span>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo '<div style="padding: 20px; text-align: center; color: #999;"><h5>No record found</h5></div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

    <script src="<?= BASE_URL ?>assets/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/charts-home.js"></script>

    <script>
    $(document).ready(function() {
        // Ticket Status Pie Chart
        var pieCtx = document.getElementById('pieChart');
        // Ticket Status by Severity Bar Chart
        var severityCtx = document.getElementById('severity-bar-graph');
        if (severityCtx) {
            var openCount = parseInt('<?= $stats["open_tickets"] ?>') || 0;
            var assignedCount = parseInt('<?= $stats["assigned_tickets"] ?>') || 0;
            var closedCount = parseInt('<?= $stats["closed_tickets"] ?>') || 0;

            var severityChart = new Chart(severityCtx, {
                type: 'bar',
                data: {
                    labels: ['Open', 'Assigned', 'Closed'],
                    datasets: [{
                        label: 'Tickets',
                        data: [openCount, assignedCount, closedCount],
                        backgroundColor: [
                            '#fe0000',
                            '#ffb52e',
                            '#2bb660'
                        ],
                        borderColor: [
                            '#fe0000',
                            '#ffb52e',
                            '#2bb660'
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
                    legend: { display: false, position: 'top'
                    }
                }
            });
        }
    });
    </script>







































