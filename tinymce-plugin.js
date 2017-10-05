tinymce.PluginManager.add('jdoodle', function(editor, url) {
  // Add a button that opens a window
  editor.addButton('JDoodle', {
    text: 'JDoodle',
    icon: false,
    onclick: function() {
      // Open window
      editor.windowManager.open({
        title: editor.getLang('jdoodle.editor_caption'),
        body: [
          {type: 'textbox', name: 'url', label: editor.getLang('jdoodle.share_url'), minWidth: 400},
          {type: 'textbox', name: 'caption', label: editor.getLang('jdoodle.caption')}
        ],
        onsubmit: function(e) {
          if(e.data.url.trim() == "") {
              editor.windowManager.alert(editor.getLang('jdoodle.fill_in_url'));
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
