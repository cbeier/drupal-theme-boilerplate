<?php

/**
 * Implements template_preprocess_html().
 */
function drupal_theme_boilerplate_preprocess_html(&$vars) {
  // Unfortunately, the XHTML+RFDa 1.0 doctype is hardcoded. We don't want an
  // XHTML doctype and the RDFa version is old. The following code changes it
  // to HTML+RDFa 1.1 when the RDF module is enabled, and a plain jane HTML5
  // doctype when it's not. To learn more about theming with RDFa and Drupal 7
  // see http://lin-clark.com/blog/theming-html5-and-rdfa-drupal-7
  if (module_exists('rdf')) {
    $vars['doctype'] = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML+RDFa 1.1//EN">' . "\n";
    $vars['rdf_profile'] = ' profile="' . $vars['grddl_profile'] . '"';
  }
  else {
    $vars['doctype'] = '<!DOCTYPE html>' . "\n";
    $vars['rdf_profile'] = '';
  }

  // Add externally hosted files. This will not work if entered in .info file.
  // Setting the group to CSS_THEME will load these files in the "theme group"
  // which load after system and module CSS files. This is not terribly
  // important in this case, but we do need to specify "external" as TRUE.
  // Ideally that wouldn't be necessary it would "just work" like
  // drupal_add_js(). See http://drupal.org/node/953340 to help make it happen.

  // drupal_add_css('http://fonts.googleapis.com/css?family=Abel', array(
  //   'external' => TRUE,
  //   'group' => CSS_THEME,
  //   )
  // );


  // Add the regular theme stylesheets.
  // This is done here as opposed to using the .info file so that we can control
  // the order. Since we cannot add the external CSS files via .info and we need
  // those to load first, we add them all here.

  // drupal_add_css($vars['path'] . '/PATH', array('group' => CSS_THEME));

  drupal_add_css($vars['path'] . '/stylesheets/app.css', array('group' => CSS_THEME));
  drupal_add_css($vars['path'] . '/stylesheets/print.css', array(
    'group' => CSS_THEME,
    'media' => 'print',
    'preprocess' => FALSE,
    )
  );
  drupal_add_css($vars['path'] . '/stylesheets/ie_patch.css', array(
    'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE),
    'group' => CSS_THEME,
    'preprocess' => FALSE,
    )
  );

  // Add custom javascript
  // drupal_add_js($vars['path'] . '/PATH');
  drupal_add_js($vars['path'] . '/javascripts/app.js');

}

/**
 * Implements template_preprocess().
 */
function drupal_theme_boilerplate_preprocess(&$vars) {
  // Create a variable containing the path to the theme.
  $vars['path'] = drupal_get_path('theme', 'drupal_theme_boilerplate');
}