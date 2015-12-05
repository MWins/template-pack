<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

      <xsl:template match="/">
<h2><xsl:value-of select="//company/name"/></h2>
<h3><xsl:value-of select="//company/contact"/></h3>
<xsl:variable name="hyperlink" select="//company/email"/>
<a href="mailto:{$hyperlink}"><xsl:text> contact </xsl:text></a>   

<h2><xsl:value-of select="//client/project"/></h2>
<h2><xsl:value-of select="//client/name"/></h2>
<xsl:variable name="clientemail" select="//client/email"/>
<a href="mailto:{$clientemail}"><xsl:text> email</xsl:text></a>   

<table>
    <xsl:for-each select="//lineitems/lineitem">
    <tr>
        <td> <xsl:value-of select="description" /></td>
        <td> <xsl:value-of select="quantity" /></td>
        <td> <xsl:value-of select="hourly" /></td>
        <td> <xsl:value-of select="total" /></td>
    </tr>
    </xsl:for-each>
    <tr>
        <td />
        <td><xsl:text>Total</xsl:text> </td>
        <td>
        <xsl:value-of select="sum(//lineitems/lineitem/total)" />
        </td>
    </tr>
</table>      



      </xsl:template>      
</xsl:stylesheet>
