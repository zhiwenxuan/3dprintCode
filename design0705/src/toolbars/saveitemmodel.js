define([
    'toolbars/toolbar',
    'icons',
    'scene',
  ],
  function(
    Toolbar,
    icons,
    sceneModel) {

    var Model = Toolbar.ItemModel.extend({

      name: '保存',

      initialize: function() {

        Toolbar.ItemModel.prototype.initialize.call(this);
      },

      click: function() {

        // sceneModel.view.renderer.autoClear = false;
        sceneModel.view.updateScene = true;
        sceneModel.view.render();
        var screenshot = sceneModel.view.renderer.domElement.toDataURL();

        var commit = $.getQueryParam("commit");
        $.ajax({
          type: 'PUT',
          url: '/api/' + Shapesmith.user + '/design/' + Shapesmith.design + '/refs/heads/master/',
          contentType: 'application/json',
          data: JSON.stringify({commit: commit, screenshot: screenshot}),
          success: function() {
            console.info('SAVE: ' + commit);
            // hintView.set('Saved.');
            setTimeout(function() {
              // hintView.clear();
            }, 1000);
          },
          error: function() {
            console.error('could not save');
          }
        });
      },

      icon: icons.save,

    });

    return Model;

  });
