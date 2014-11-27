<?php
// source: /var/www/html/stajeUpetruvky/app/FrontModule/templates/Galerie/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5883682954', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb6890a420c4_content')) { function _lb6890a420c4_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if ($images->count() == 0) { ?><div>
    nejsou nahrany zadne obrazky
    

</div>
<?php } ?>
<div>
    
<?php $iterations = 0; foreach ($images as $image) { ?>    <ul>
        <li><img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ;echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($image->cesta_k_souboru), ENT_COMPAT) ?>" width="200px"></li>
    </ul>
<?php $iterations++; } ?>

</div>

<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 