<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Capturize\ExtensionBundle\Twig;

use Capturize\ExtensionBundle\Twig\CapturizeNode;

/**
 *
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class CapturizeTokenParser extends \Twig_TokenParser
{
    /**
     * Parses a token and returns a node.
     *
     * @param \Twig_Token $token A \Twig_Token instance
     *
     * @return \Twig_NodeInterface A \Twig_NodeInterface instance
     */
    public function parse(\Twig_Token $token)
    {
        $expr = $this->parser->getExpressionParser()->parseExpression();

        // attributes
        if ($this->parser->getStream()->test(\Twig_Token::NAME_TYPE, 'with')) {
            $this->parser->getStream()->next();

            $hasAttributes = true;
            $attributes = $this->parser->getExpressionParser()->parseExpression();
        } else {
            $hasAttributes = false;
            $attributes = new \Twig_Node_Expression_Array(array(), $token->getLine());
        }

        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

        return new CapturizeNode($expr, $attributes, $token->getLine(), $this->getTag());
    }

    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
    public function getTag()
    {
        return 'capturize';
    }
}