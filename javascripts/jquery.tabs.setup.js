//Init tabs for profile pages
var tabs,
  overview = 'Overview';
  linkSelector = '#tabs ul:first a',
  contentSelector = '#tabs div:first',
  currentSelector = function(value) {
      return 'a[href=#' + value + ']';
  };

if ($.address.value() == '') {
  $.address.value(overview);
}

// Address handler
$.address.init(function(event) {

  // Adds the ID in a lazy manner to prevent scrolling
  $(contentSelector).attr('id', overview);
  
  // Tabs setup
  tabs = $('#tabs')
      .tabs({
          // Content filter
          load: function(event, ui) {
              $(ui.panel).html($(contentSelector, ui.panel).html());
          },
          selected: $(linkSelector).index($(currentSelector(event.value))),
          fx: { opacity: 'toggle' }
      })
      .css('display', 'block');

  // Enables the plugin for all the tab links
  $(linkSelector).address();

}).change(function(event) {

  // Sets the page title
  $.address.title($.address.title().split(' | ')[0] + ' | ' + 
          $(currentSelector(event.value)).text());

}).externalChange(function(event) {

  // Select the proper tab
  tabs.tabs('select', $(currentSelector(event.value)).attr('href'));
  
}).history(true);

// Hides the tabs during initialization
document.write('<style type="text/css"> #tabs { display: none; } </style>');

