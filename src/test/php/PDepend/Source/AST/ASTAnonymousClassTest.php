<?php
/**
 * This file is part of PDepend.
 *
 * PHP Version 5
 *
 * Copyright (c) 2008-2017 Manuel Pichler <mapi@pdepend.org>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Manuel Pichler nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @copyright 2008-2017 Manuel Pichler. All rights reserved.
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 */

namespace PDepend\Source\AST;

use PDepend\Util\Cache\Driver\MemoryCacheDriver;

/**
 * Test case for the {@link \PDepend\Source\AST\ASTCatchStatement} class.
 *
 * @copyright 2008-2017 Manuel Pichler. All rights reserved.
 * @license http://www.opensource.org/licenses/bsd-license.php BSD License
 *
 * @covers \PDepend\Source\Language\PHP\AbstractPHPParser
 * @covers \PDepend\Source\Language\PHP\PHPParserVersion70
 * @covers \PDepend\Source\AST\ASTAnonymousClass
 * @group unittest
 */
class ASTAnonymousClassTest extends ASTNodeTest
{
    /**
     * @return void
     */
    public function testAnonymousClassHasExpectedStartLine()
    {
        $expr = $this->getFirstAnonymousClassInFunction(__METHOD__);
        $this->assertEquals(4, $expr->getStartLine());
    }

    /**
     * @return void
     */
    public function testAnonymousClassHasExpectedStartColumn()
    {
        $expr = $this->getFirstAnonymousClassInFunction(__METHOD__);
        $this->assertEquals(16, $expr->getStartColumn());
    }

    /**
     * @return void
     */
    public function testAnonymousClassHasExpectedEndLine()
    {
        $expr = $this->getFirstAnonymousClassInFunction(__METHOD__);
        $this->assertEquals(9, $expr->getEndLine());
    }

    /**
     * @return void
     */
    public function testAnonymousClassHasExpectedEndColumn()
    {
        $expr = $this->getFirstAnonymousClassInFunction(__METHOD__);
        $this->assertEquals(5, $expr->getEndColumn());
    }

    /**
     * testMagicSleepMethodReturnsExpectedSetOfPropertyNames
     *
     * @return void
     */
    public function testMagicSleepMethodReturnsExpectedSetOfPropertyNames()
    {
        $class = new ASTAnonymousClass(__CLASS__);
        $class->setCache(new MemoryCacheDriver());

        $this->assertEquals(
            array(
                'metadata',
                'constants',
                'interfaceReferences',
                'parentClassReference',
                'cache',
                'context',
                'comment',
                'endLine',
                'modifiers',
                'name',
                'nodes',
                'namespaceName',
                'startLine',
                'userDefined',
                'id'
            ),
            $class->__sleep()
        );
    }

    /**
     * @return \PDepend\Source\AST\ASTAnonymousClass
     */
    private function getFirstAnonymousClassInFunction()
    {
        return $this->getFirstFunctionForTestCase()
            ->getFirstChildOfType('PDepend\\Source\\AST\\ASTAnonymousClass');
    }
}
