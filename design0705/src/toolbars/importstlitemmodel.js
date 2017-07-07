define([
    'calculations',
    'selection',
    'geomnode',
    'modelviews/vertexMV',
    'modelviews/currentworkplane',
    'geometrygraphsingleton',
    'icons',
    'toolbars/toolbar',
    'toolbars/geomtoolbar',
    './parsestl',
    'asyncAPI',
  ], function(
    Calc,
    selection,
    GeomNode,
    VertexMV,
    currentWorkplane,
    geometryGraph,
    icons,
    toolbar,
    geomtoolbar,
    parseSTL,
    AsyncAPI) {

    function uploadFile(input, successFn) {
      if (!window.FileReader) {
        alert('No FileReader support yet in this browser. Please try Google Chrome or Firefox');
        return;
      }
      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(file) {
        return function(e) {
          if (e.target.readyState === 2) {
            input.value = "";
            successFn(e.target.result, file);
          }
        };
      })(input.files[0]);

      // Read in the file as a data URL.
      reader.readAsBinaryString(input.files[0]);
    }

    function ensureString(buf) {
      if (typeof buf !== "string") {
        var array_buffer = new Uint8Array(buf);
        var str = '';
        for(var i = 0; i < buf.byteLength; i++) {
          str += String.fromCharCode(array_buffer[i]); // implicitly assumes little-endian
        }
        return str;
      } else {
        return buf;
      }
    }

    $('#stl-file-select-input').change(function() {
      uploadFile(this, function(contents, file) {

        var name;
        try {
          name = file.name.replace(/\.stl/g, '');
          GeomNode.validateIdOrName(name);
        } catch(e) {
          name = undefined;
        }
        var stl = ensureString(contents);
        var stlVertex = new GeomNode.STL({
          name: name,
          proto: true,
          editing: true,
          parameters: {stl: stl},
          workplane: Calc.copyObj(currentWorkplane.get().vertex.workplane),
        });
        geometryGraph.add(stlVertex);
        var result = AsyncAPI.tryCommitCreate([stlVertex]);
        if (!result.error) {
          var committedVertices = result.newVertices;
          VertexMV.eventProxy.trigger('committedCreate', [stlVertex], committedVertices);
        }
      });
    });

    var Model = toolbar.ItemModel.extend({

      name: '导入',

      activate: function() {
        // toolbar.ItemModel.prototype.activate.call(this);
        $('#stl-file-select-input').click();
        geomtoolbar.setToSelect();
      },

      icon: icons.stl_in,

      createAnother: function() {
        return false;
      }

    });

    return Model;

  });
