<?xml version = "1.0" encoding = "UTF-8"?>
<xsl:stylesheet version = "1.0" xmlns:xsl = "http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/script">
	<html>
	<body>
		<h1 style="text-align: center;"><xsl:value-of select="@title"/></h1>
		<h2 style="text-align: center;">Characters</h2>
		<xsl:for-each select="roles/character">
			<ul style="list-style-type:none; display:inline">
				<li style="list-style-type:none; display:inline"> <xsl:value-of select="@name"/> </li>
			</ul>
		</xsl:for-each>

		<xsl:for-each select="act">
			<h3 style="text-align: center;">
				Act: 
				<xsl:value-of select="@id"/>
			</h3>
			<div>
				<!-- This is where the lines and people attatched are defined-->
				<xsl:for-each select="scene">
					<h5 style="text-align: center;">
						Scene: 
						<xsl:value-of select="@id"/>
					</h5>
					<dl>
						<xsl:for-each select="line">
							<dt>
								<xsl:value-of select="@characterID"/>:
							</dt>
							<dd>
								<xsl:value-of select="text"/>
								<p></p>
							</dd>
						</xsl:for-each>
					</dl>
				</xsl:for-each>
			</div>
		</xsl:for-each>
		<p style = "color:red; text-align: center;">
			Thank you for using Practice script
		</p>
	</body>
	</html>
</xsl:template>
</xsl:stylesheet>