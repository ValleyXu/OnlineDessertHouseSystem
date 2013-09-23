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
    var chart,
        categories = ['0-19','20-39','40-59','60 +'];
    $(document).ready(function() {
        var options = {
            chart: {
                renderTo: 'container',
                type: 'bar'
            },
            title: {
                text: 'Population pyramid for Valley Dessert Member'
            },
            subtitle: {
                text: 'Valley Dessert'
            },
            xAxis: [{
                categories: categories,
                reversed: false
            }, { // mirror axis on right side
                opposite: true,
                reversed: false,
                categories: categories,
                linkedTo: 0
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function(){
                        return (Math.abs(this.value)) ;
                    }
                },
                min: -10,
                max: 10
            },
    
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
    
            tooltip: {
                formatter: function(){
                    return '<b>'+ this.series.name +', age '+ this.point.category +'</b><br/>'+
                        'Population: '+ Highcharts.numberFormat(Math.abs(this.point.y), 0);
                }
            },
    
            series:[{
            	name:'Male',
            	data:<?php echo  json_encode($dataM);?>//echo 出来的结果包含[],所以不要再加[];
            },{
            	name:'Female',
            	data:<?php echo json_encode($dataF); ?>
            }]

        };

        chart = new Highcharts.Chart(options);
    });
    
});
</script>