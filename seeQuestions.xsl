<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<body>
	<P>GALDERAK:</P>
	<TABLE border="1">
		<THEAD><TR><TH>Galdera</TH><TH>Erantzuna</TH></TR></THEAD>
		<xsl: for-each select="assessmentItems/assessmentItem/">
			<TR>
				<TD><FONT size ="2" COLOR ="red" FACE= "Verdana">
					<xsl:value-of select="itemBody/p"/> 
				</FONT></TD>
				<TD><FONT>
					<xsl:value-of select="correctResponse/value"/> 
				</FONT></TD>
			</TR>
		</xsl: for-each>
	</TABLE>

</body></html>
</xsl:stylesheet>