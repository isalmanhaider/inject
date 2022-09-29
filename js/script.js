(function (Drupal, drupalSettings, once) {
  Drupal.behaviors.injectBehaviour = {
    attach: function (context, settings) {
      once('injectBehaviour', 'html', context).forEach( function (element) {
        console.log("Hello World");
      })
    }
  }
} (Drupal, drupalSettings, once));