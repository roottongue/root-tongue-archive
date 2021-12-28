// fullpage customization

new fullpage('#fullpage', {
  sectionSelector: '.vertical-scrolling',
  navigation: true,
  slidesNavigation: false,
  controlArrows: false,
  anchors: ['firstSection', 'secondSection', 'thirdSection', 'fourthSection'],
  keyboardScrolling: false,
  scrollOverflow: false,
  verticalCentered: false,
});

fullpage_api.setAllowScrolling(false);
