<?php

namespace PHP\CodeFormatter\Decorator;

class NewLineAfter implements DecoratorInterface
{
    
    /**
     * LF line ending
     * 
     * @var string
     */
    const UNIX = "\n";
    
    /**
     * CRLF line ending
     * 
     * @var string
     */
    const WINDOWS = "\r\n";
    
    /**
     * 
     * 
     * @var unknown_type
     */
    protected $lineEnding;
    
    /**
     * Pattern for sprintf to build the string with appended or prepended line
     * ending.
     * 
     * @var string
     */
    protected $pattern;
    
    /**
     * Create new instance of NewLineAfter class and define the style of line ending
     * and if it should be prepended or appended. The default line ending is
     * Unix style.
     * 
     * @param string $orientation
     * @param string $lineEnding        OPTIONAL default UNIX
     */
    public function __construct($lineEnding = NewLineAfter::UNIX)
    {
        $this->setLineEnding($lineEnding);
    }    

    /**
     * Render new line after content
     *
     * @var string $content
     * @return string
     */
    public function render($content)
    {
        return $content . $this->lineEnding;
    }
    
    /**
     * Check if line ending character is supported and save it. Supported line
     * ending characters are
     *   - UNIX "\n" - known as LF
     *   - WINDOWS "\r\n" - known as CRLF
     * 
     * @param string $lineEnding
     * @throws DecoratorException
     */
    protected function setLineEnding($lineEnding)
    {
        if (!in_array($lineEnding, array(NewLineAfter::UNIX, NewLineAfter::WINDOWS))) {
            throw new DecoratorException(
            	"Line ending style not supported, use UNIX or WINDOWS instead");
        }
        
        $this->lineEnding = $lineEnding;
    }
}