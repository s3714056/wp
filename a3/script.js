/* jslint node: true */
/* jshint browser: true */
/* Insert your javascript here */
'use strict';
let ul = document.getElementById('mainNavBar'),
    navItems = ul.children,
    aboutUs = document.getElementById('AboutUs'),
    prices = document.getElementById('prices'),
    showing = document.getElementById('showing'),
    moviePanelACT = document.getElementById('moviePanelACT'),
    moviePanelAHF = document.getElementById('moviePanelAHF'),
    moviePanelANM = document.getElementById('moviePanelANM'),
    moviePanelRMC = document.getElementById('moviePanelRMC'),
    synopsisACT = document.getElementById('synopsisACT'),
    synopsisAHF = document.getElementById('synopsisAHF'),
    synopsisANM = document.getElementById('synopsisANM'),
    synopsisRMC = document.getElementById('synopsisRMC'),
    bookingACT = document.getElementById('bookingACT'),
    bookingAHF = document.getElementById('bookingAHF'),
    bookingANM = document.getElementById('bookingANM'),
    bookingRMC = document.getElementById('bookingRMC'),
    seatsSTA = document.getElementById('seats-STA'),
    seatsSTP = document.getElementById('seats-STP'),
    seatsSTC = document.getElementById('seats-STC'),
    seatsFCA = document.getElementById('seats-FCA'),
    seatsFCP = document.getElementById('seats-FCP'),
    seatsFCC = document.getElementById('seats-FCC'),
    form = document.getElementById('form'),
    custName = document.getElementById('cust-name'),
    custMobile = document.getElementById('cust-mobile'),
    custCard = document.getElementById('cust-card'),
    custExpiry = document.getElementById('cust-expiry'),
    total = document.getElementById('total'),
    form_title_text = '',
    form_day_text = '',
    form_time_text = '',
    canRun = true,
    sum = 0,
    save = [],
    dayMap = {
        'Monday': 'MON',
        'Tuesday': 'TUE',
        'Wednesday': 'WED',
        'Thursday': 'THU',
        'Friday': 'FRI',
        'Saturday': 'SAT',
        'Sunday': 'SUN'
    },
    timeMap = {
        '9pm': 'T21',
        '6pm': 'T18',
        '3pm': 'T15',
        '12pm': 'T12'
    },
    pricesObject = {
        'full': {
            'STA': 19.80,
            'STP': 17.50,
            'STC': 15.30,
            'FCA': 30.00,
            'FCP': 27.00,
            'FCC': 24.00
        },
        'disc': {
            'STA': 14.00,
            'STP': 12.50,
            'STC': 11.00,
            'FCA': 24.00,
            'FCP': 22.50,
            'FCC': 21.00
        }
    },
    pricesSave = {
        'STA': 0,
        'STP': 0,
        'STC': 0,
        'FCA': 0,
        'FCP': 0,
        'FCC': 0
    },
    typeName = {
        'ACT':'Avengers: Endgame',
        'AHF': 'Top End Wedding',
        'ANM': 'Dumbo',
        'RMC': 'The Happy Prince'
    }
// 3.1. Navigation Programming
function removeClass(items) {
    let len = items.length;
    for (let i = 0; i < len; i++) {
        let _link = items[i].firstElementChild;
        if (_link.classList) _link.classList.remove('active');
    }
}
document.onscroll = function (event) {
    if (!canRun) return;
    canRun = false;
    setTimeout(function () {
        let scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop;
        if (scrollTop < aboutUs.offsetTop + aboutUs.offsetHeight - 20) {
            removeClass(navItems);
            navItems[0].firstElementChild.classList.add('active');
        } else if (scrollTop >= prices.offsetTop - 20 && scrollTop < prices.offsetTop + prices.offsetHeight - 20) {
            removeClass(navItems);
            navItems[1].firstElementChild.classList.add('active');
        } else if (scrollTop >= showing.offsetTop - 20) {
            removeClass(navItems);
            navItems[2].firstElementChild.classList.add('active');
        }
        canRun = true;
    }, 10);
}



