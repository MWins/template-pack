<?php 
$xml = '<?xml version="1.0" encoding="UTF-8"?><allcustomers><customers> <customerName>Foo</customerName><customernumber>yard</customernumber><state>perioia</state> </customers></allcustomers>';
$xsl = <<<EOB
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
 xmlns:php="http://php.net/xsl">
<xsl:output method="html" encoding="utf-8" indent="yes"/>
<xsl:template match="allcustomers">
 <html><body>
 <h2>Customers</h2>

 <table>
 <xsl:for-each select="customers">
 <tr><td>

 <xsl:value-of
 select="php:function('ucfirst',string(customernumber))"/>


 </td>
<td><xsl:value-of select="customerName"/></td>
<td><xsl:value-of select="state"/></td>

 </tr>
 </xsl:for-each>
 </table>
 </body></html>
 </xsl:template>
</xsl:stylesheet>
EOB;

$xmldoc = new DOMDocument();
$xmldoc->loadXML(utf8_encode(str_replace("&", "and", $xml)));
$xsldoc = new DOMDocument();
$xsldoc->loadXML($xsl);

$proc = new XSLTProcessor();
$proc->registerPHPFunctions();
$proc->importStyleSheet($xsldoc);
echo $proc->transformToXML($xmldoc);


$xml = <<<EOB
<allusers>
 <user>
  <uid>bob</uid>
 </user>
 <user>
  <uid>joe</uid>
 </user>
</allusers>
EOB;
$xsl = <<<EOB
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" 
     xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
     xmlns:php="http://php.net/xsl">
<xsl:output method="html" encoding="utf-8" indent="yes"/>
 <xsl:template match="allusers">
  <html><body>
    <h2>Users</h2>
    <table>
    <xsl:for-each select="user">
      <tr><td>
        <xsl:value-of
             select="php:function('ucfirst',string(uid))"/>
      </td></tr>
    </xsl:for-each>
    </table>
  </body></html>
 </xsl:template>
</xsl:stylesheet>
EOB;
$xmldoc = DOMDocument::loadXML($xml);
$xsldoc = DOMDocument::loadXML($xsl);

$proc = new XSLTProcessor();
$proc->registerPHPFunctions();
$proc->importStyleSheet($xsldoc);
echo $proc->transformToXML($xmldoc);






