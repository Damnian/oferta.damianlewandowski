  var day = 1000*60*60*24,
      hour = 1000*60*60,
      minute = 1000*60,
      second = 1000*1,
      milisecond = 1;
function timer () {

  var startDate = new Date (2017, 06, 01, 00, 00, 00);
  var currentDate = new Date();

  var difference = (currentDate.getTime() - startDate.getTime());

  var days = Math.floor(difference / day);
  difference = difference - (days * day);

  var hours = Math.floor(difference / hour);
  difference = difference - (hours * hour);

  var minutes = Math.floor(difference / minute);
  difference = difference - (minutes * minute);

  var seconds = Math.floor(difference / second);
  difference = difference - (seconds * second);

  document.getElementById('timer').innerHTML = days + ' dni, ' + hours + ' godzin, ' + minutes + ' minut i ' + seconds + ' sekund';

  setTimeout(function() {
    timer();
  }, 1000);
}
timer();
