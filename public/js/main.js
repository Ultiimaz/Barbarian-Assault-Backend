var clipboard = new ClipboardJS('.btn');

clipboard.on('success', function(e) {
  
    e.clearSelection();
});

clipboard.on('error', function(e) {
});
