// beez-tabs.min
window.addEvent("domready",function(){var c=document.id(document.body).getElements("div.tabcontent");var b=document.id(document.body).getElements("div.tabouter");b=b.getProperty("id");for(var a=0;a<b.length;a++){c=document.id(b[a]).getElements("div.tabcontent");count=0;c.each(function(d){count++;var e=document.id(d);e.setProperty("role","tabpanel");e.setProperty("aria-hidden","false");e.setProperty("aria-expanded","true");elid=e.getProperty("id");elid=elid.split("_");elid="link_"+elid[1];e.setProperty("aria-labelledby",elid);if(count!=1){e.addClass("tabclosed").removeClass("tabopen");e.setProperty("aria-hidden","true");e.setProperty("aria-expanded","false")}});countankers=0;allankers=document.id(b[a]).getElement("ul.tabs").getElements("a");allankers.each(function(d){countankers++;var e=document.id(d);e.setProperty("aria-selected","true");e.setProperty("role","tab");linkid=e.getProperty("id");moduleid=linkid.split("_");moduleid="module_"+moduleid[1];e.setProperty("aria-controls",moduleid);if(countankers!=1){e.addClass("linkclosed").removeClass("linkopen");e.setProperty("aria-selected","false")}})}});function tabshow(b){var e=document.id(b);var g=e.getParent();g=g.getProperty("id");var f=document.id(g).getElements("div.tabcontent");var c=document.id(g).getElement("ul.tabs");c.getElements("a").setProperty("aria-selected","false");f.each(function(h){h.addClass("tabclosed").removeClass("tabopen");h.setProperty("aria-hidden","true");h.setProperty("aria-expanded","false")});e.addClass("tabopen").removeClass("tabclosed");e.setProperty("aria-hidden","false");e.setProperty("aria-expanded","true");e.focus();var d=b.split("_");var a="link_"+d[1];document.id(a).setProperty("aria-selected","true");c.getElements("a").addClass("linkclosed").removeClass("linkopen");document.id(a).addClass("linkopen").removeClass("linkclosed")}function nexttab(g){var h=document.id(g).getParent();var b=h.getElement("ul.tabs");var e=g.split("_");var a="link_"+e[1];var f=document.id(a).getProperty("aria-selected");var d=b.getElements("a").getProperty("id");for(var c=0;c<d.length;c++){if(d[c]==a){if(document.id(d[c+1])!=null){document.id(d[c+1]).onclick();break}}}};
// jquery.smooth-scroll.min
(function(e){var c="@VERSION",f={exclude:[],excludeWithin:[],offset:0,direction:"top",scrollElement:null,scrollTarget:null,beforeScroll:function(){},afterScroll:function(){},easing:"swing",speed:400,autoCoefficent:2},a=function(i){var j=[],h=false,g=i.dir&&i.dir=="left"?"scrollLeft":"scrollTop";this.each(function(){if(this==document||this==window){return}var k=e(this);if(k[g]()>0){j.push(this)}else{k[g](1);h=k[g]()>0;if(h){j.push(this)}k[g](0)}});if(!j.length){this.each(function(k){if(this.nodeName==="BODY"){j=[this]}})}if(i.el==="first"&&j.length>1){j=[j[0]]}return j},b="ontouchend" in document;e.fn.extend({scrollable:function(g){var h=a.call(this,{dir:g});return this.pushStack(h)},firstScrollable:function(g){var h=a.call(this,{el:"first",dir:g});return this.pushStack(h)},smoothScroll:function(g){g=g||{};var h=e.extend({},e.fn.smoothScroll.defaults,g),i=e.smoothScroll.filterPath(location.pathname);this.unbind("click.smoothscroll").bind("click.smoothscroll",function(k){var s=this,r=e(this),m=h.exclude,p=h.excludeWithin,t=0,o=0,l=true,u={},n=((location.hostname===s.hostname)||!s.hostname),j=h.scrollTarget||(e.smoothScroll.filterPath(s.pathname)||i)===i,q=d(s.hash);if(!h.scrollTarget&&(!n||!j||!q)){l=false}else{while(l&&t<m.length){if(r.is(d(m[t++]))){l=false}}while(l&&o<p.length){if(r.closest(p[o++]).length){l=false}}}if(l){k.preventDefault();e.extend(u,h,{scrollTarget:h.scrollTarget||q,link:s});e.smoothScroll(u)}});return this}});e.smoothScroll=function(r,n){var g,h,q,j,p=0,k="offset",m="scrollTop",o={},l={},i=[];if(typeof r==="number"){g=e.fn.smoothScroll.defaults;q=r}else{g=e.extend({},e.fn.smoothScroll.defaults,r||{});if(g.scrollElement){k="position";if(g.scrollElement.css("position")=="static"){g.scrollElement.css("position","relative")}}}g=e.extend({link:null},g);m=g.direction=="left"?"scrollLeft":m;if(g.scrollElement){h=g.scrollElement;p=h[m]()}else{h=e("html, body").firstScrollable()}g.beforeScroll.call(h,g);q=(typeof r==="number")?r:n||(e(g.scrollTarget)[k]()&&e(g.scrollTarget)[k]()[g.direction])||0;o[m]=q+p+g.offset;j=g.speed;if(j==="auto"){j=o[m]||h.scrollTop();j=j/g.autoCoefficent}l={duration:j,easing:g.easing,complete:function(){g.afterScroll.call(g.link,g)}};if(g.step){l.step=g.step}if(h.length){h.stop().animate(o,l)}else{g.afterScroll.call(g.link,g)}};e.smoothScroll.version=c;e.smoothScroll.filterPath=function(g){return g.replace(/^\//,"").replace(/(index|default).[a-zA-Z]{3,4}$/,"").replace(/\/$/,"")};e.fn.smoothScroll.defaults=f;function d(g){return g.replace(/(:|\.)/g,"\\$1")}})(jQuery);
// footable-0.1.min
(function(d,a,f){a.footable={options:{delay:10,breakpoints:{phone:480,tablet:1024},parsers:{alpha:function(g){return d(g).data("value")||d.trim(d(g).text())}},toggleSelector:" > tbody > tr:not(.footable-row-detail)",createDetail:function(h,j){for(var g=0;g<j.length;g++){h.append("<div><em>"+j[g].name+"</em> : "+j[g].display+"</div>")}},classes:{loading:"footable-loading",loaded:"footable-loaded",sorted:"footable-sorted",descending:"footable-sorted-desc",indicator:"footable-sort-indicator"},debug:false},version:{major:0,minor:1,toString:function(){return a.footable.version.major+"."+a.footable.version.minor},parse:function(g){version=/(\d+)\.?(\d+)?\.?(\d+)?/.exec(g);return{major:parseInt(version[1])||0,minor:parseInt(version[2])||0,patch:parseInt(version[3])||0}}},plugins:{_validate:function(g){if(typeof g.name!=="string"){if(a.footable.options.debug==true){console.error('Validation failed, plugin does not implement a string property called "name".',g)}return false}if(!d.isFunction(g.init)){if(a.footable.options.debug==true){console.error('Validation failed, plugin "'+g.name+'" does not implement a function called "init".',g)}return false}if(a.footable.options.debug==true){console.log('Validation succeeded for plugin "'+g.name+'".',g)}return true},registered:[],register:function(h,g){if(a.footable.plugins._validate(h)){a.footable.plugins.registered.push(h);if(g!=f&&typeof g==="object"){d.extend(true,a.footable.options,g)}if(a.footable.options.debug==true){console.log('Plugin "'+h.name+'" has been registered with the Foobox.',h)}}},init:function(g){for(var h=0;h<a.footable.plugins.registered.length;h++){try{a.footable.plugins.registered[h]["init"](g)}catch(j){if(a.footable.options.debug==true){console.error(j)}}}}}};var c=0;d.fn.footable=function(g){g=g||{};var h=d.extend(true,{},a.footable.options,g);return this.each(function(){c++;this.footable=new e(this,h,c)})};function b(){var g=this;g.id=null;g.busy=false;g.start=function(i,h){if(g.busy){return}g.stop();g.id=setTimeout(function(){i();g.id=null;g.busy=false},h);g.busy=true};g.stop=function(){if(g.id!=null){clearTimeout(g.id);g.id=null;g.busy=false}}}function e(i,j,l){var k=this;k.id=l;k.table=i;k.options=j;k.breakpoints=[];k.breakpointNames="";k.columns={};var h=k.options;var g=h.classes;k.timers={resize:new b(),register:function(m){k.timers[m]=new b();return k.timers[m]}};a.footable.plugins.init(k);k.init=function(){var o=d(a),n=d(k.table);if(n.hasClass(g.loaded)){k.raise("footable_already_initialized");return}n.addClass(g.loading);n.find("> thead > tr > th, > thead > tr > td").each(function(){var q=k.getColumnData(this);k.columns[q.index]=q;var p=q.index+1;var r=n.find("> tbody > tr > td:nth-child("+p+")");if(q.className!=null){r.not(".footable-cell-detail").addClass(q.className)}});for(var m in h.breakpoints){k.breakpoints.push({name:m,width:h.breakpoints[m]});k.breakpointNames+=(m+" ")}k.breakpoints.sort(function(q,p){return q.width-p.width});k.bindToggleSelectors();k.raise("footable_initializing");n.bind("footable_initialized",function(p){k.resize();n.removeClass(g.loading);n.find('[data-init="hide"]').hide();n.find('[data-init="show"]').show();n.addClass(g.loaded)});o.bind("resize.footable",function(){k.timers.resize.stop();k.timers.resize.start(function(){k.raise("footable_resizing");k.resize();k.raise("footable_resized")},h.delay)});k.raise("footable_initialized")};k.bindToggleSelectors=function(){var m=d(k.table);m.find(h.toggleSelector).unbind("click.footable").bind("click.footable",function(o){if(m.is(".breakpoint")){var n=d(this).is("tr")?d(this):d(this).parents("tr:first");k.toggleDetail(n.get(0))}})};k.parse=function(m,n){var o=h.parsers[n.type]||h.parsers.alpha;return o(m)};k.getColumnData=function(p){var o=d(p),n=o.data("hide");n=n||"";n=n.split(",");var q={index:o.index(),hide:{},type:o.data("type")||"alpha",name:o.data("name")||d.trim(o.text()),ignore:o.data("ignore")||false,className:o.data("class")||null};q.hide["default"]=(o.data("hide")==="all")||(d.inArray("default",n)>=0);for(var m in h.breakpoints){q.hide[m]=(o.data("hide")==="all")||(d.inArray(m,n)>=0)}var r=k.raise("footable_column_data",{column:{data:q,th:p}});return r.column.data};k.getViewportWidth=function(){return window.innerWidth||(document.body?document.body.offsetWidth:0)};k.getViewportHeight=function(){return window.innerHeight||(document.body?document.body.offsetHeight:0)};k.hasBreakpointColumn=function(m){for(var n in k.columns){if(k.columns[n].hide[m]){return true}}return false};k.resize=function(){var n=d(k.table);var s={width:n.width(),height:n.height(),viewportWidth:k.getViewportWidth(),viewportHeight:k.getViewportHeight(),orientation:null};s.orientation=s.viewportWidth>s.viewportHeight?"landscape":"portrait";if(s.viewportWidth<s.width){s.width=s.viewportWidth}if(s.viewportHeight<s.height){s.height=s.viewportHeight}var t=n.data("footable_info");n.data("footable_info",s);if(!t||((t&&t.width&&t.width!=s.width)||(t&&t.height&&t.height!=s.height))){var r=null,m;for(var p=0;p<k.breakpoints.length;p++){m=k.breakpoints[p];if(m&&m.width&&s.width<=m.width){r=m;break}}var o=(r==null?"default":r.name);var q=k.hasBreakpointColumn(o);n.removeClass("default breakpoint").removeClass(k.breakpointNames).addClass(o+(q?" breakpoint":"")).find("> thead > tr > th").each(function(){var v=k.columns[d(this).index()];var u=v.index+1;var w=n.find("> tbody > tr > td:nth-child("+u+"), > tfoot > tr > td:nth-child("+u+"), > colgroup > col:nth-child("+u+")").add(this);if(v.hide[o]==false){w.show()}else{w.hide()}}).end().find("> tbody > tr.footable-detail-show").each(function(){k.createOrUpdateDetailRow(this)});n.find("> tbody > tr.footable-detail-show:visible").each(function(){var u=d(this).next();if(u.hasClass("footable-row-detail")){if(o=="default"&&!q){u.hide()}else{u.show()}}});k.raise("footable_breakpoint_"+o,{info:s})}};k.toggleDetail=function(p){var m=d(p),o=k.createOrUpdateDetailRow(m.get(0)),n=m.next();if(!o&&n.is(":visible")){m.removeClass("footable-detail-show");n.hide()}else{m.addClass("footable-detail-show");n.show()}};k.createOrUpdateDetailRow=function(s){var m=d(s),n=m.next(),q,o=[];if(m.is(":hidden")){return}m.find("> td:hidden").each(function(){var t=k.columns[d(this).index()];if(t.ignore==true){return true}o.push({name:t.name,value:k.parse(this,t),display:d.trim(d(this).html())})});var r=m.find("> td:visible").length;var p=n.hasClass("footable-row-detail");if(!p){n=d('<tr class="footable-row-detail"><td class="footable-cell-detail"><div class="footable-row-detail-inner"></div></td></tr>');m.after(n)}n.find("> td:first").attr("colspan",r);q=n.find(".footable-row-detail-inner").empty();h.createDetail(q,o);return !p};k.raise=function(m,n){n=n||{};var o={ft:k};d.extend(true,o,n);var p=d.Event(m,o);if(!p.ft){d.extend(true,p,o)}d(k.table).trigger(p);return p};k.init();return k}})(jQuery,window);

// off canvas navigation by David Bushell
(function(r,q,v){var u=function(a){return a.trim?a.trim():a.replace(/^\s+|\s+$/g,"")};var t=function(a,b){return(" "+a.className+" ").indexOf(" "+b+" ")!==-1};var s=function(a,b){if(!t(a,b)){a.className=(a.className==="")?b:a.className+" "+b}};var n=function(a,b){a.className=u((" "+a.className+" ").replace(" "+b+" "," "))};var m=function(a,b){if(a){do{if(a.id===b){return true}if(a.nodeType===9){break}}while((a=a.parentNode))}return false};var o=q.documentElement;var p=r.Modernizr.prefixed("transform"),w=r.Modernizr.prefixed("transition"),x=(function(){var a={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",msTransition:"MSTransitionEnd",transition:"transitionend"};return a.hasOwnProperty(w)?a[w]:false})();r.App=(function(){var c=false,b={};var a=q.getElementById("inner-wrapper"),d=false,e="js-nav";b.init=function(){if(c){return}c=true;var f=function(g){if(g&&g.target===a){q.removeEventListener(x,f,false)}d=false};b.closeNav=function(){if(d){var g=(x&&w)?parseFloat(r.getComputedStyle(a,"")[w+"Duration"]):0;if(g>0){q.addEventListener(x,f,false)}else{f(null)}}n(o,e)};b.openNav=function(){if(d){return}s(o,e);d=true};b.toggleNav=function(g){if(d&&t(o,e)){b.closeNav()}else{b.openNav()}if(g){g.preventDefault()}};q.getElementById("nav-open-btn").addEventListener("click",b.toggleNav,false);q.getElementById("nav-close-btn").addEventListener("click",b.toggleNav,false);q.addEventListener("click",function(g){if(d&&!m(g.target,"nav")){g.preventDefault();b.closeNav()}},true);s(o,"js-ready")};return b})();if(r.addEventListener){r.addEventListener("DOMContentLoaded",r.App.init,false)}})(window,window.document);