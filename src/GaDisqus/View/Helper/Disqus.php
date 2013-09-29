<?php 
namespace GaDisqus\View\Helper;
use Zend\Form\View\Helper\AbstractHelper;

class Disqus 
	extends AbstractHelper
{
	protected $shortName = null;
	protected $identifier = null;
	protected $title = null;
	protected $url = null;
	protected $categoryId = null;
	
	public function __invoke(
			$shortName = null,
			$identifier = null, 
			$title = null,
			$url = null, 
			$categoryId = null
		)
	{
		$varJs = array();
		if(!empty($shortName)){
			$varJs[] = "var disqus_shortname = '{$shortName}';";
		} elseif (empty($shortName) && !empty($this->shortName)){
			$varJs[] = "var disqus_shortname = '{$this->shortName}';";
		} else {
            throw new \Exception('ShortName is required!');
        }
		
		if(!empty($identifier)){
			$varJs[] = "var disqus_identifier = '{$identifier}';";
		} elseif (empty($identifier) && !empty($this->identifier)){
			$varJs[] = "var disqus_identifier = '{$identifier}';";
		}
		
		if(!empty($title)){
			$varJs[] = "var disqus_title = '{$title}';";
		} elseif (empty($title) && !empty($this->title)){
			$varJs[] = "var disqus_title = '{$this->title}';";
		}
		
		if(!empty($url)){
			$varJs[] = "var disqus_url = '{$url}';";
		} elseif (empty($url) && !empty($this->url)){
			$varJs[] = "var disqus_url = '{$this->url}';";
		}
		
		if(!empty($categoryId)){
			$varJs[] = "var disqus_category_id = '{$categoryId}';";
		} elseif (empty($categoryId) && !empty($this->categoryId)){
			$varJs[] = "var disqus_category_id = '{$this->categoryId}';";
		}
		
		$add = implode($varJs, "\n\r");
		return "
			<div id=\"disqus_thread\"></div>
			    <script type=\"text/javascript\">
					{$add}
			        (function() {
			            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			        })();
			    </script>
		    <noscript>Please enable JavaScript to view the <a href=\"http://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>
		    <a href=\"http://disqus.com\" class=\"dsq-brlink\">comments powered by <span class=\"logo-disqus\">Disqus</span></a>
		";
	}

	public function setOptions(array $conf)
	{
		foreach($conf as $property => $val){
			//FIXME: is a good practice? You can ovverride inheritance properties
			$this->$property = $val;
		}
		return $this;
	}
}