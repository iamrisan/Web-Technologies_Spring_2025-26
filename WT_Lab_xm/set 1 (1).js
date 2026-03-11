console.log("Global Tech Connect Registration Loaded");

var registrants = [];

function checkName() {
    var fullName = document.getElementById("FullName").value.trim();

    if (fullName.length < 6 || fullName.length > 100) {
        document.getElementById("NameErr").innerHTML = "Name must be between 6 and 100 characters.";
        return false;
    } else {
        document.getElementById("NameErr").innerHTML = "";
        return true;
    }
}

function checkEmail() {
    var email = document.getElementById("Email").value.trim();
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        document.getElementById("EmailErr").innerHTML = "Please enter a valid professional email address.";
        return false;
    } else {
        document.getElementById("EmailErr").innerHTML = "";
        return true;
    }
}

function checkCompany() {
    var company = document.getElementById("Company").value.trim();

    if (company.length > 100) {
        document.getElementById("CompanyErr").innerHTML = "Maximum 100 characters allowed.";
        return false;
    } else {
        document.getElementById("CompanyErr").innerHTML = "";
        return true;
    }
}

function checkAttendance() {
    var attendanceOptions = document.getElementsByName("Attendance");
    var selected = false;

    for (var i = 0; i < attendanceOptions.length; i++) {
        if (attendanceOptions[i].checked) {
            selected = true;
            break;
        }
    }

    if (!selected) {
        document.getElementById("AttendanceErr").innerHTML = "Please select your attendance type.";
        return false;
    } else {
        document.getElementById("AttendanceErr").innerHTML = "";
        return true;
    }
}

function getAttendanceType() {
    var attendanceOptions = document.getElementsByName("Attendance");

    for (var i = 0; i < attendanceOptions.length; i++) {
        if (attendanceOptions[i].checked) {
            return attendanceOptions[i].value;
        }
    }

    return "";
}

function collectData() {
    var isNameValid = checkName();
    var isEmailValid = checkEmail();
    var isCompanyValid = checkCompany();
    var isAttendanceValid = checkAttendance();

    if (!isNameValid || !isEmailValid || !isCompanyValid || !isAttendanceValid) {
        return false;
    }

    var fullName = document.getElementById("FullName").value.trim();
    var email = document.getElementById("Email").value.trim();
    var company = document.getElementById("Company").value.trim();
    var attendanceType = getAttendanceType();

    var registrant = {
        fullName: fullName,
        email: email,
        company: company,
        attendanceType: attendanceType
    };

    registrants.push(registrant);

    updateAnalytics();

    alert("Registration submitted successfully!");

    document.getElementById("FullName").value = "";
    document.getElementById("Email").value = "";
    document.getElementById("Company").value = "";

    var attendanceOptions = document.getElementsByName("Attendance");
    for (var i = 0; i < attendanceOptions.length; i++) {
        attendanceOptions[i].checked = false;
    }

    document.getElementById("NameErr").innerHTML = "";
    document.getElementById("EmailErr").innerHTML = "";
    document.getElementById("CompanyErr").innerHTML = "";
    document.getElementById("AttendanceErr").innerHTML = "";

    return false;
}

function updateAnalytics() {
    var total = registrants.length;
    var virtual = 0;
    var inPerson = 0;

    for (var i = 0; i < registrants.length; i++) {
        if (registrants[i].attendanceType === "Virtual") {
            virtual++;
        } else if (registrants[i].attendanceType === "In-Person") {
            inPerson++;
        }
    }

    document.getElementById("totalRegistrants").innerHTML = total;
    document.getElementById("virtualCount").innerHTML = virtual;
    document.getElementById("inPersonCount").innerHTML = inPerson;
}

function toggleAnalytics() {
    var panel = document.getElementById("analyticsPanel");
    var button = document.getElementById("toggleBtn");

    if (panel.style.display === "none" || panel.style.display === "") {
        panel.style.display = "block";
        button.innerHTML = "Hide Event Analytics";
    } else {
        panel.style.display = "none";
        button.innerHTML = "Show Event Analytics";
    }
}