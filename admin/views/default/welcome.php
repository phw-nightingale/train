
<div class="page-container">
	<p>登录次数：<?=Yii::$app->user->identity->login_num?> </p>
	<p>登录IP：<?=Yii::$app->user->identity->login_ip?>  登录时间：<?=Yii::$app->user->identity->login_time?> </p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th colspan="7" scope="col">信息统计</th>
			</tr>
			<tr class="text-c">
				<th>统计</th>
				<th>学校</th>
				<th>教师</th>
				<th>学生</th>
				<th>课件</th>
				<th>试卷</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td>今日</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>昨日</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>本周</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
			<tr class="text-c">
				<td>本月</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
			</tr>
		</tbody>
	</table>
    

    
    
	<table class="table table-border table-bordered table-bg mt-20">
    

    
    
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<?php
            array_walk($info,function ($val,$keys){
            echo ' <tr>';
            echo ' <th width="30%">'.$keys.'</th>';
            echo ' <div class="profile-info-value">';
            echo ' <td>'.$val.'</td>';
            echo ' </tr>';
            })
            ?>
            
  
		</tbody>
	</table>
</div>
