// TODO: Minifikować wszystkie JS-y
$(document).ready(function() {
  // ustawianie aktywnej opcji w navbarze
  const url = window.location;
  const ind = url.pathname.indexOf('/default/index') > -1 ? url.pathname.indexOf('/default/index') : url.pathname.length;
  const pathname = url.pathname.substring(0, ind);
  $('ul.navbar-nav a[href="' + pathname + '"]')
    .parent()
    .addClass('active');
  $('ul.navbar-nav a')
    .filter(function() {
      return this.href == pathname;
    })
    .parent()
    .addClass('active');
    
  $('div.alert.fade').addClass('show');
});

const clearFormErrors = function(form) {
  form.find('.has-error').removeClass('has-error');
  form.find('.help-block').html('');
};

const updateFormErrors = function(form, errors) {
  Object.keys(errors).forEach(function(inputId) {
    const formGroup = form.find('.field-' + inputId);
    formGroup.addClass('has-error');

    for (let i = 0; i < errors[inputId].length; ++i) {
      let helpBlock = formGroup.find('.help-block');
      let currentMessages = helpBlock.html();
      if (currentMessages) {
        currentMessages = currentMessages.concat('<br/>');
      }
      if(!currentMessages.includes(errors[inputId][i])) {
        currentMessages = currentMessages.concat(errors[inputId][i]);
      }
      helpBlock.html(currentMessages);
    }
  });
};
