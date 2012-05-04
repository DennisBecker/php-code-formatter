<?php

use PHP\CodeFormatter\Decorator\NewLineAfter;

class NewLineAfterTest extends PHPUnit_Framework_TestCase
{
    
    public function testRenderUsesUnixStyleLineEndiing()
    {
    	$decorator = new NewLineAfter(NewLineAfter::UNIX);
    	$this->assertSame("Content\n", $decorator->render("Content"));
    }
    
    public function testRenderUsesWindowsStyleLineEndiing()
    {
    	$decorator = new NewLineAfter(NewLineAfter::WINDOWS);
    	$this->assertSame("Content\r\n", $decorator->render("Content"));
    }
    
    /**
     * @expectedException PHP\CodeFormatter\Decorator\DecoratorException
     */
    public function testRenderThorwsExceptionWhenLineEndingIsNotSupported()
    {
    	$decorator = new NewLineAfter("unsupported line ending");
    	$decorator->render("Content");
    }
}