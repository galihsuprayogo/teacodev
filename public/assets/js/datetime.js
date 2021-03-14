function startTime() {
        var today = new Date();
        var year = today.getFullYear();
        var month = today.getMonth();
        // var months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
         var months = new Array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
        var d = today.getDate();
        var day = today.getDay();
        var days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        var result = months[month]+", "+days[day]+" "+ year + " " +h + ":" + m + ":" + s;
        // $('#tdate').val(result);
        document.getElementById('txt').innerHTML =result;
        var t = setTimeout(startTime, 500);

        }
        function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
        }