// 3.2. Now Showing and Synopsis Programming
function changeDisplay() {
    synopsisACT.style.display = 'none';
    synopsisAHF.style.display = 'none';
    synopsisANM.style.display = 'none';
    synopsisRMC.style.display = 'none';
}
moviePanelACT.addEventListener('click', function () {
    changeDisplay();
    setMovieId('ACT');
    clearSeats();
    synopsisACT.style.display = 'block';
});
moviePanelAHF.addEventListener('click', function () {
    changeDisplay();
    setMovieId('AHF');
    clearSeats();
    synopsisAHF.style.display = 'block';
});
moviePanelANM.addEventListener('click', function () {
    changeDisplay();
    setMovieId('ANM');
    clearSeats();
    synopsisANM.style.display = 'block';
});
moviePanelRMC.addEventListener('click', function () {
    changeDisplay();
    setMovieId('RMC');
    clearSeats();
    synopsisRMC.style.display = 'block';
});
function setMovieId(str) {
    document.getElementById('movie-id').value = str;
    document.getElementById('movie-day').value = '';
    document.getElementById('movie-hour').value = '';
    form_title_text = typeName[str];
}
function setTime(event) {
    let str = event.target.innerHTML;
    let arr = str.split(' ');
    clearSeats();
    save = arr;
    document.getElementById('movie-day').value = dayMap[arr[0]] || '';
    document.getElementById('movie-hour').value = timeMap[arr[2]] || '';
    form_day_text = arr[0];
    form_time_text = arr[2];
    document.getElementById('movie-title').innerHTML = form_title_text + ' - ' + form_day_text + ' - ' + form_time_text;
    form.style.display = 'block';
    // change form title
}
bookingACT.addEventListener('click', setTime);
bookingAHF.addEventListener('click', setTime);
bookingANM.addEventListener('click', setTime);
bookingRMC.addEventListener('click', setTime);


