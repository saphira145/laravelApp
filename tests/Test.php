<?php class Foo {

    function Bar()
    {
        return 2;
    }
    function barr() {
        return 1;
    }
}
//use Illuminate\Cache\CacheManager;
class Test extends TestCase 
{

    public function setUp() {
        $this->_foo = $this->getMockBuilder('Foo')
            ->disableOriginalConstructor()
            ->getMock();
    
//        $this->_foo->expects($this->any())
//            ->method('ba')
//            ->will($this->returnValue('bar'));

//        var_dump($this->_foo->Bar());
    }

    function tearDown() {

    }

    function testTest(){}



}