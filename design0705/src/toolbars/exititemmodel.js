define([
    'toolbars/toolbar',
    'icons',
  ],
  function(
    Toolbar,
    icons
  ) {

    var Model = Toolbar.ItemModel.extend({

      name: '我的设计',

      initialize: function() {
        Toolbar.ItemModel.prototype.initialize.call(this);
      },

      click: function() {
        window.location = '/ui/' + Shapesmith.user + '/designs';
      },

      icon: icons.list,

    });

    return Model;

  });
