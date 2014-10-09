<xsl:template match="/address-book/person/email"> 
  <xsl:copy>
    <xsl:value-of 
       select="php:functionString('mangle_email', node())" /> 
  </xsl:copy>
</xsl:template>
