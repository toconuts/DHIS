/* 
 * latlng_clinic
 * Latitude and Longitude of clinic
 */

function getClinicLatLng(id)
{
  var path = null;
  switch (id) {
    // MARIGOT
    case 1001:
      path = new google.maps.LatLng(15.53701933, -61.28219547);
      break;
    case 1002:
      path = new google.maps.LatLng(15.51598403, -61.26460983);
      break;
    case 1003:
      path = new google.maps.LatLng(15.56460674, -61.31135115);
      break;
    case 1004:
      path = new google.maps.LatLng(15.58304827, -61.3293559);
      break;
    case 1005:
      path = new google.maps.LatLng(15.59111366, -61.34804006);
      break;

    // GRAND BAY
    case 2001:
      path = new google.maps.LatLng(15.24196987, -61.32035055);
      break;
    case 2002:
      path = new google.maps.LatLng(15.25559501, -61.26921777);
      break;
    case 2003:
      path = new google.maps.LatLng(15.24849842, -61.28476042);
      break;
    case 2004:
      path = new google.maps.LatLng(15.26471939, -61.32625785);
      break;
    case 2005:
      path = new google.maps.LatLng(15.23604308, -61.33399811);
      break;
    
    // ST JOSEPH
    case 3001:
      path = new google.maps.LatLng(15.40627748, -61.423991);
      break;
    case 3002:
      path = new google.maps.LatLng(15.44049945, -61.43650503);
      break;
    case 3003:
      path = new google.maps.LatLng(15.46096662, -61.45083462);
      break;
    case 3004:
      path = new google.maps.LatLng(15.48574526, -61.46181996);
      break;
    case 3005:
      path = new google.maps.LatLng(15.42277456, -61.33956925);
      break;
    
    // LA PLAINE
    case 4001:
      path = new google.maps.LatLng(15.32920411, -61.25012254);
      break;
    case 4002:
      path = new google.maps.LatLng(15.35922217, -61.25829761);
      break;
    case 4003:
      path = new google.maps.LatLng(15.36160291, -61.27542095);
      break;
    case 4004:
      path = new google.maps.LatLng(15.3083528, -61.25072534);
      break;
    case 4005:
      path = new google.maps.LatLng(15.2878991, -61.26306341);
      break;

    // CASTLE BRUCE
    case 5001:
      path = new google.maps.LatLng(15.44351541, -61.25750841);
      break;
    case 5002:
      path = new google.maps.LatLng(15.40339147, -61.25507587);
      break;
    case 5003:
      path = new google.maps.LatLng(15.39167751, -61.25691736);
      break;
    case 5004:
      path = new google.maps.LatLng(15.49456635, -61.25756247);
      break;
    case 5005:
      path = new google.maps.LatLng(15.483129, -61.256733);
      break;

    // PORTSMOUTH
    case 6001:
      path = new google.maps.LatLng(15.57696375, -61.45658436);
      break;
    case 6002:
      path = new google.maps.LatLng(15.62359643, -61.46319875);
      break;
    case 6003:
      path = new google.maps.LatLng(15.5841567, -61.41141293);
      break;
    case 6004:
      path = new google.maps.LatLng(15.59270348, -61.38330889);
      break;
    case 6005:
      path = new google.maps.LatLng(15.59982767, -61.39703497);
      break;
    case 6006:
      path = new google.maps.LatLng(15.6131813, -61.40965978);
      break;
    case 6007:
      path = new google.maps.LatLng(15.62790233, -61.41861411);
      break;
    case 6008:
      path = new google.maps.LatLng(15.51579327, -61.468988);
      break;
    
    // ROSEAU CENTRAL
    case 7101:
      path = new google.maps.LatLng(15.29893987, -61.38512604);
      break;
      
    // ROSEAU NORTH
    case 7201:
      path = new google.maps.LatLng(15.3053534, -61.38581082);
      break;
    case 7202:
      path = new google.maps.LatLng(15.31497567, -61.38645848);
      break;
    case 7203:
      path = new google.maps.LatLng(15.34765237, -61.39180539);
      break;
    case 7204:
      path = new google.maps.LatLng(15.33670059, -61.36143204);
      break;
    case 7205:
      path = new google.maps.LatLng(15.36637315, -61.39665181);
      break;
    case 7206:
      path = new google.maps.LatLng(15.37576511, -61.37284586);
      break;
    case 7207:
      path = new google.maps.LatLng(15.39197897, -61.39396978);
      break;

    // ROSEAU SOUTH
    case 7301:
      path = new google.maps.LatLng(15.29264009, -61.38000715);
      break;
    case 7302:
      path = new google.maps.LatLng(15.26041338, -61.37499323);
      break;
    case 7303:
      path = new google.maps.LatLng(15.23293375, -61.36014688);
      break;
    case 7304:
      path = new google.maps.LatLng(15.21244568, -61.36575078);
      break;
    
    // ROSEAU VALLEY
    case 7401:
      path = new google.maps.LatLng(15.26624244, -61.34784833);
      break;
    case 7402:
      path = new google.maps.LatLng(15.28874466, -61.34805149);
      break;
    case 7403:
      path = new google.maps.LatLng(15.29654874, -61.36075752);
      break;
    case 7404:
      path = new google.maps.LatLng(15.31078289, -61.34767366);
      break;
    case 7405:
      path = new google.maps.LatLng(15.33455312, -61.33145136);
      break;
    case 7406:
      path = new google.maps.LatLng(15.31735592, -61.33944321);
      break;
    case 7407:
      path = new google.maps.LatLng(15.32298493, -61.3477002);
      break;
    
    // PMH
    case 8000:
      path = new google.maps.LatLng(15.308525, -61.386974);
      break;

    // ROSS
    case 9001:
      path = new google.maps.LatLng(15.5561986, -61.46035925);
      break;

  }
  
  return path;
}