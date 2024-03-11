import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
// alert('hola')
// ..
AOS.init({
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: true, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: true, // disables automatic mutations' detections (advanced)
  debounceDelay: 10, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 30, // the delay on throttle used while scrolling the page (advanced)
  offset: 150, // offset (in px) from the original trigger point
    once:true,
    mirror: true,
});

// You can also pass an optional settings object
// below listed default settings
