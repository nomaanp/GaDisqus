<?php
return array(
    'view_helpers' => array(
        'invokables' => array(
            'disqus' => 'GaDisqus\View\Helper\Disqus'
        ),
        'factories' => array(
            'disqusFactory' => 'GaDisqus\View\Helper\Service\DisqusFactory'
        ),
    )
);