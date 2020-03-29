<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WEB File System</title>
	<style type="text/css">
		a{
			text-decoration: none;
			color:#003366;
		}
		a:hover{
			text-decoration: underline;
		}
		.display{
			border:1px solid black;
			width:600px;
			min-height: 200px;
		}

	</style>
</head>
<body>
	<h1>Current: <?php echo $position ;?></h1>
	<hr/>
	<table>
		<tbody>
			<?php $i = 0; if(count($content) > 0 && $content[0]['content'] == ".."){ ?>
				<tr><td>
					<a href=<?php echo "/fs/fs.html?now=".$content[0]['next']; ?> >..</a>
				</td></tr>
			<?php  $i++; } ?>
			
			<?php for(;$i < count($content);++$i){
				if($content[$i]['type']){//filecontent ?>
					<tr><td>
						<?php echo "<xmp class='display'>".$content[$i]["content"]."</xmp>"; ?>
					</td></tr>
				<?php }else{?>
					<tr><td>
						<a href=<?php echo "/fs/fs.html?now=".$content[$i]['next']; ?> ><?php echo $content[$i]['content']; ?></a>
					</td></tr>
				<?php }
			}?>

		</tbody>
	</table>

</body>
</html>