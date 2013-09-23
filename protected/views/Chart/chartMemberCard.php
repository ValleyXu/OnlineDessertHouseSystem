
<div id="left">
    <h2><span>Member Statics</span></h2>
    <ul>
        <li><a href="<?php echo Yii::app()->createUrl('Chart/chartMember'); ?>">Member Age and Gender</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('Chart/chartMemberCard'); ?>">Member Card State</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('Chart/chartMemberPreference'); ?>">Member Prefrence</a></li> 
    
    </ul>
    <h2><span>Goods Statics</span></h2>
    <ul>
        <li><a href="<?php echo Yii::app()->createUrl('Chart/chartYear'); ?>">Sale/Order</a></li>
        <li><a href="<?php echo Yii::app()->createUrl('Chart/chartHot'); ?>">Popular Goods</a></li>
    </ul>
</div>

<div id="right">
    <?php //echo  json_encode($dataM);?>
    <?php //echo  json_encode($dataF);?>
    <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto">
    
    </div>
</div>




<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Member Card State Statics, Valley Dessert'
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    ['Actived',   <?php echo $dataAct; ?>],
                    {
                        name: 'Disable',
                        y: <?php echo $dataDis; ?>,
                        sliced: true,
                        selected: true
                    },
                    ['Not Actived', <?php echo $dataNot; ?>]
                ]
            }]
        });
    });
    
});
		</script>