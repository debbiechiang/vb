const stickyHeader = document.querySelector('.sticky-header');
const heroModule = document.querySelector('.hero');

addScrollTriggerTarget({
  el: heroModule,
  onscreen: function() { stickyHeader.classList.remove('opaque')},
  offscreen: function() { stickyHeader.classList.add('opaque')}
})

const blogContentImages = document.querySelectorAll('.blog-content p img');

if (blogContentImages) {
  Array.prototype.forEach.call(blogContentImages, function (item) {
    item.parentNode.classList.add('full-width');
  });
} 