<?php
/**
  * This template was copied into the theme from modules/system/html.tpl.php in
  * order to override it.
  *
  * @see http://api.drupal.org/api/drupal/modules--system--html.tpl.php/7
  * @see template_preprocess_html().
  * @see template_process()
  *
  * Customizations:
  * - In a preprocess function called template_process_html() in template.php
  *   (see code above) we created:
  *     - The variable $doctype, which we use below in order to use the
  *       HTML5+RDFa 1.1 doctype when the RDF module is enabled, and the plain
  *       HTML5 doctype when the RDF module is disabled.
  *     - A $path variable containing the fill path to the theme this file lives
  *       in was created.
  * - Add the HTML5 Shiv for IE versions prior to 9.
  * - Integrate the skip links.
  */
?>
<?php print $doctype; ?>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head<?php print $rdf_profile; ?>>
  <?php print $head; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes; ?>>
  <ul id="skiplinks">
    <li><a href="#navigation" class="skip"><?php print t('Skip to navigation (Press Enter).') ?></a></li>
    <li><a href="#main-content" class="skip"><?php print t('Skip to main content (Press Enter).') ?></a></li>
  </ul>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>