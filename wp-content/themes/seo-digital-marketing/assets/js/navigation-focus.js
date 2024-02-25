var seo_digital_marketing_Keyboard_loop = function (elem) {
  var seo_digital_marketing_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var seo_digital_marketing_firstTabbable = seo_digital_marketing_tabbable.first();
  var seo_digital_marketing_lastTabbable = seo_digital_marketing_tabbable.last();
  seo_digital_marketing_firstTabbable.focus();

  seo_digital_marketing_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      seo_digital_marketing_firstTabbable.focus();
    }
  });

  seo_digital_marketing_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      seo_digital_marketing_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};