<?php
namespace aura\view\helper;

/**
 * Test class for Styles.
 * Generated by PHPUnit on 2011-04-02 at 08:29:10.
 */
class StylesTest extends \PHPUnit_Framework_TestCase
{
    public function test__invoke()
    {
        $styles = new Styles;
        $actual = $styles();
        $this->assertType('aura\view\helper\Styles', $actual);
    }
    
    public function testAddAndGet()
    {
        $styles = new Styles;
        
        $styles->add('/css/middle.css');
        $styles->add('/css/last.css', 150);
        $styles->add('/css/first.css', 50);
        
        $actual = $styles->get();
        $expect = '    <link rel="stylesheet" href="/css/first.css" type="text/css" media="screen" />' . PHP_EOL
                . '    <link rel="stylesheet" href="/css/middle.css" type="text/css" media="screen" />' . PHP_EOL
                . '    <link rel="stylesheet" href="/css/last.css" type="text/css" media="screen" />' . PHP_EOL;
        
        $this->assertSame($expect, $actual);
    }
    
    /**
     * @todo Implement testSetIndent().
     */
    public function testSetIndentAndAttribs()
    {
        $styles = new Styles;
        
        $styles->setIndent('  ');
        $styles->add('/css/middle.css', null, array('media' => 'print'));
        $styles->add('/css/last.css', 150);
        $styles->add('/css/first.css', 50);
        
        $actual = $styles->get();
        
        $expect = '  <link rel="stylesheet" href="/css/first.css" type="text/css" media="screen" />' . PHP_EOL
                . '  <link rel="stylesheet" href="/css/middle.css" type="text/css" media="print" />' . PHP_EOL
                . '  <link rel="stylesheet" href="/css/last.css" type="text/css" media="screen" />' . PHP_EOL;
        
        $this->assertSame($expect, $actual);
    }
}
