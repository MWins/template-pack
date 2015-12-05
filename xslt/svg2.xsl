<?xml version="1.0"?>
<xsl:stylesheet version="2.0" 
        xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
        xmlns="http://www.w3.org/2000/svg"
        >
  <xsl:output
      method="xml"
      indent="yes"
      standalone="no"
      doctype-public="-//W3C//DTD SVG 1.1//EN"
      doctype-system="http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"
      media-type="image/svg" />

  <xsl:template match="data">
    <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" >
    <xsl:for-each select="item">
      <rect x="{12 * position()}" y="{100 - .}" width="4" 
        height="{.}" fill="red" stroke="black"/>  
        </xsl:for-each>
    </svg>
  </xsl:template>
</xsl:stylesheet>
