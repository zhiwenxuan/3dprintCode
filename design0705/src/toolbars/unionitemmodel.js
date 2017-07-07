define([
    'geomnode',
    'icons',
    'toolbars/booleanitemmodel',
  ], function(
    GeomNode,
    icons,
    BooleanItemModel) {

    var Model = BooleanItemModel.extend({

      name: '合并',
      VertexConstructor: GeomNode.Union,
      icon: icons['union'],

    });

    return Model;

  });
