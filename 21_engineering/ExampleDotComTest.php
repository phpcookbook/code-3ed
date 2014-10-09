<?php
class ExampleDotComTest extends PHPUnit_Extensions_SeleniumTestCase
{
    function setUp() {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://www.example.com');
    }

    // basic homepage loading
    function testHomepageLoading()
    {
        $this->open('http://www.example.com/');
        $this->assertTitle('Example Domain');
    }

    // test clicking on a link and getting the right page
    function testClick()
    {
        $this->open('http://www.example.com/');
        $this->clickAndWait('link=More information...');
        $this->assertTitle('IANA — IANA-managed Reserved Domains');
    }
}