// 4. Booking Form
// 4.1. Seats and Price Programming
function clearSeats() {
    seatsFCA.value = '';
    seatsFCC.value = '';
    seatsFCP.value = '';
    seatsSTA.value = '';
    seatsSTP.value = '';
    seatsSTC.value = '';
    total.innerHTML = 0;
    save = [];
    sum = 0;
    pricesSave = {
        'STA': 0,
        'STP': 0,
        'STC': 0,
        'FCA': 0,
        'FCP': 0,
        'FCC': 0
    };
}
seatsFCA.addEventListener('change', function () {
    let multi = 0;
    seatsFCA.value ? multi = seatsFCA.value : 0;
    if (save.length > 0) {
        if (pricesSave['FCA']) {
            sum -= pricesSave['FCA'];
        }
        if (save[2] === '12pm' && save[0] !== 'Saturday' && save[0] !== 'Sunday') {
            // disc
            pricesSave['FCA'] = pricesObject['disc']['FCA'] * multi;
            sum += pricesObject['disc']['FCA'] * multi;
        } else {
            // full
            pricesSave['FCA'] = pricesObject['full']['FCA'] * multi;
            sum += pricesObject['full']['FCA'] * multi;
        }
        total.innerHTML = sum.toFixed(2);
    }
});
seatsFCC.addEventListener('change', function () {
    let multi = 0;
    seatsFCC.value ? multi = seatsFCC.value : 0;
    if (save.length > 0) {
        if (pricesSave['FCC']) {
            sum -= pricesSave['FCC'];
        }
        if (save[2] === '12pm' && save[0] !== 'Saturday' && save[0] !== 'Sunday') {
            // disc
            pricesSave['FCC'] = pricesObject['disc']['FCC'] * multi;
            sum += pricesObject['disc']['FCC'] * multi;
        } else {
            // full
            pricesSave['FCC'] = pricesObject['full']['FCC'] * multi;
            sum += pricesObject['full']['FCC'] * multi;
        }
        total.innerHTML = sum.toFixed(2);
    }
});
seatsFCP.addEventListener('change', function () {
    let multi = 0;
    seatsFCP.value ? multi = seatsFCP.value : 0;
    if (save.length > 0) {
        if (pricesSave['FCP']) {
            sum -= pricesSave['FCP'];
        }
        if (save[2] === '12pm' && save[0] !== 'Saturday' && save[0] !== 'Sunday') {
            // disc
            pricesSave['FCP'] = pricesObject['disc']['FCP'] * multi;
            sum += pricesObject['disc']['FCP'] * multi;
        } else {
            // full
            pricesSave['FCP'] = pricesObject['full']['FCP'] * multi;
            sum += pricesObject['full']['FCP'] * multi;
        }
        total.innerHTML = sum.toFixed(2);
    }
});
seatsSTA.addEventListener('change', function () {
    let multi = 0;
    seatsSTA.value ? multi = seatsSTA.value : 0;
    if (save.length > 0) {
        if (pricesSave['STA']) {
            sum -= pricesSave['STA'];
        }
        if (save[2] === '12pm' && save[0] !== 'Saturday' && save[0] !== 'Sunday') {
            // disc
            pricesSave['STA'] = pricesObject['disc']['STA'] * multi;
            sum += pricesObject['disc']['STA'] * multi;
        } else {
            // full
            pricesSave['STA'] = pricesObject['full']['STA'] * multi;
            sum += pricesObject['full']['STA'] * multi;
        }
        total.innerHTML = sum.toFixed(2);
    }
});
seatsSTC.addEventListener('change', function () {
    let multi = 0;
    seatsSTC.value ? multi = seatsSTC.value : 0;
    if (save.length > 0) {
        if (pricesSave['STC']) {
            sum -= pricesSave['STC'];
        }
        if (save[2] === '12pm' && save[0] !== 'Saturday' && save[0] !== 'Sunday') {
            // disc
            pricesSave['STC'] = pricesObject['disc']['STC'] * multi;
            sum += pricesObject['disc']['STC'] * multi;
        } else {
            // full
            pricesSave['STC'] = pricesObject['full']['STC'] * multi;
            sum += pricesObject['full']['STC'] * multi;
        }
        total.innerHTML = sum.toFixed(2);
    }
});
seatsSTP.addEventListener('change', function () {
    let multi = 0;
    seatsSTP.value ? multi = seatsSTP.value : 0;
    if (save.length > 0) {
        if (pricesSave['STP']) {
            sum -= pricesSave['STP'];
        }
        if (save[2] === '12pm' && save[0] !== 'Saturday' && save[0] !== 'Sunday') {
            // disc
            pricesSave['STP'] = pricesObject['disc']['STP'] * multi;
            sum += pricesObject['disc']['STP'] * multi;
        } else {
            // full
            pricesSave['STP'] = pricesObject['full']['STP'] * multi;
            sum += pricesObject['full']['STP'] * multi;
        }
        total.innerHTML = sum.toFixed(2);
    }
});

form.onsubmit = function (event) {
    // checkout
    let name_check = /^[a-zA-Z \-.']{1,100}$/.test(custName.value);
    let tel_check = /^(\(04\)|04|\+614)( ?\d){8}$/.test(custMobile.value);
    let card_check = /^(4( ?\d){12}(?:( ?\d){3})?)$/.test(custCard.value);
    if (!name_check) {
        alert('Name formatting error!');
        return false;
    } else if (!tel_check) {
        alert('Tel formatting error!');
        return false;
    } else if (!card_check) {
        alert('Card formatting error!');
        return false;
    }
    let time = new Date();
    let now_year = time.getFullYear(), now_month = time.getMonth();
    let arr = custExpiry.value.split('-') || '';
    if (!arr) {
        alert('Expiry formatting error!');
        return false;
    }
    if (now_year > +arr[0]) {
        alert('Expiry formatting error!');
        return false;
    } else if (now_year === +arr[0]) {
        if (now_month > +arr[1]) {
            alert('Expiry formatting error!');
            return false;
        }
    }
}
