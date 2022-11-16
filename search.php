<?php
include 'conn.php';
$sql = "select * from tbl_customer where cname like '%{$_POST['cname']}%'";
$query = mysql_query($sql);
?>
<div class="col-md-12">
<table class="table table-bordered">
<thead>
<tr>
<th>ลำดับ</th>
<th>รหัสสินค้า</th>
<th>ชื่อสินค้า</th>
<th>ราคาสินค้า</th>
<th>หน่วยนับ</th>
</tr>
</thead>
<tbody>
<?php $i=1; while ($result = mysql_fetch_assoc($query)) { ?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $result['sname'];?></td>
<td><?php echo $result['cname'];?></td>
<td><?php echo number_format($result['price']);?></td>
<td><?php echo $result['unit'];?></td>
</tr>
<?php $i++; } ?>
</tbody>
</table>
</div>