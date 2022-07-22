function generateUUId() {
    function randomDigit() {
        if (crypto && crypto.getRandomValues) {
            var rands = new Uint8Array(1);
            crypto.getRandomValues(rands);
            return (rands[0] % 16).toString(16);
        } else {
            return ((Math.random() * 16) | 0).toString(16);
        }
    }
    var crypto = window.crypto || window.msCrypto;
    return 'xxxxxxxx-xxxx-4xxx-8xxx-xxxxxxxxxxxx'.replace(/x/g, randomDigit);
}
function checkBlank(box_id,error_id,message, value, id, checkValue) {
    if (value == checkValue) {
        $('#'+error_id).text(message);
        $("#"+box_id).addClass('has-error');
        $("#"+id).focus();
        return 1;
    } else {
        $('#'+error_id).text('');
        $("#"+box_id).removeClass('has-error');
        return 0;
    }
}

function encodeImagetoBase64(element, base64Id) {
    var File = element.files[0];
    var FR = new FileReader();
    FR.addEventListener("load", function() {
        $("#" + base64Id).val(FR.result);
    });
    FR.readAsDataURL(File);
}

function convertDateForAPI(Date) {
    if (!$.trim(Date)) {
        return Date
    } else {
        var dateAr = Date.split('/');
        if($.isNumeric(dateAr[2]) && $.isNumeric(dateAr[1]) && $.isNumeric(dateAr[0])) {
            return dateAr[2] + '-' + dateAr[1] + '-' + dateAr[0];
        } else {
            return "";
        }
        
    }
}

function daysBetweenDates(StartDate,EndDate) {
    var date1 = new Date(StartDate); 
    var date2 = new Date(EndDate); 
    var Difference_In_Time = date2.getTime() - date1.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    console.log("Total number of days between dates  <br>"+ date1 + "<br> and <br>" + date2 + " is:<br> " + Difference_In_Days);
    return Difference_In_Days;
}
$(document).on("keypress", ".amount", function (event) {
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) &&
        ((event.which < 48 || event.which > 57) &&
        (event.which != 0 && event.which != 8))) {
        event.preventDefault();
    }
    var text = $(this).val();
    if ((text.indexOf('.') != -1) &&
        (text.substring(text.indexOf('.')).length > 2) &&
        (event.which != 0 && event.which != 8) &&
        ($(this)[0].selectionStart >= text.length - 2)) {
        event.preventDefault();
    }
});

function tConvert (time) {
    // Check correct time format and split into components
    time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
    if (time.length > 1) { // If time format correct
      time = time.slice (1);  // Remove full string match value
      time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
      time[0] = +time[0] % 12 || 12; // Adjust hours
      if(time[0]<10) {
        time[0] = '0'+time[0];
      }
    }
    return time.join (''); // return adjusted time or original string
  }