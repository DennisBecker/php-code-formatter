<?php

namespace PHP\CodeFormatter\Decorator;

class NewLineBefore implements DecoratorInterface
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
     * @var string
     */
    protected $lineEnding;
    
    /**
     * Create new instance of NewLine class and define the style of line ending
     * and if it should be prepended or appended. The default line ending is
     * Unix style.
     * 
     * @param string $orientation
     * @param string $lineEnding        OPTIONAL default UNIX
     */
    public function __construct($lineEnding = NewLineBefore::UNIX)
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
        return $this->lineEnding . $content;
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
        if (!in_array($lineEnding, array(NewLineBefore::UNIX, NewLineBefore::WINDOWS))) {
            throw new DecoratorException(
            	"Line ending style not supported, use UNIX or WINDOWS instead");
        }
        
        $this->lineEnding = $lineEnding;
    }
}