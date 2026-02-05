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

        <h1 class="h2 mb-3 mb-lg-4">Dashboard</h1>

        <!-- First Row: All Tickets + Severity Chart -->
        <div class="row dashboard-top-row align-items-stretch no-gutters" style="margin-left:0; margin-right:0;">
            <div class="col-md-3" style="padding-left:1px; padding-right:1px;">
                <a href="<?= BASE_URL ?>tickets" class="w-100" style="display:block; width:100%;">
                    <div class="statistic statistic-lg bg-white has-shadow custom-border-radius" style="height: 360px; min-height: 360px; margin:0; padding: 14px 16px; width:100%; display: flex; flex-direction: column; justify-content: flex-start;">
                        <div class="statistic-header" style="align-self: flex-start;">All Tickets</div>
                        <div class="text" style="width: 100%; display: flex; align-items: center; justify-content: center; flex: 1; font-size: 120px; line-height: 1;"><strong><?= $stats['total_tickets'] ?></strong></div>
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

        <!-- Second Row: Ticket Status + Total Users + Assigned + Closed -->
        <div class="row align-items-stretch no-gutters" style="margin-top: 2px; margin-left:0; margin-right:0;">
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
                                <span style="width: 10px; height: 10px; background: #12c2de; display: inline-block; margin-right: 6px; border-radius: 2px;"></span>
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

    <script src="<?= BASE_URL ?>assets/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/charts-home.js"></script>

    <script>
    $(document).ready(function() {
        // Ticket Status Pie Chart
        var pieCtx = document.getElementById('pieChart');
        if (pieCtx) {
            var openCount = parseInt('<?= $stats["open_tickets"] ?>') || 0;
            var assignedCount = parseInt('<?= $stats["assigned_tickets"] ?>') || 0;
            var closedCount = parseInt('<?= $stats["closed_tickets"] ?>') || 0;
            var totalCount = openCount + assignedCount + closedCount;

            var pieChart = new Chart(pieCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Open', 'Assigned', 'Closed'],
                    datasets: [{
                        data: [openCount, assignedCount, closedCount],
                        backgroundColor: [
                            '#db3700',
                            '#12c2de',
                            '#2bb660'
                        ],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                },
                plugins: [{
                    id: 'centerText',
                    afterDatasetsDraw(chart) {
                        const {ctx, chartArea: {left, top, width, height}} = chart;
                        ctx.save();
                        ctx.font = 'bold 24px sans-serif';
                        ctx.fillStyle = '#333';
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        ctx.fillText(totalCount, left + width / 2, top + height / 2);
                        ctx.restore();
                    }
                }]
            });
        }

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
                    }
                }
            });
        }
    });
    </script>


