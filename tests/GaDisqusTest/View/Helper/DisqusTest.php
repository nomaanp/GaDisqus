<?php
namespace GaDisqusTest\View\Helper;

use Zend\Http\Request;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use PHPUnit_Framework_TestCase;
use GaDisqus\View\Helper\Disqus;
 
class DisqusTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->viewHelper = new Disqus();
	}
	
	public function testInvokeShortLink()
	{
		$html = $this->viewHelper->__invoke('gianarb');
		$expected = "<div id=\"disqus_thread\"></div>
			    <script type=\"text/javascript\">
					var disqus_shortname = 'gianarb';
			        (function() {
			            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			        })();
			    </script>
		    <noscript>Please enable JavaScript to view the <a href=\"http://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>
		    <a href=\"http://disqus.com\" class=\"dsq-brlink\">comments powered by <span class=\"logo-disqus\">Disqus</span></a>";
		$this->assertEquals(trim($expected), trim($html));
	}
}