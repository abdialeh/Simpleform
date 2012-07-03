<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo Settings::get("site_title") . ' - ' . $email_title ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="<?php echo Settings::get_lang() ?>" />
	<style type="text/css">
		h1, .headline1{
			display: block;
			color: #bcc22a;
			font-family: arial, verdana, sans-serif;
			font-size: 14pt;
			text-align: left;
			line-height: 1.2em;
			font-weight: normal;
		}
		label{
			display: block;
			width: 70px;
			float: left;
			text-align: right;
			margin-right: 10px;
		}

		p{
			margin-bottom: 10px;
		}

		p.lbl{
			height: 15px;
			clear: both;
		}

		body{
			color: #2d2f36;
			font-family: arial, verdana, sans-serif;
			font-size: 10pt;
			line-height: 1.2em;
			background-color: #eeeeee;
		}

		a:link, a:visited, a:active, a:hover{
			color: #2d2f36;
			text-decoration: underline;
			font-weight: normal;
		}

		a:hover	{
			color: #2d2f36;
			text-decoration: none;
		}
	</style>
</head>
<body bgcolor="#eeeeee">
	<center>
		<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:0; width: 100%;">
			<tr>
				<td class="bg_fade">
					<table border="0" width="880" style="border:0; width: 880px; margin: 0 auto;">
						<tr>
							<td>
								<h1><?php echo $email_title ?></h1>
								
								<?php foreach ($form_data as $key => $value): ?>
									<?php if($key != 'email_title'): ?>
										<p>
											<strong><?php echo lang('module_simpleform_field_' . $key) ?></strong> : 
											<?php echo $value ?>
										</p>
									<?php endif; ?>
								<?php endforeach; ?>
								
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>
