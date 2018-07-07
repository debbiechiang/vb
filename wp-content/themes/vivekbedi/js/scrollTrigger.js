// Dispatch a custom event if the browser supports it
// window.dispatchEvent covers all modern browsers
// window.fireEvent adds old IE support (v6-10)
var dispatchCustomEvent = function(customEventName) {
  var evt = new CustomEvent(customEventName);
  if (window.dispatchEvent) { window.dispatchEvent(evt); }
  else if (window.fireEvent) { window.fireEvent(evt); }
  else { throw('this browser does not support custom events'); }
};

// Throttle an event to occur once per browser paint
var throttleEvent = function(eventToThrottle, newEvent) {
  var blockEvents = false;

  var dispatchThrottledEvent = function() {
    dispatchCustomEvent(newEvent);
    blockEvents = false;
  };

  var throttledEventListener = function() {
    if (blockEvents) { return; }
    blockEvents = true;
    window.requestAnimationFrame(dispatchThrottledEvent);
  };

  window.addEventListener(eventToThrottle, throttledEventListener);
};

// Emit a custom event to throttle scroll events
var emitThrottledScroll = function() {
  if (!window.emittingThrottledScroll) {
    throttleEvent('scroll', 'bbd-pdp-throttled-scroll');
    window.emittingThrottledScroll = true;
  }
};

// Emit a custom event to throttle resize events
var emitThrottledResize = function() {
  if (!window.emittingThrottledResize) {
    throttleEvent('resize', 'bbd-pdp-throttled-resize');
    window.emittingThrottledResize = true;
  }
};

/* Add a scroll triggered target, which will execute onscreen and offscreen methods
/  A node is considered on screen if its top is above the starting boundary, and
/  its bottom is below the ending boundary
/
/  Configs on the props param object:
/    el - the dom node
/    onscreen - the method invoked when the target node comes on screen
/    offscreen - the method invoked when the target node leaves the screen
/    start - upper bound of the scroll region, as a percent of viewport height from 0-1. default 1
/    end - lower bound of the scroll region, as a percent of viewport height from 0-1. default 0
*/
var addScrollTriggerTarget = function(props) {
  var el = props.el;
  var onscreen = typeof props.onscreen === 'function' ? props.onscreen : false;
  var offscreen = typeof props.offscreen === 'function' ? props.offscreen : false;
  var start = props.start !== undefined ? props.start : 1;
  var end = props.end !== undefined ? props.end : 0;
  var targetAreaStart = 0;
  var targetAreaEnd = 0;
  var scrollState = '';

  // Calculate the upper and lowers bounds given the viewport height
  var updateScrollPosition = function() {
    targetAreaStart = window.innerHeight * start;
    targetAreaEnd = window.innerHeight * end;
  };

  // Check the current position against the targetAreaStart and End, and invoke
  // the onscreen or offscreen method if appropriate
  var checkScrollPosition = function() {
    var elPosition = el.getBoundingClientRect();

    if (elPosition.top < targetAreaStart && elPosition.bottom > targetAreaEnd) {
      if (onscreen && scrollState !== 'onscreen') {
        onscreen();
        scrollState = 'onscreen';
      }
    } else if (offscreen && scrollState !== 'offscreen') {
      offscreen();
      scrollState = 'offscreen';
    }
  };

  // On resize recalculate upper and lower bounds then check the scroll position
  var handleResize = function() {
    updateScrollPosition();
    checkScrollPosition();
  };

  // On scroll check the scroll position
  var handleScroll = function() {
    checkScrollPosition();
  };

  // Add event listeners and update with initial position
  window.addEventListener('bbd-pdp-throttled-resize', handleResize);
  window.addEventListener('bbd-pdp-throttled-scroll', handleScroll);
  window.requestAnimationFrame(handleResize);
};

// Begin emitting custom throttled events
emitThrottledScroll();
emitThrottledResize();
