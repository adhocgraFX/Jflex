// Angie Radtke 2009 //
// ########### Tabfunctions ####################

window.addEvent('domready', function () {
    var alldivs = document.id(document.body).getElements('div.tabcontent');
    var outerdivs = document.id(document.body).getElements('div.tabouter');
    outerdivs = outerdivs.getProperty('id');

    for (var i = 0; i < outerdivs.length; i++) {
        alldivs = document.id(outerdivs[i]).getElements('div.tabcontent');
        count = 0;
        alldivs.each(function (element) {
            count++;
            var el = document.id(element);
            el.setProperty('role', 'tabpanel');
            el.setProperty('aria-hidden', 'false');
            el.setProperty('aria-expanded', 'true');
            elid = el.getProperty('id');
            elid = elid.split('_');
            elid = 'link_' + elid[1];
            el.setProperty('aria-labelledby', elid);

            if (count != 1) {
                el.addClass('tabclosed').removeClass('tabopen');
                el.setProperty('aria-hidden', 'true');
                el.setProperty('aria-expanded', 'false');
            }
        });

        countankers = 0;
        allankers = document.id(outerdivs[i]).getElement('ul.tabs').getElements('a');

        allankers.each(function (element) {
            countankers++;
            var el = document.id(element);
            el.setProperty('aria-selected', 'true');
            el.setProperty('role', 'tab');
            linkid = el.getProperty('id');
            moduleid = linkid.split('_');
            moduleid = 'module_' + moduleid[1];
            el.setProperty('aria-controls', moduleid);

            if (countankers != 1) {
                el.addClass('linkclosed').removeClass('linkopen');
                el.setProperty('aria-selected', 'false');
            }
        });
    }
});

function tabshow(elid) {
    var el = document.id(elid);
    var outerdiv = el.getParent();
    outerdiv = outerdiv.getProperty('id');

    var alldivs = document.id(outerdiv).getElements('div.tabcontent');
    var liste = document.id(outerdiv).getElement('ul.tabs');

    liste.getElements('a').setProperty('aria-selected', 'false');

    alldivs.each(function (element) {
        element.addClass('tabclosed').removeClass('tabopen');
        element.setProperty('aria-hidden', 'true');
        element.setProperty('aria-expanded', 'false');
    });

    el.addClass('tabopen').removeClass('tabclosed');
    el.setProperty('aria-hidden', 'false');
    el.setProperty('aria-expanded', 'true');
    el.focus();
    var getid = elid.split('_');
    var activelink = 'link_' + getid[1];
    document.id(activelink).setProperty('aria-selected', 'true');
    liste.getElements('a').addClass('linkclosed').removeClass('linkopen');
    document.id(activelink).addClass('linkopen').removeClass('linkclosed');
}

function nexttab(el) {
    var outerdiv = document.id(el).getParent();
    var liste = outerdiv.getElement('ul.tabs');
    var getid = el.split('_');
    var activelink = 'link_' + getid[1];
    var aktiverlink = document.id(activelink).getProperty('aria-selected');
    var tablinks = liste.getElements('a').getProperty('id');

    for (var i = 0; i < tablinks.length; i++) {

        if (tablinks[i] == activelink) {

            if (document.id(tablinks[i + 1]) != null) {
                document.id(tablinks[i + 1]).onclick();
                break;
            }
        }
    }
}