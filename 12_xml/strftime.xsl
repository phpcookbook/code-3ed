<?xml version="1.0" ?> 
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns:php="http://php.net/xsl"
    xsl:extension-element-prefixes="php"> 

<xsl:template match="/"> 
    <xsl:value-of select="php:function('strftime', '%c')" /> 
</xsl:template> 

</xsl:stylesheet>
