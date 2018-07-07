const stickyHeader = document.querySelector('.sticky-header');
const heroModule = document.querySelector('.hero');

addScrollTriggerTarget({
  el: heroModule,
  onscreen: function() { stickyHeader.classList.remove('opaque')},
  offscreen: function() { stickyHeader.classList.add('opaque')}
})