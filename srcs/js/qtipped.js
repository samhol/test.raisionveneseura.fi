console.log("qtip");

$('[data-qtip-url]').each(function () {
  console.log($(this).attr('data-qtip-url'));
  $(this).next('div').removeAttr("style");
  $(this).qtip({
    content: $(this).next('div'),
    position: {
      my: 'bottom center', // Position my top left...
      at: 'top center', // at the bottom right of...
      target: $(this) // my target
    },
    show: {
        target: false, // Defaults to target element
        event: 'click', // Show on mouse over by default
        effect: true, // Use default 90ms fade effect
        delay: 90, // 90ms delay before showing
        solo: false, // Do not hide others when showing
        ready: false, // Do not show immediately
        modal: { // Requires Modal plugin
            on: false, // No modal backdrop by default
            effect: true, // Mimic show effect on backdrop
            blur: true, // Hide tooltip by clicking backdrop
            escape: true // Hide tooltip when Esc pressed
        }
    },
    hide: {
        target: false, // Defaults to target element
        event: 'click', // Hide on mouse out by default
        effect: true, // Use default 90ms fade effect
        delay: 0, // No hide delay by default
        fixed: false, // Non-hoverable by default
        inactive: false, // Do not hide when inactive
        leave: 'window', // Hide when we leave the window
        distance: false // Don't hide after a set distance
    },
  });
});