<?php

use PHP\CodeFormatter\Decorator\NewLineBefore;

class NewLineBeforeTest extends PHPUnit_Framework_TestCase
{
    
    public function testRenderUsesUnixStyleLineEndiing()
    {
    	$decorator = new NewLineBefore(NewLineBefore::UNIX);
    	$this->assertSame("\nContent", $decorator->render("Content"));
    }
    
    public function testRenderUsesWindowsStyleLineEndiing()
    {
    	$decorator = new NewLineBefore(NewLineBefore::WINDOWS);
    	$this->assertSame("\r\nContent", $decorator->render("Content"));
    }
    
    /**
     * @expectedException PHP\CodeFormatter\Decorator\DecoratorException
     */
    public function testRenderThorwsExceptionWhenLineEndingIsNotSupported()
    {
    	$decorator = new NewLineBefore("unsupported line ending");
    	$decorator->render("Content");
    }
}