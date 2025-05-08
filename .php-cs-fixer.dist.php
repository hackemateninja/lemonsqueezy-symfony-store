<?php
	
	$finder = (new PhpCsFixer\Finder())
		->in(__DIR__)
		->exclude('var')
	;
	
	return (new PhpCsFixer\Config())
		->setRules([
			'@Symfony' => true,
			'indentation_type' => true
		])
		->setIndent("\t")
		->setFinder($finder)
		;