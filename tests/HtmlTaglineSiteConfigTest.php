<?php

class HtmlTaglineSiteConfigTest extends SapphireTest
{
    public function testUpdateCMSFields()
    {
        $siteConfig = new SiteConfig();
        $fields = $siteConfig->getCMSFields();
        $tab = $fields->findOrMakeTab('Root.Main');
        $fields = $tab->fieldList();
        $names = array();
        foreach ($fields as $field) {
            array_push($names, $field->getName());
        }
        error_log(print_r($names,1));

        // Check that TagLine has been replaced by HTMLTagLine
        $this->assertContains('HTMLTagLine', $names);
        $this->assertNotContains('TagLine', $names);
    }

    public function testPopulateDefaults()
    {
        $siteConfig = new SiteConfig();
        $siteConfig->populateDefaults();
        $fields = $siteConfig->getCMSFields();
        $tab = $fields->findOrMakeTab('Root.Main');
        $fields = $tab->fieldList();
        $value = $fields->fieldByName('HTMLTagLine')->value();
        $this->assertEquals('<p>your tagline here</p>', $value);
    }
}
