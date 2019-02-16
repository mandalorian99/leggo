<?php 
print_r($data) ;
foreach ($data as $key => $value) {
	?>
	<table border="1px black">
		<tr>
			<td><?php echo $value['id'] ; ?></td>
			<td><?php echo $value['name'] ; ?></td>
			<td><?php echo $value['token'] ; ?></td>
		</tr>
	</table>
	<?php
}
?>
<div>
	<h1>View generated dynamically...</h1>
</div>