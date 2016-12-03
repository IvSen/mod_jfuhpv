<?php //defined('_JEXEC') or die;

// Application object
$app = JFactory::getApplication();
// Global document object
$doc = JFactory::getDocument();

$fontSizeList   = htmlspecialchars($params->get('fontSizeList'));

$js = <<<JS
<script type="text/javascript">
var 	uhe 	= 2,
	lng 	= 'ru',
	has 	= 0,
	imgs 	= 1,
	bg 	    = 1,
	hwidth 	= 1200,
	bgs 	= ['1','2','3'],
	fonts 	= [{$fontSizeList}];
$(document).ready(function(){uhpv(has)});
</script>
JS;

$doc->addCustomTag($js);


if (file_exists(JPATH_SITE . '/media/jfuhpv/js/jquery.uhpv-full-1.0.min.js')) {
    $doc->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
    $doc->addScript(JURI::base(TRUE) . '/media/jfuhpv/js/jquery.uhpv-full-1.0.min.js');
}

if (file_exists(JPATH_SITE . '/templates/' . $app->getTemplate() . '/css/jfuhpv.css')) {
    $doc->addStyleSheet(JURI::base(TRUE) . '/templates/' . $app->getTemplate() . '/css/jfuhpv.css');
} elseif (file_exists(JPATH_SITE . '/media/jfuhpv/css/jfuhpv.css')) {
    $doc->addStyleSheet(JURI::base(TRUE) . '/media/jfuhpv/css/jfuhpv.css');
}
// Render module output
require JModuleHelper::getLayoutPath('mod_jfuhpv');