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

(function($) {
var $content = $('.ajax_posts');
var $loader = $('#more_posts');
var cat = $loader.data('category');
var ppp = 6;
var offset = $('.tile-container').find('.tile').length;
 
$loader.on( 'click', load_ajax_posts );
 
function load_ajax_posts() {
  if (!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))) {
    $.ajax({
      type: 'POST',
      dataType: 'html',
      url: screenReaderText.ajaxurl,
      data: {
        'cat': cat,
        'ppp': ppp,
        'offset': offset,
        'action': 'mytheme_more_post_ajax'
      },
      beforeSend : function () {
        $loader.addClass('post_loading_loader').html('');
      },
      success: function (data) {
        var $data = $(data);
        if ($data.length) {
        console.log($data);
          var $newElements = $data.css({ opacity: 0 });
          $content.append($newElements);
          $newElements.animate({ opacity: 1 });
          $loader.removeClass('post_loading_loader').html(screenReaderText.loadmore);
        } else {
          $loader.removeClass('post_loading_loader').addClass('post_no_more_posts').html(screenReaderText.noposts);
        }
      },
      error : function (jqXHR, textStatus, errorThrown) {
        $loader.html($.parseJSON(jqXHR.responseText) + ' :: ' + textStatus + ' :: ' + errorThrown);
        console.log(jqXHR);
      },
    });
  }
  offset += ppp;
  return false;
}
})(jQuery);