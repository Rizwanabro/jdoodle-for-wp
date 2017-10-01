tinymce.PluginManager.add('jdoodle', function(editor, url) {
  // Add a button that opens a window
  editor.addButton('JDoodle', {
    text: 'JDoodle',
    icon: false,
    onclick: function() {
      // Open window
      editor.windowManager.open({
        title: 'Embed Code Snippet from JDoodle site',
        body: [
          {type: 'textbox', name: 'url', label: 'Shared URL', minWidth: 400},
          {type: 'textbox', name: 'caption', label: 'Caption'}
        ],
        onsubmit: function(e) {
          if(e.data.url.trim() == "") {
              editor.windowManager.alert("Fill in please the Shared URL of your source code.");
              e.preventDefault();
              return;
          }
          let shortcode = "[jdoodle url='" + e.data.url + "'";
          if(e.data.caption.trim() != "") {
              shortcode += " caption='" + e.data.caption + "'";
          }
          shortcode += "]";

          // Insert content when the window form is submitted
          editor.insertContent(shortcode); 
        }
      });
    }
  });

  return {
    getMetadata: function () {
      return  {
        title: "JDoodle",
        url: "https://github.com/evonox/jdoodle-for-wp"
      };
    }
  };
});
