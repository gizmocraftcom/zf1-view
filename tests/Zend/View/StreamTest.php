<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_View
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */
use PHPUnit\Framework\Attributes\Group;

/**
 * Tests for Zend_View_Stream (short tag conversion through include).
 *
 * @category   Zend
 * @package    Zend_View
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
#[Group('Zend_View')]
class Zend_View_StreamTest extends PHPUnit\Framework\TestCase
{
    /**
     * The converted markup (`<?php echo `) is longer than the file on disk, so
     * PHP must be told the converted size or it truncates the script.
     */
    public function testShortTagsAreConvertedWhenIncludedThroughStreamWrapper()
    {
        $view        = new Zend_View(array('useStreamWrapper' => true, 'scriptPath' => __DIR__ . '/_templates'));
        $view->value = '<b>';

        $this->assertSame('short|&lt;b&gt;|<b>', $view->render('testShortTags.phtml'));
    }
}
