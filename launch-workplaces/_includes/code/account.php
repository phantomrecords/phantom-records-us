<?php

//enable sessions
session_start();

if (($_SESSION[auth] == "1")) {

   $display_block = "
<P>
			<A HREF=\"../../logout/\"
				ONMOUSEOVER=\"window.status='<< Logout. >>';  return true;\"
				ONMOUSEOUT=\"window.status='';  return true;\">
				<IMG SRC=\"logout.png\" width=53 height=45 BORDER=0></A></P>";

} else {

   //redirect back to login form if not authorized
   header("Location: account.htm");
   exit;
}

?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<TITLE></TITLE>
</head>

<body LINK="#FFFF00" VLINK="#FFFF00" ALINK="#C0C0C0">
<? print $display_block; ?>
</body>
</html>
