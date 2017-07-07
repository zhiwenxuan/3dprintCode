define([
    'geomnode',
    'icons',
    'toolbars/booleanitemmodel',
  ], function(
    GeomNode,
    icons,
    BooleanItemModel) {

    var Model = BooleanItemModel.extend({

      name: '镂空',
      VertexConstructor: GeomNode.Subtract,
      icon: icons['subtract'],
      maxNumberOfChildren: 2,

    });

    return Model;

  });
