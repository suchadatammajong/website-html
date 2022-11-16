<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<form name="frmSearch" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
<?php
if($_GET["txtKeyword"] != "")
	{
	$objConnect = mysql_connect("localhost","surache1_room1g2","ZPN25472") or die("Error Connect to Database");
	$objDB = mysql_select_db("surache1_room1g2");
	// Search By Name or Email
	$strSQL = "SELECT * FROM tbl_customer WHERE (cname LIKE '%".$_GET["txtKeyword"]."%' or sname LIKE '%".$_GET["txtKeyword"]."%' )";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
	<table width="600" border="1">
	  <tr>
		<th width="91"> <div align="center">CustomerID </div></th>
		<th width="98"> <div align="center">Name </div></th>
		<th width="198"> <div align="center">Email </div></th>
	  </tr>
	<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
		<td><div align="center"><?php echo $objResult["cname"];?></div></td>
		<td><?php echo $objResult["sname"];?></td>
		<td><?php echo $objResult["tel"];?></td>
	  </tr>
	<?php
	}
	?>
	</table>
	<?php
	mysql_close($objConnect);
}
?>
</body>
</html>