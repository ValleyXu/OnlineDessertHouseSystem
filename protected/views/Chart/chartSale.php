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
    <?php //echo  json_encode($dataS);?>
    <?php //echo  json_encode($dataO);?>
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
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Monthly Average Sale/Order Statics',
                x: -20 //center
            },
            subtitle: {
                text: 'Valley Dessert',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Sales Amount ($)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'$';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Sale',
                data: <?php echo  json_encode($dataS);?>
            },{
                name: 'Order',
                data: <?php echo  json_encode($dataO);?>
            }]
        });
    });
    
});
        </script>