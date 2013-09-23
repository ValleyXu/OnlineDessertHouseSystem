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
	<?php //echo  json_encode($dataGoods);?>
	<?php //echo  json_encode($dataNum);?>
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
                type: 'column',
                margin: [ 50, 50, 100, 80]
            },
            title: {
                text: 'Valley Dessert Popular Sale Goods'
            },
            xAxis: {
                categories: <?php echo  json_encode($dataGoods);?>,
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Sale Amount (Number)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        'Sale Number: '+ Highcharts.numberFormat(this.y, 1) +
                        ' ';
                }
            },
                series: [{
                name: 'Sale Amount',
                data: <?php echo  json_encode($dataNum);?>,
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: -3,
                    y: 10,
                    formatter: function() {
                        return this.y;
                    },
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
    
});
		</script>