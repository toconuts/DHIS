/* 
 * EPI Week Caledar
 */

function epiWeekCalc(date) {
  var checkDate = new Date(date.getTime());
  // Find Wednesday of this week starting on Sunday
  checkDate.setDate(checkDate.getDate() + 3 - (checkDate.getDay()));
  var time = checkDate.getTime();
  checkDate.setMonth(0); // Compare with Jan 1
  checkDate.setDate(1);
  return Math.floor(Math.round((time - checkDate) / 86400000) / 7) + 1;
}