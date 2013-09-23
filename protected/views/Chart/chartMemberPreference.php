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
    
        var colors = Highcharts.getOptions().colors,
            categories = ['yjxx', 'ywr', 'yxm', 'd', 'f'],
            name = 'Member Name',
            data = [{
                    y: 43,
                    color: colors[0],
                    drilldown: {
                        name: 'yjxx Goods Shopping',
                        categories: ['Tea', 'tiramisu', 'Rainbow', 'strawberries','Black Forest'],
                        data: [60, 17, 3, 12, 8],
                        color: colors[0]
                    }
                }, {
                    y: 18,
                    color: colors[1],
                    drilldown: {
                        name: 'ywr Goods Shopping',
                        categories: ['Tea', 'Rainbow', 'Chocolate bars'],
                        data: [50, 15, 35],
                        color: colors[1]
                    }
                }, {
                    y: 10,
                    color: colors[2],
                    drilldown: {
                        name: 'yxm Goods Shopping',
                        categories: ['strawberries', 'Coffee Love'],
                        data: [ 50, 50],
                        color: colors[2]
                    }
                }, {
                    y: 25,
                    color: colors[3],
                    drilldown: {
                        name: 'd Goods Shopping',
                        categories: ['strawberries', 'Coffee Love', 'Purple Flower', 'Black Forest', 'Chocolate bars','Rainbow'],
                        data: [60, 10, 10, 10, 5, 5],
                        color: colors[3]
                    }
                }, {
                    y: 4,
                    color: colors[4],
                    drilldown: {
                        name: 'f Goods Shopping',
                        categories: ['strawberries'],
                        data: [ 100],
                        color: colors[4]
                    }
                }];
    
        function setChart(name, categories, data, color) {
            chart.xAxis[0].setCategories(categories);
            chart.series[0].remove();
            chart.addSeries({
                name: name,
                data: data,
                color: color || 'white'
            });
        }
    
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Valley Dessert Member Prefrence'
            },
            subtitle: {
                text: 'Click the columns to view some specific Member. Click again to return All Member.'
            },
            xAxis: {
                categories: categories
            },
            yAxis: {
                title: {
                    text: 'Total Goods Shopping Number'
                }
            },
            plotOptions: {
                column: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                var drilldown = this.drilldown;
                                if (drilldown) { // drill down
                                    setChart(drilldown.name, drilldown.categories, drilldown.data, drilldown.color);
                                } else { // restore
                                    setChart(name, categories, data);
                                }
                            }
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        color: colors[0],
                        style: {
                            fontWeight: 'bold'
                        },
                        formatter: function() {
                            return this.y +'%';
                        }
                    }
                }
            },
            tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = this.x +':<b>'+ this.y +'% market share</b><br/>';
                    if (point.drilldown) {
                        s += 'Click to view '+ point.category +' goods Shopping';
                    } else {
                        s += 'Click to return to all member';
                    }
                    return s;
                }
            },
            series: [{
                name: name,
                data: data,
                color: 'white'
            }],
            exporting: {
                enabled: false
            }
        });
    });
    
});
		</script>