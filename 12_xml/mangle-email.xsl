<?xml version="1.0" ?> 
<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  xmlns:php="http://php.net/xsl"          
  xsl:extension-element-prefixes="php"> 

<xsl:template match="@*|node()">
  <xsl:copy>
    <xsl:apply-templates select="@*|node()"/>
  </xsl:copy>
</xsl:template>


<xsl:template match="/address-book/person/email"> 
  <xsl:copy>
    <xsl:value-of select="php:function('mangle_email', node())" /> 
  </xsl:copy>
</xsl:template> 
</xsl:stylesheet>
