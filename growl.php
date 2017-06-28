<?php
$q = "{query}";
if($q == 'open http://products.wolframalpha.com/api/'){
	`$q`;
	return;
}
require_once('workflows.php');
$w = new Workflows(/*'tylereich.wolframalpha'*/);
//$w = new Workflows();
$xml_string = $w->read($w->cache().'/wolfram.xml');
$xml = simplexml_load_string($xml_string);
$output = array();
foreach ($xml->pod as $pod) {
	$title = "• ".$pod['title'];
	$content = $pod->subpod->plaintext;
	//$item = "$title: $content";
	array_push($output, "$title: $content");
}
$output_string = implode("\n",$output);
echo $output_string;
?>